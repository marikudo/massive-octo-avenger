<?php

class role extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
	}
	public function index(){
	/*	if(isset($_POST['_delete'])){
				$id = $_POST['id'];
					$result = $this->crud->read("SELECT role_id FROM _users WHERE role_id=:id",array('id'=>$id),'obj');
					if(empty($result)){
						$result = $this->crud->delete('_role',array('role_id' => $id));
						$result = $this->crud->delete('_permission',array('role_id' => $id));
						echo 1;
					}else{
						echo 0;
					} 
				return false;
			}*/
		$this->load->model(array('admin'));
		$data['userRole']  = $result=  $this->crud->read('SELECT * FROM _role',array(),'obj');
		$childList = array();
		foreach ($result as $key => $value) {
				# code...
				$childList[$value->role_id] =  $this->admin->getChild($value->role_id);
			}
		$data['child'] = $childList;
		$this->load->render('xadmin/role_',$data,array('head_','footer_'));
	}
	
	public function create(){
		print_r($_POST);
		$this->load->libraries(array('form'));
		if(isset($_POST['role'])){
			$role = $permission = $this->form->post();
			unset($role['_read']);
			unset($role['_update']);
			unset($role['_create']);
			unset($role['_delete']);
			unset($permission['role']);
			$role_id = $this->crud->create('_role',$role);
			$permission['role_id'] = $role_id;
			$role_id = $this->crud->create('_permission',$permission);
		}
		
		$this->load->render('xadmin/role_create',$data,array('head_','footer_'));
	}
	
	public function edit($id = false){
		$key = explode("==",$id[0]);
		$data['id'] = $key;
		$this->load->render('xadmin/role_edit',$data,array('head_','footer_'));
	}
}