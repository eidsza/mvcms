<?php

define("TBL_USERS","mvcms_users");
define("TBL_ACTIVE_USERS", "mvcms_active_users");
define("TBL_ACTIVE_GUESTS", "mvcms_active_guests");
define('USER_TIMEOUT',1);
define('WEB_ROOT','index');
define('TRACK_VISITORS',true);

class user_model
{


public $registry;

public $db;


private  $time;

public function __construct($registry){
        $this->registry = $registry;
        $this->db = $this->registry->db;
}

  function confirmUserPass($username, $password){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
      $dbarray = $this->db->select("SELECT `password`, `userlevel`, `usersalt` FROM `".TBL_USERS."` WHERE `username` = :username", array('username'=>$username));
      if ($dbarray) {
      $count = count($dbarray);
      $dbarray = $dbarray[0];
      }
    
	  if(!$dbarray || $count < 1){
        return 1; //Indicates username failure
     }

      /* Retrieve password and userlevel from result, strip slashes */
	  //$dbarray = $sql->fetch();
	   
	  // $dbarray['password'] = stripslashes($dbarray['password']);
	  $dbarray['userlevel'] = stripslashes($dbarray['userlevel']);
	  $dbarray['usersalt'] = stripslashes($dbarray['usersalt']);
	  $password = stripslashes($password);
	  
	  $sqlpass = sha1($dbarray['usersalt'].$password);

	  /* Validate that password matches and check if userlevel is equal to 1 */
	  if(($dbarray['password'] == $sqlpass)&&($dbarray['userlevel'] == 1)){
  	  return 3; //Indicates account has not been activated
	  }
	  
	  /* Validate that password matches and check if userlevel is equal to 2 */
      if(($dbarray['password'] == $sqlpass)&&($dbarray['userlevel'] == 2)){
  	  return 4; //Indicates admin has not activated account
	  }

      /* Validate that password is correct */
	  if($dbarray['password'] == $sqlpass){
      return 0; //Success! Username and password confirmed
      }
      else{
         return 2; //Indicates password failure
      }
   }
   
   /**
    * confirmUserID - Checks whether or not the given username is in the database, 
    * if so it checks if the given userid is the same userid in the database
    * for that user. If the user doesn't exist or if the userids don't match up, 
    * it returns an error code (1 or 2). On success it returns 0.
    */
   function confirmUserID($username, $userid){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
	  $dbarray = $this->db->select("SELECT userid FROM ".TBL_USERS." WHERE username = :username", array('username'=>$username));
    $dbarray = $dbarray[0];
    $count = count($dbarray);
    
   
  
      
      if(!$dbarray || $count < 1){
         return 1; //Indicates username failure
      }
      
	

      /* Retrieve userid from result, strip slashes */
      $dbarray['userid'] = stripslashes($dbarray['userid']);
      $userid = stripslashes($userid);

      /* Validate that userid is correct */
      if($userid == $dbarray['userid']){
         return 0; //Success! Username and userid confirmed
      }
      else{
         return 2; //Indicates userid invalid
      }
   }
   
   /**
    * usernameTaken - Returns true if the username has been taken by another user, false otherwise.
    */
   function usernameTaken($username){
   	  if(!get_magic_quotes_gpc()){ $username = addslashes($username); }
      $result = $this->db->select("SELECT username FROM ".TBL_USERS." WHERE username =:username",array("username"=>"{$username}"));
      $count = count($result);
      return ($count > 0);
   }
   
   /**
    * usernameBanned - Returns true if the username has been banned by the administrator.
    */
   function usernameBanned($username){
      if(!get_magic_quotes_gpc()){ $username = addslashes($username); }
      $result =  $this->connection->query("SELECT username FROM ".TBL_BANNED_USERS." WHERE username = '$username'");
	  $count = $result->rowCount();    
      return ($count > 0);
   }
   
