<?php
class student extends crackerjack{
	public function __construct(){
		parent::__construct();
		if(isAdmin()==true){
			//redirect('xadmin/main');
			//uncomment redirect if for deployment
		}
	}

	public function index(){
		$data['page_title'] = "Dashboard";
		
	}
	
	public function account($id = false){
		$data['page_title'] = "Account";
		switch($id[0]){
			case 'information':
				$data['page_title'] = "Account Information";
				
			break;
			case 'settings':
				$data['page_title'] = "Account Settings";
			break;
			default:
				echo 'information and settings page';
			break;
		
		}
	
	}
	
	public function tests($id = false){
		$data['page_title'] = "Tests";
		$id = empty($id[0]) ? 'all' : $id[0];
	
	}
	
	public function assignments($id = false){
		$data['page_title'] = "Assigments";
		$id = empty($id[0]) ? 'all' : $id[0];
	}
	
	public function my_gradebook($id =false){
		$data['page_title'] = "My Gradebook";
	}


}
