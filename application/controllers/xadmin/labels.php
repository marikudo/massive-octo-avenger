<?php
if(!defined('APPS')) exit ('No direct access allowed');
class labels extends crackerjack{
	private $status;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}

	}

	public function index($id = false){
		
		$data['labels'] = $this->crud->read('SELECT * FROM _module_label',array(),'obj');
		$this->load->template('xadmin/labels',$this->acl->isAllowed(2),$data);
	}


	public function add($id = false){
		echo 1;
	}

}