   /**
    * addNewUser - Inserts the given (username, password, email) info into the database. 
    * Appropriate user level is set. Returns true on success, false otherwise.
    */
   function addNewUser($username, $password, $email, $token, $usersalt){
      $time = time();
      $config = $this->getConfigs();
      /* If admin sign up, give admin user level */
      if(strcasecmp($username, ADMIN_NAME) == 0){
         $ulevel = ADMIN_LEVEL;
      /* Which validation is on? */
      }else if ($config['ACCOUNT_ACTIVATION'] == 1) {
      	 $ulevel = REGUSER_LEVEL; /* No activation required */
      }else if ($config['ACCOUNT_ACTIVATION'] == 2) {
         $ulevel = ACT_EMAIL; /* Activation e-mail will be sent */
      }else if ($config['ACCOUNT_ACTIVATION'] == 3) {
         $ulevel = ADMIN_ACT; /* Admin will activate account */   
   	  }

	 $password = sha1($usersalt.$password);
	 $userip = $_SERVER['REMOTE_ADDR'];
      
      $query = "INSERT INTO ".TBL_USERS." SET username = :username, password = :password, usersalt = :usersalt, userid = 0, userlevel = $ulevel, email = :email, timestamp = $time, actkey = :token, ip = '$userip', regdate = $time";
      $stmt = $this->connection->prepare($query);
      return $stmt->execute(array(':username' => $username, ':password' => $password, ':usersalt' => $usersalt, ':email' => $email, ':token' => $token));
   }
   
   /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    */
   function updateUserField($username, $field, $value){
   
   
   $this->db->update(TBL_USERS,array($field=>$value),"`username` = '{$username}'");
   //$stmt =  $this->connection->prepare("UPDATE ".TBL_USERS." SET ".$field." = '$value' WHERE username = '$username'");
   //return $stmt->execute();
   }
   
   /**
    * getUserInfo - Returns the result array from a mysql
    * query asking for all information stored regarding
    * the given username. If query fails, NULL is returned.
    */
    function getUserInfo($username){
   
    $dbarray = $this->db->select("SELECT `password`, `userlevel`, `user_role`, `usersalt`, `username`, `userid` FROM `".TBL_USERS."` WHERE `username` = :username", array('username'=>$username));
    $dbarray = $dbarray[0];
    
    $result = count($dbarray);
      /* Error occurred, return given name by default */
    $result = count($dbarray);
    
    
      if(!$dbarray || $result < 1){
       
         return NULL;
      }
      /* Return result array */
      return $dbarray;
   }
   
   /**
    * checkUserEmailMatch - Checks whether username
    * and email match in forget password form.
    */
   function checkUserEmailMatch($username, $email){
   	
	$sql = $this->connection->query("SELECT username FROM ".TBL_USERS." WHERE username = '$username' AND email = '$email'");  
	$number_of_rows = $sql->rowCount();
	    
      if(!$sql || $number_of_rows < 1){
         return 0;
      } else {
      return 1;
    }
   }
   
   /**
    * getNumMembers - Returns the number of signed-up users
    * of the website, banned members not included. The first
    * time the function is called on page load, the database
    * is queried, on subsequent calls, the stored result
    * is returned. This is to improve efficiency, effectively
    * not querying the database when no call is made.
    */
   function getNumMembers(){
      if($this->num_members < 0){
         $result =  $this->connection->query("SELECT username FROM ".TBL_USERS);
         $this->num_members = $result->rowCount(); 
      }
      return $this->num_members;
   }
   
   /**
    * getLastUserRegistered - Returns the username of the last
    * member to sign up and the date.
    */
   function getLastUserRegisteredName() {
         $result = $this->connection->query("SELECT username, regdate FROM ".TBL_USERS." ORDER BY regdate DESC LIMIT 0,1"); 
         $this->lastuser_reg = $result->fetchColumn();
      return $this->lastuser_reg;
   }
   
   /**
    * getLastUserRegistered - Returns the username of the last
    * member to sign up and the date.
    */
   function getLastUserRegisteredDate() {
         $result = $this->connection->query("SELECT username, regdate FROM ".TBL_USERS." ORDER BY regdate DESC LIMIT 0,1"); 
         $this->lastuser_reg = $result->fetchColumn(1);
      return $this->lastuser_reg;
   }
   
