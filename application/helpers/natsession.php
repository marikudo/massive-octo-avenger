<?php

function islogin(){
		$mvc =& getInstance();
			return ($mvc->session->_get('islogin')==true) ?  true : false;
	}
	
function isAdmin(){
	$mvc =& getInstance();
		if(islogin()==true){
			if($mvc->session->_get('uid')==1){
				return ($mvc->session->_get('uid')==1) ?  true : false;
			}
		}else{
			redirect('main');
		}
}