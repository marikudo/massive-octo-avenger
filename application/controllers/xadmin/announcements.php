<?php
if(!defined('APPS')) exit ('No direct access allowed');
class announcements extends crackerjack{
	private $status = false;
	public function __construct(){
		parent::__construct();
			if(islogin()==false){redirect('main');}

	}

	public function index($id = false){
		$data['active_module'] = "announcements";
		$data['subjects'] = $this->crud->read('SELECT * FROM _subject INNER JOIN _course ON _subject.course_id = _course.course_id WHERE _subject.user_id=:id ORDER BY _subject.subject',array('id'=>$this->session->_get('uid')),'obj');
		$data['header_menu'] = true;
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 10px;margin-bottom: 10px;">Course was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$this->load->template('xadmin/announcements',28,$data);
	}

	public function add($id = false){
		$data['header_menu'] = true;
		$data['active_module'] = "subjects";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		if($result){
			$result['date_created'] = date('Y-m-d H:i:s');
			$result['user_id'] = $this->session->_get('uid');
				if($this->crud->create('_subject',$result)){
					$this->session->_set(array('message'=>true,'action'=>'update'));
					redirect('xadmin/subjects/index/success/');
				}
		}
	$data['course'] = $this->crud->read('SELECT * FROM _course WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
	$data['action'] = 'Add';
	
	$this->load->template('xadmin/subjects_',$this->acl->isAllowed(26),$data);	
	}

	public function edit($id =false){
		//if($id[0]==null){redirect('xadmin/module');}
		$data['header_menu'] = true;
		$data['active_module'] = "subjects";
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$section_id = $result['subject_id'];
				unset($result['subject_id']);
				$isupdate = $this->crud->update('_subject',$result,array('section_id'=>$section_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/subjects/index/success/');
					}
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			$data['result'] = $this->crud->read('SELECT * FROM _subject WHERE subject_id = :id',array(':id'=>$id),'assoc');
			$data['action'] = 'Edit';
			$data['course'] = $this->crud->read('SELECT * FROM _course WHERE user_id=:id',array('id'=>$this->session->_get('uid')),'obj');
			$this->load->template('xadmin/subjects_',$this->acl->isAllowed(26),$data);	
	}
	
	public function validate($id = false){
			if($id[0]=="ajax=true"){
				$result = 'false';
				if(isset($_REQUEST['subject'])){
					$res =  $this->crud->read('SELECT count(*) as count FROM _subject WHERE subject=:subject AND course_id = :cid AND user_id=:id',array(':subject'=>$_REQUEST['subject'],':id'=>$this->session->_get('uid'),'cid'=>$_REQUEST['course_id']),'assoc');
						
						if($res['count'] <= 0){
								$result = 'true';
						}
				echo $result;
				}
			
			}else{
				require('system/core/error.php');
			}
	}


	
	
}