   /**
    * calcNumActiveUsers - Finds out how many active users
    * are viewing site and sets class variable accordingly.
    */
   function calcNumActiveUsers(){
	/* Calculate number of USERS at site */
    //$sql = $this->connection->query("SELECT * FROM ".TBL_ACTIVE_USERS);
    $dbarray = $this->db->select("SELECT * FROM ".TBL_ACTIVE_USERS);
    $this->registry->num_active_users = count($dbarray);
    
   }
   
   /**
    * calcNumActiveGuests - Finds out how many active guests
    * are viewing site and sets class variable accordingly.
    */
   function calcNumActiveGuests(){
    /* Calculate number of GUESTS at site */
   	$dbarray = $this->db->select("SELECT * FROM ".TBL_ACTIVE_GUESTS);
    $this->registry->num_active_users = count($dbarray);
	}
   
   /**
    * addActiveUser - Updates username's last active timestamp
    * in the database, and also adds him to the table of
    * active users, or updates timestamp if already there.
    */
   function addActiveUser($username, $time){
   //$config = $this->getConfigs();
	  
	  // new - this checks how long someone has been inactive and logs them off if neccessary unless
	  // they have cookies (remember me) set.
	    $dbarray = $this->db->select("SELECT * FROM ".TBL_USERS." WHERE username = :username", array('username'=>$username));
      if ($dbarray) $dbarray = $dbarray[0];
           
      $db_timestamp = $dbarray['timestamp'];
      $timeout = time()-USER_TIMEOUT*60;
      if($db_timestamp < $timeout && !isset($_COOKIE['cookname']) && !isset($_COOKIE['cookid'])) header("Location:".WEB_ROOT);
	    
   	  //$dbarray = $this->db->update("UPDATE ".TBL_USERS." SET timestamp = '$time' WHERE username = '$username'");
      $this->db->update(TBL_USERS, array("timestamp"=>$time),"`username` = '{$username}'");
      
      if(!TRACK_VISITORS) return;
      //$sql = $this->connection->prepare("REPLACE INTO ".TBL_ACTIVE_USERS." VALUES ('$username', '$time')");
      $this->db->replace(TBL_ACTIVE_USERS, array('username'=>$username,'timestamp'=>$time));
      
      $this->calcNumActiveUsers();
   }
   
   /* addActiveGuest - Adds guest to active guests table */
   function addActiveGuest($ip, $time){
   	  $config = $this->getConfigs();
      if(!$config['TRACK_VISITORS']) return;
      $sql =  $this->connection->prepare("REPLACE INTO ".TBL_ACTIVE_GUESTS." VALUES ('$ip', '$time')");
      $sql->execute();
      $this->calcNumActiveGuests();
   }
   
   /* These functions are self explanatory, no need for comments */
   
   /* removeActiveUser */
   function removeActiveUser($username){
   	  $config = $this->getConfigs();
      if(!$config['TRACK_VISITORS']) return;
      $sql = $this->connection->prepare("DELETE FROM ".TBL_ACTIVE_USERS." WHERE username = '$username'");
      $sql->execute();
      $this->calcNumActiveUsers();
   }
   
   /* removeActiveGuest */
   function removeActiveGuest($ip){
   	  //$config = $this->getConfigs();
      if(!TRACK_VISITORS) return;
      $this->db->delete(TBL_ACTIVE_GUESTS, "`ip` = '{$ip}'");
      //$sql = $this->connection->prepare("DELETE FROM ".TBL_ACTIVE_GUESTS." WHERE ip = '$ip'");
      //$sql->execute();
      $this->calcNumActiveGuests();
   }
   
