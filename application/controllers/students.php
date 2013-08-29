<?php
class students extends crackerjack{
	public function __construct(){
		parent::__construct();
		if(isAdmin()==true){
			redirect('xadmin/main');
		}
	}

	public function index(){
		echo "welcome student";
	
	}


}
