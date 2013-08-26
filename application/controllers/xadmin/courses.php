<?php
if(!defined('APPS')) exit ('No direct access allowed');
class courses extends crackerjack{
	private $status = false;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}

	}

	public function index($id = false){
		$data['active_module'] = "courses";
	
		$data['course'] = $this->crud->read('SELECT * FROM _course WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
		$data['header_menu'] = true;
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Course was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$this->load->template('xadmin/course',1,$data);
	}

	public function add($id = false){
		$data['header_menu'] = true;
		$data['active_module'] = "courses";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		if($result){
			$result['date_created'] = date('Y-m-d H:i:s');
			$result['user_id'] = $this->session->_get('uid');
				if($this->crud->create('_course',$result)){
					$this->session->_set(array('message'=>true,'action'=>'update'));
					redirect('xadmin/courses/index/success/');
				}
		}
	$data['action'] = 'Add';
	$this->load->template('xadmin/course_',$this->acl->isAllowed(24),$data);	
	}

	public function edit($id =false){
		//if($id[0]==null){redirect('xadmin/module');}
		$data['header_menu'] = true;
		$data['active_module'] = "courses";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$module_id = $result['course_id'];
				unset($result['course_id']);
				$isupdate = $this->crud->update('_course',$result,array('course_id'=>$module_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/courses/index/success/'.$isupdate);
					}
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			$data['result'] = $this->crud->read('SELECT * FROM _course WHERE course_id = :id',array(':id'=>$id),'assoc');
			$data['action'] = 'Edit';
		
		$this->load->template('xadmin/course_',$this->acl->isAllowed(24),$data);	
	}
	
	public function validate($id = false){
			if($id[0]=="ajax=true"){
				$result = 'false';
				if(isset($_REQUEST['course'])){
					$res =  $this->crud->read('SELECT count(*) as count FROM _course WHERE course=:course AND user_id=:id',array(':course'=>$_REQUEST['course'],':id'=>$this->session->_get('uid')),'assoc');
						
						if($res['count'] <= 0){
						
								$result = 'true';
							
						}
						
						
					
				echo $result;
				}
				if(isset($_REQUEST['course_code'])){
				$resx =  $this->crud->read('SELECT count(*) as count FROM _course WHERE course_code=:course_code AND user_id=:id',array(':course_code'=>$_REQUEST['course_code'],':id'=>$this->session->_get('uid')),'assoc');
					if($resx['count'] <= 0){
							$result = 'true';
					}
				echo $result;
				}
				
				
			}else{
				require('system/core/error.php');
			}
	}
	
	
}