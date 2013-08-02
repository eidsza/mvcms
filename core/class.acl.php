<?php
class ecms3ACL extends conn {
 	var
    $db_name,		/* DB Settings */
		$db_host,
		$db_user,
		$db_password,
		$connection,
		$smarty,
		$php_mailer,
		$cmsacl,
    $cms3_resources,
    $cms3_roles,
    $cms3_role_permitions
    ;
		
		public function __construct(){
    $this->db_host = DB_SERVER;
		$this->db_name = DB_NAME;
		$this->db_user = DB_USER;
		$this->db_password = DB_PASS;
		
		
		$resources = $this->_get_user_resources();
		$this->cms3_resources = $resources;
		$roles= $this->_get_user_roles();
		
	
    $this->cms3_roles = $roles;
    $permitions = $this->_get_user_permissions();
    
    //var_dump($permitions);
    
    $this->cmsacl = new Zend_Acl();
    
    $this->_set_user_roles($roles);
    $this->_set_user_resources($resources);
    $this->_set_user_permissions($permitions);
		
  
    
    }

    
    
    private function _set_user_permissions($permissions){
    foreach($permissions as $perms) { //Add the permissions to the ACL
		
    	$perms['has_access'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'has_access') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'has_access');
			
			$perms['add'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'add') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'add');
			$perms['modify'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'modify') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'modify');
			$perms['modify_own'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'modify_own') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'modify_own');
		  $perms['delete'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'delete') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'delete');
			$perms['delete_own'] == '1' ? 
				$this->cmsacl->allow($perms['role'], $perms['resource'], 'delete_own') : 
				$this->cmsacl->deny($perms['role'], $perms['resource'], 'delete_own');
      
						
		}
    
    $this->cmsacl->allow('1'); //Change this to whatever id your adminstrators group is
    
    }
    
    private function _set_user_roles($roles){
    foreach ($roles as $row) { //Add the roles to the ACL
		
      $role = new Zend_Acl_Role($row['id']);
			$row['parentId'] != null ?
				$this->cmsacl->addRole($role,$row['parentId']): 
				$this->cmsacl->addRole($role);
		}
    
    }
    
    private function _set_user_resources($resources){
    foreach ($resources as $row) { //Add the roles to the ACL
		
      $resource = new Zend_Acl_Resource($row['id']);
		  $row['parentId'] != null ?
				$this->cmsacl->add($resource, $row['parentId']):
				$this->cmsacl->add($resource);
		}
    
    }
    
    
    private function _get_user_resources(){
      try {
       
      $dbh = $this->dbConnect();
      $sql = sprintf("select * from ecms3_acl_user_resources");
     
      $stmt = $dbh->query($sql);
      $result = $stmt->fetchAll();
      $this->dbClose();
      $stmt = null;
      return $result;
      
      }
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  
    }
    
    private function _get_user_roles(){
      try {
       
      $dbh = $this->dbConnect();
      $sql = sprintf("select * from ecms3_acl_user_roles");
     
      $stmt = $dbh->query($sql);
      $result = $stmt->fetchAll();
      $this->dbClose();
      $stmt = null;
      return $result;
      
      }
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  
    }
    
    private function _get_user_permissions(){
      try {
       
      $dbh = $this->dbConnect();
      $sql = sprintf("select * from ecms3_acl_user_permissions");
     
      $stmt = $dbh->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $result = $stmt->fetchAll();
      $this->dbClose();
      $stmt = null;
      return $result;
      
      }
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  
    }
    
    public function _get_role_permissions($role_id){
      try {
       
      $dbh = $this->dbConnect();
      $sql = sprintf("select * from ecms3_acl_user_permissions WHERE role = $role_id");
      
      $stmt = $dbh->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $result = $stmt->fetchAll();
      $this->dbClose();
      $stmt = null;
      $this->ecms3_role_permitions = $result;
      return $result;
      
      }
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  
    }


  function can_access($role, $resource) {
	return $this->cmsacl->isAllowed($role, $resource, 'has_access')? TRUE : FALSE;
	}
	function can_show_list($role, $resource) {
		return $this->cmsacl->isAllowed($role, $resource, 'show_list')? TRUE : FALSE;
	}
	function can_add($role, $resource) {
		return $this->cmsacl->isAllowed($role, $resource, 'add')? TRUE : FALSE;
	}
	function can_modify($role, $resource) {
		return $this->cmsacl->isAllowed($role, $resource, 'modify')? TRUE : FALSE;
	}
	function can_modify_own($role, $resource) {
		return $this->cmsacl->isAllowed($role, $resource, 'modify_own')? TRUE : FALSE;
	}
  function can_delete($role, $resource) {
	 return $this->cmsacl->isAllowed($role, $resource, 'delete')? TRUE : FALSE;
	}
	function can_delete_own($role, $resource) {
	 return $this->cmsacl->isAllowed($role, $resource, 'delete_own')? TRUE : FALSE;
	}
	function can_publish($role, $resource) {
	 return $this->cmsacl->isAllowed($role, $resource, 'publish')? TRUE : FALSE;
	}
	




}
?>