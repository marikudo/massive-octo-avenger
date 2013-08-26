<?php

class account extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}


	}
	public function index(){
		//echo $this->acl->isAllowed(1);
		/*$result = $this->crud->read('SELECT _read FROM _permission WHERE user_id=:id AND role_id=:role AND module_id=:module',array(':id'=>$this->session->_get('uid'),':role'=>$this->session->_get('role_id'),':module'=>1),'obj');
		echo $result[0]->_read;	
		//$result = $this->crud->read('SELECT _read FROM _permission WHERE user_id=:id',array(':id'=>$this->session->_get('uid')),'num');
				print_r($result);*/
		$data['class'] = $this;
		$this->load->template('xadmin/account_settings',$this->acl->isAllowed(1),$data);
	}
	
	/*
	* settings function
	* function to change your email and password
	*/
	public function settings(){
	$data['smenu'] = 'settings';
	$this->load->libraries(array('hash','form'));
	if(isset($_POST['changeemail'])){
		$result = $this->form->post('changeemail');
		$email = $result['inputEmail'];
		$password = $result['inputPasswordx'];
			if(empty($email) || empty($password)){
				$data['message'] = "<div class='alert alert-error alert-fade'>Enter email and password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$result =  $this->user->email($this->session->_get('uid'),$email,$password);
					
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Email is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
			
			}
	}
	if(isset($_POST['changepassword'])){
		//$oldpassword = r_string($_POST['inputOldPassword']);
	///	$newpassword = r_string($_POST['newpassword']);

		$passresult = $this->form->post('changepassword');

		if(empty($passresult['newpassword']) || empty($passresult['inputOldPassword'])){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
		}else{
		$result =  $this->user->changepassword($this->session->_get('uid'),$passresult['inputOldPassword'],$passresult['newpassword']);
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Password is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
			$data['message'] = "<div class='alert alert-error alert-fade'>Old Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
		}
	}
	/*	$this->load->render('xadmin/common/head_');
		$this->load->render('xadmin/account_settings',$data);
		$this->load->render('xadmin/common/footer_'); */
	
	$this->load->template('xadmin/account_settings',$this->acl->isAllowed(),$data);
	}

	/*
	* account information
	* function to modify your information
	* 
	*/

	public function information($id = false){
		$data['smenu'] = 'information';
		$data['edit'] = $id[0];
		if(isset($_POST['changeinfomation'])){
			unset($_POST['changeinfomation']);
			if(empty($_POST['address'])){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter Company name and Address.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$info = array();
				foreach($_POST as $key =>$val){
					$info[$key] = r_string($val);
				}
				$result = $this->user->changeinformation($this->session->_get('uid'),$info);
				if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Information is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Problem updating information.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
			}
		}
		$this->load->template('xadmin/account_information',$this->acl->isAllowed(),$data);
	}


	
}