<?php

function islogin(){
		$mvc =& getInstance();
		if($mvc->session->_get('islogin')==true){
			return true;
		}else{
			return false;
	}
}
