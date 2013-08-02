<?php
/*
class Auth {
	private $_siteKey;

	public function __construct()
  	{
		$this->siteKey = 'my site key will go here';
	}

  private function randomString($length = 50)
  {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$string = '';    
		
	 for ($p = 0; $p < $length; $p++) {
		$string .= $characters[mt_rand(0, strlen($characters))];
	 }
		
      	return $string;
  }
  
  protected function hashData($data)
    	{
		return hash_hmac('sha512', $data, $this->_siteKey);
	}

  public function isAdmin()
  {		
	//$selection being the array of the row returned from the database.
	if($selection['is_admin'] == 1) {
		return true;
	}
		
	return false;
  }
  
  public function createUser($email, $password, $is_admin = 0)
  {			
	//Generate users salt
	$user_salt = $this->randomString();
			
	//Salt and Hash the password
	$password = $user_salt . $password;
	$password = $this->hashData($password);
			
	//Create verification code
	$code = $this->randomString();

	//Commit values to database here.
	$created = …

	if($created != false){
		return true;
	}
			
	return false;
  }
  
  public function login($email, $password)
{
	//Select users row from database base on $email
	$selection = ...
		
	//Salt and hash password for checking
	$password = $selection[0]['user_salt'] . $password;
	$password = $this->hashData($password);
		
	//Check email and password hash match database row
		
	//Convert to boolean
	$is_active = (boolean) $selection['is_active'];
	$verified = (boolean) $selection['verified'];
		
	if($match == true) {
		if($is_active == true) {
			if($verified == true) {
				//Email/Password combination exists, set sessions
				//First, generate a random string.
				$random = $this->randomString();
				//Build the token
				$token = $_SERVER['HTTP_USER_AGENT'] . $random;
				$token = $this->hashData($token);
					
				//Setup sessions vars
				session_start();
				$_SESSION['token'] = $token;
				$_SESSION['user_id'] = $selection[0]['id'];
					
				//Delete old logged_in_member records for user
				
				//Insert new logged_in_member record for user
				$inserted = …

				//Logged in
				if($inserted != false) {
					return 0;
				} 
					
				return 3;
			} else {
				//Not verified
				return 1;
			}
		} else {
			//Not active
			return 2;
		}
	}
		
	//No match, reject
	return 4;
 }
 
 public function checkSession()
  {
	//Select the row
	$selection =  ...
		
		
	if($selection) {
		//Check ID and Token
		if(session_id() == $selection['session_id'] && $_SESSION['token'] == 				$selection['token']) {
			//Id and token match, refresh the session for the next request
			$this->refreshSession();
			return true;
		}
	}
		
	return false;
  }
  
  private function refreshSession()
  {
	//Regenerate id
	session_regenerate_id();
		
	//Regenerate token
	$random = $this->randomString();
	//Build the token
	$token = $_SERVER['HTTP_USER_AGENT'] . $random;
	$token = $this->hashData($token); 
		
	//Store in session
	$_SESSION['token'] = $token;
	}

  public function sendVerification($user_id){
  //$email = users email taken from table
  $subject = 'Your verification code';
  $header = 'Sent by my website';
  $message = 'Your verification code is' . $verification_code;
  
  mail($email,$subject,$message,$header);
  }
  
  public function logout($user_id){
  
  }
} 
 * 
 */

?>
  











