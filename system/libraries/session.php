<?php
/**
 *  Session
 */

if(!defined('APPS')) exit ('No direct access allowed');

 if(session_start() == false){
          session_start();
         }

class session{

    public function __contruct(){
    	
       
    }

    public function _set($var){
        if (is_array($var)) {
        # code...
            foreach ($var as $key => $value) {
            # code...
               $_SESSION["$key"] = "$value";
            }
        }
    }

    public function _get($key) {
             if (!isset($_SESSION["$key"])) {
                $_SESSION["$key"] = "";
            } 

        return $_SESSION["$key"];
    }

    public function _destroy(){
            session_destroy();
            session_unset();
        
    }

    public function islogin(){
    	return ($this->_get('islogin')==TRUE) ? TRUE : FALSE;
    }
}