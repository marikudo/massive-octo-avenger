<?php

class users extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
	}
	public function index(){

				$data['class'] = $this;
		$this->load->template('xadmin/users_',$this->acl->isAllowed(19),$data);

	}
}