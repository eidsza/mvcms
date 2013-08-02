<?php

/**
* Loader class file.
*
* @author Federico Ramirez <fedekiller@gmail.com>
* @link http://code.google.com/p/akaikiwi/
* @copyright Copyright &copy; 2008-2011 Federico Ramirez
* @license http://www.opensource.org/licenses/mit-license.php MIT Licence
*/

/*
* Main akaikiwi loader, in charge of loading all helpers and libraries.
*/
class myLoader {
        private $libraries = array();
        private $helpers = array();

        /**
         * Add a new library to the loader.
         * @param String $name
         */
        public function addLib($name, $singleton = TRUE) {
                $this->libraries[$name] = array(
                        'name'          =>      $name,
                        'singleton'     =>      $singleton,
                        'lib'           =>      NULL,
                );
        }

        /**
         * Add a new helper to the loader
         * @param String $name
         */
        public function addHelper($name) {
                $this->helpers[] = $name;
                $this->helpers[$name] = FALSE;
        }

        /**
         * Loads and returns the requested library.
         * It wont load it if it was loaded before, it will just return it.
         * @param String $name
         */
        public function loadLib($name) {
                if($this->libraries[$name]['singleton']) {
                        if($this->libraries[$name]['lib'] == NULL) {
                                $this->libraries[$name]['lib'] = new $name;
                        }
                        return $this->libraries[$name]['lib'];
                } else {
                        return new $name;
                }
        }

        /**
         * Loads and returns the requested helper.
         * It wont load it if it was loaded before, it will just return it.
         * @param String $name
         */
        public function loadHelper($name) {
                if(!array_key_exists($name, $this->helpers) || $this->helpers[$name] == FALSE) {
                        if(file_exists('app/helpers/'.$name.'.php')) {
                                include_once 'app/helpers/'.$name.'.php';
                        } else {
                                include_once 'akaikiwi/helpers/'.$name.'.php';
                        }
                        $this->helpers[$name] = TRUE;
                }
        }
}
