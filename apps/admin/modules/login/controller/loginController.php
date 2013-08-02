<?php

Class loginController extends baseController {
    /*
     * @registry object
     */

    public $registry;
    private $time;
    private $current_user = false;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('user');

        $this->load->library('form/val');
        $this->load->library('form/my_form');
        $this->time = time();
    }

    /**
     * @all controllers must contain an index method
     */
    function index() {
        self::login();
    }

    /*
      private function _check_access()
      {
      // These pages get past permission checks
      $ignored_pages = array('admin/login', 'admin/logout', 'admin/help');

      // Check if the current page is to be ignored
      $current_page = $this->registry->_controller;
      //print_r($current_page);

      // Dont need to log in, this is an open page
      if (in_array($current_page, $ignored_pages))
      {
      return TRUE;
      }
      else if ( ! $this->current_user)
      {
      //redirect('admin/login');
      return false;
      }

      // Admins can go straight in
      else if ($this->current_user->group === 'admin')
      {
      return TRUE;
      }

      // Well they at least better have permissions!
      else if ($this->current_user)
      {
      /*
      // We are looking at the index page. Show it if they have ANY admin access at all
      if ($current_page == 'admin/index' && $this->permissions)
      {
      return TRUE;
      }
      else
      {
      // Check if the current user can view that page
      return array_key_exists($this->module, $this->permissions);
      }
      /
      return true;
      }

      // god knows what this is... erm...
      return FALSE;
      }

     */

    function login() {

        $this->template->build('login', null, false);
    }

    function logout() {
        /**
         * Delete cookies - the time must be in the past,
         * so just negate what you added when creating the
         * cookie.
         */
        if (isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])) {


            $cookie_expire = 365;
            $cookie_path = '/';

            setcookie("cookname", "", time() - 60 * 60 * 24 * $cookie_expire, $cookie_path);
            setcookie("cookid", "", time() - 60 * 60 * 24 * $cookie_expire, $cookie_path);
        }

        /* Unset PHP session variables */
        unset($_SESSION['username']);
        unset($_SESSION['userid']);

        /* Reflect fact that user has logged out */
        $this->registry->logged_in = false;

        /**
         * Remove from active users table and add to
         * active guests tables.
         */
        //$database->removeActiveUser($this->username);
        //$database->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);

        /* Set user level to guest */
        $this->registry->username = 'GUEST_NAME';
        $this->registry->userlevel = 'GUEST_LEVEL';

        /* Destroy session */
        session_destroy();
        self::login();
    }

    function check($arg) {

        $retval = $this->_process_login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
        if ($retval) {
            unset($_SESSION['error_array']);
            header("Location: ../index");
        } else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $this->registry->my_form->getErrorArray();
            //var_dump($_SESSION['error_array']);

            header("Location: admin/login");
        }
    }

    function _process_login($subuser, $subpass, $subremember) {
        /* Checks that username is in database and password is correct */
        $subuser = stripslashes($subuser);

        $this->registry->my_form
                ->post('user')->val('minlength', array("field" => "Użytkownik", "length" => 5))
                ->post('pass')->val('minlength', array("field" => "hasło", "length" => 5))->val('alphanumeric', array("field" => "hasło", "length" => 2));

        if (!$this->registry->my_form->validate())
            return false;

        //var_dump($this->registry->my_form->fetch());   

        $result = $this->registry->user_model->confirmUserPass($subuser, $subpass);

        /* Check error codes */

        if ($result == 1 || $result == 2) {

            $this->registry->my_form->setError("user", "Nieprawidłowy login lub hasło");
        } else if ($result == 3) {

            $this->registry->my_form->setError('user', "* Your account has not been activated yet");
        } else if ($result == 4) {

            $this->registry->my_form->setError('user', "* Your account has not been activated by admin yet");
        }

        /* Return if form errors exist */
        if ($this->registry->my_form->num_errors > 0) {
            return false;
        }



        /* Username and password correct, register session variables */

        if ($result == 0) {


            $this->registry->userinfo = $this->registry->user_model->getUserInfo($subuser);

            $this->registry->username = $_SESSION['username'] = $this->registry->userinfo['username'];
            $this->registry->userid = $_SESSION['userid'] = $this->generateRandID();
            $this->registry->userlevel = $this->registry->userinfo['userlevel'];

            /* Insert userid into database and update active users table */
            $this->registry->user_model->updateUserField($this->registry->username, "userid", $this->registry->userid);
            $this->registry->user_model->addActiveUser($this->registry->username, $this->time);
            $this->registry->user_model->removeActiveGuest($_SERVER['REMOTE_ADDR']);
        }
        /**
         * This is the cool part: the user has requested that we remember that
         * he's logged in, so we set two cookies. One to hold his username,
         * and one to hold his random value userid. It expires by the time
         * specified in the admin configuration panel. Now, next time he comes to 
         * our site, we will log him in automatically, but only if he didn't log 
         * out before he left.
         */
        if ($subremember) {

            //$config = $database->getConfigs();


            $cookie_expire = 365;
            $cookie_path = '/';

            setcookie("cookname", $this->registry->username, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path);
            setcookie("cookid", $this->registry->userid, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path);
        }

        /* Login completed successfully */
        return true;
    }

    /**
     * generateRandID - Generates a string made up of randomized
     * letters (lower and upper case) and digits and returns
     * the md5 hash of it to be used as a userid.
     */
    function generateRandID() {
        return md5($this->generateRandStr(16));
    }

    /**
     * generateRandStr - Generates a string made up of randomized
     * letters (lower and upper case) and digits, the length
     * is a specified parameter.
     */
    function generateRandStr($length) {
        $randstr = "";
        for ($i = 0; $i < $length; $i++) {
            $randnum = mt_rand(0, 61);
            if ($randnum < 10) {
                $randstr .= chr($randnum + 48);
            } else if ($randnum < 36) {
                $randstr .= chr($randnum + 55);
            } else {
                $randstr .= chr($randnum + 61);
            }
        }
        return $randstr;
    }

}

?>
