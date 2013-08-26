<?php
if(!defined('APPS')) exit ('No direct access allowed');
class tests extends crackerjack{
	private $status = false;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}

	}

	public function index($id = false){
		$data['active_module'] = "tests";
		$data['header_menu'] = true;
		/*$data['tests'] = $this->crud->read('SELECT * FROM _tests WHERE status=1 ORDER BY tests',array(),'obj');
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Course was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}*/
		$this->load->template('xadmin/tests',27,$data);
	}

	public function add($id = false){
		$data['header_menu'] = true;
		$data['active_module'] = "students";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		
		if($result){
			$result['date_created'] = date('Y-m-d H:i:s');
			/*$result['user_id'] = $this->session->_get('uid');*/
				if($this->crud->create('_student',$result)){
					$this->session->_set(array('message'=>true,'action'=>'update'));
					redirect('xadmin/students/index/success/');
				}
		}
	$data['course'] = $this->crud->read('SELECT * FROM _course WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
	$data['section'] = $this->crud->read('SELECT * FROM _section WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
	$data['action'] = 'Add';
	
	$this->load->template('xadmin/students_',$this->acl->isAllowed(26),$data);	
	}

	public function edit($id =false){
		//if($id[0]==null){redirect('xadmin/module');}
		$data['header_menu'] = true;
		$data['active_module'] = "students";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$section_id = $result['section_id'];
				unset($result['section_id']);
				$isupdate = $this->crud->update('_section',$result,array('section_id'=>$section_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/students/index/success/');
					}
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			$data['result'] = $this->crud->read('SELECT * FROM _student WHERE student_id = :id',array(':id'=>$id),'assoc');
			$data['section'] = $this->crud->read('SELECT * FROM _section WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
			$data['action'] = 'Edit';
			$data['course'] = $this->crud->read('SELECT * FROM _course WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
		$this->load->template('xadmin/students_',$this->acl->isAllowed(25),$data);	
	}
	
	public function validate($id = false){
			if($id[0]=="ajax=true"){
				$result = 'false';
				if(isset($_REQUEST['student_number'])){
					$res =  $this->crud->read('SELECT count(*) as count FROM _student WHERE student_number=:student_number',array(':student_number'=>$_REQUEST['student_number']),'assoc');
						
						if($res['count'] <= 0){
								$result = 'true';
						}
				echo $result;
				}
			
			}else{
				require('system/core/error.php');
			}
	}

		public function getcourse(){
			if(isset($_REQUEST['id'])){
				$arr = array();
				$result =  $this->crud->read('SELECT course_id FROM _section WHERE section_id=:sid AND user_id=:id AND status=1',array(':sid'=>$_REQUEST['id'],':id'=>$this->session->_get('uid')),'assoc');
				$arr['course_id'] = $result['course_id'];
				$result =  $this->crud->read('SELECT course FROM _course WHERE course_id=:sid AND status=1',array(':sid'=>$result['course_id']),'assoc');
				$arr['course'] =  $result['course'];
				echo json_encode($arr);
			/*	$res =  $this->crud->read('SELECT count(*) as count FROM _subject WHERE subject=:subject AND course_id = :cid AND user_id=:id',array(':subject'=>$_REQUEST['subject'],':id'=>$this->session->_get('uid'),'cid'=>$_REQUEST['course_id']),'assoc');
						
						if($res['count'] <= 0){
								$result = 'true';
						}
			*/
			
			}else{
				require('system/core/error.php');
			}

	}
	
	
}