   /* removeInactiveUsers */
   function removeInactiveUsers(){
   	  $config = $this->getConfigs();
      if(!$config['TRACK_VISITORS']) return;
      $timeout = time()-$config['USER_TIMEOUT']*60;
      $stmt = $this->connection->prepare("DELETE FROM ".TBL_ACTIVE_USERS." WHERE timestamp < $timeout");
      $stmt->execute();
      $this->calcNumActiveUsers();
   }

   /* removeInactiveGuests */
   function removeInactiveGuests(){
      $config = $this->getConfigs();
      if(!$config['TRACK_VISITORS']) return;
      $timeout = time()-$config['GUEST_TIMEOUT']*60;
      $stmt = $this->connection->prepare("DELETE FROM ".TBL_ACTIVE_GUESTS." WHERE timestamp < $timeout");
      $stmt->execute();
      $this->calcNumActiveGuests();
   }
   
   
    function generateRandID(){
      return md5($this->generateRandStr(16));
   }
   
   /**
    * generateRandStr - Generates a string made up of randomized
    * letters (lower and upper case) and digits, the length
    * is a specified parameter.
    */
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }
   
   /* 
    * 
    * update user
    */
   
   function mvcms_adm_update_user($userdata){
   
       
        $udata = array(
        "firstname"=>$userdata['firstname'],
        "lastname"=>$userdata['lastname'],
        "userlevel"=>$userdata['status'],
        "email"=>$userdata['email'],    
        "user_role"=>(!empty($userdata['securityRole']) ?$userdata['securityRole'] : -1)
        );
        
        $userprofile = array(
        "fk_state_id"=>(!empty($userdata['city_state']) ? $userdata['city_state'] : $userdata['co_city_state']),
        "fk_area_id"=>(!empty($userdata['city_state_area'] )? $userdata['city_state_area'] : $userdata['co_city_state_area']),
        "department_name"=>(!empty($userdata['department_name']) ? $userdata['department_name'] : ''),
        "city_name"=>$userdata['city_name'],
        "city_code"=>$userdata['city_code'],
        "streetname"=>$userdata['streetname'],
        "house_number"=>$userdata['house_number'],
        "contact_phone"=>$userdata['contact_phone'],
        "PESEL"=>(!empty($userdata['PESEL']) ? $userdata['PESEL']:''),
        "NIP"=>(!empty($userdata['NIP']) ? $userdata['NIP']: ''),
        "REGON"=>(!empty($userdata['REGON']) ? $userdata['REGON']: ''),
        "contact_email"=>(!empty($userdata['contact_email']) ? $userdata['contact_email'] : ''),
        "website"=>(!empty($userdata['website']) ? $userdata['website'] : '')    
        );
   
        
        
   if (!empty($userdata['password'])) $udata = array_merge($udata, array("password"=>sha1($userdata['salt'].$userdata['password'])));
   

   try{
       
   $this->db->beginTransaction();
   
   //var_dump($userdata['id']);
   $ret = $this->db->UPDATE("`mvcms_users`", $udata, " `id`=".$userdata['id']."");
   if ($ret){
      //var_dump($udata); 
       $ret = $this->db->UPDATE("`mvcms_user_profile`", $userprofile, " `fk_user_id`={$userdata['id']}");    
    if ($ret) {$this->db->commit();return true;} else {$this->db->rollback(); return false;}
   }
   else $this->db->rollback();
   return false;
   
   } catch(PDOException $e){
     $this->db->rollback(); 
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
   }
   
   }
   
  /*
   * add new user
   */
   
   function mvcms_adm_create_user($userdata){
   if (empty($userdata)) return false;
   
   $token = self::generateRandStr(16);
   $salt = self::generateRandStr(8);
   $time = time();
   
   
   try{
       
   $this->db->beginTransaction();
   
   $ret = $this->db->insert("`mvcms_users`",array(
        "username"=>$userdata['username'],
        "password"=>sha1($salt.$userdata['password']),
        "firstname"=>$userdata['firstname'],
        "lastname"=>$userdata['lastname'],
        "usersalt"=>$salt,
        "userid"=>0,
        "userlevel"=>$userdata['status'],
        "user_role"=>$userdata['securityRole'],
        "email"=>$userdata['email'],
        "timestamp"=>$time,
        "actkey"=>$token,
        "ip"=>$_SERVER['REMOTE_ADDR'],
        "regdate"=>$time
    ));
    if ($ret){
    $usrId = $this->db->lastInsertId();  
    
    $ret2 = $this->db->insert("`mvcms_user_profile`", array(
        "fk_user_id"=>$usrId,
        "status"=>$userdata['law_status'],
        "fk_state_id"=>($userdata['law_status']==1 ? $userdata['city_state'] : $userdata['co_city_state']),
        "fk_area_id"=>($userdata['law_status']==1 ? $userdata['city_state_area'] : $userdata['co_city_state_area']),
        "department_name"=>$userdata['department_name'],
        "city_name"=>$userdata['city_name'],
        "city_code"=>$userdata['city_code'],
        "streetname"=>$userdata['streetname'],
        "house_number"=>$userdata['house_number'],
        "contact_phone"=>$userdata['contact_phone'],
        "PESEL"=>$userdata['PESEL'],
        "NIP"=>$userdata['NIP'],
        "REGON"=>$userdata['REGON'],
        "contact_email"=>$userdata['contact_email'],
        "website"=>$userdata['website']
    
    ));
    if ($ret2) {$this->db->commit(); return $usrId;}
    
   $this->db->rollback(); 
   return false;
   }
   } catch (PDOException $e) {
     $this->db->rollback(); 
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
     }
      
   
}
  /*
   *  pobieranie danych o użytkowniku (id)
   */

  function mvcms_adm_get_user_data($id){
  
   $user = $this->db->select("SELECT U.*,U.id as user_id, UP.* from mvcms_users U left join mvcms_user_profile UP on U.id=UP.fk_user_id WHERE U.id=:id", array("id"=>$id));
   
   //var_dump($user);
  // $user[0]['password']= sha1($user[0]['usersalt'].$user[0]['password']);
   if (!empty($user)) return $user[0]; else return false;
      
  }
   
   function getUserRoles(){
   
   try {
   $roles =  $this->db->select("SELECT * FROM `mvcms_acl_user_roles");    
   $r = array();
   if($roles){
       foreach($roles as $role){
        $r[$role['id']]=$role['name'];    
           
       }
  return $r; 
       
   }
   
   }
   catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
       
      }    
   }
   
   
  public function mvcms_adm_get_users(){
    try {
        
    $ret = $this->db->select("SELECT *, FROM_UNIXTIME(timestamp,'%Y/%m/%d %H:%i:%s') as logintime, FROM_UNIXTIME(regdate,'%Y/%m/%d %H:%i:%s') as reg_date fROM mvcms_users ORDER BY userlevel DESC, username");
    return $ret;
   
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }
  
  public function get_user($id){
    try {
        
    $user = $this->db->select("SELECT *, FROM_UNIXTIME(timestamp,'%Y/%m/%d %H:%i:%s') as logintime, FROM_UNIXTIME(regdate,'%Y/%m/%d %H:%i:%s') as reg_date fROM mvcms_users WHERE id =$id");
    return $user[0];
    
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }
   
  public function helper_admGetCountryAreas($id=null){
  
 if (!empty($id)) $areas =  $this->db->select("SELECT * FROM mvcms_country_area WHERE wid=:id",array("id"=>$id));    
 else $areas =  $this->db->select("SELECT * FROM mvcms_country_area");    
   
    if ($areas){
    $ars = array();    
        foreach($areas as $a) $ars[$a['id']] = $a['area'];
    return $ars;
   }
   return false;
  }     
  
       
  
  public function helper_admGetCountryStates(){
  $states =  $this->db->select("SELECT * FROM mvcms_country_state");    
   
    if ($states){
    $sts = array();
    $sts[-1] = '-- wybierz województwo --';
        foreach($states as $s) $sts[$s['id']] = $s['state'];
     
        return $sts;
   }
   return false;
  }     
   
};



