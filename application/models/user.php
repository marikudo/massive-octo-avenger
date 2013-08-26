<?php
class user extends crackerjack_model{
	private $info = array();
	private $result = array();
	public function __construct(){
	parent::__construct();

	}
	
	public function info($id){
		$info = $this->crud->read('SELECT email_address,firstname,lastname,contact_number,mobile_number,company_name,address FROM _users WHERE user_id=:id',array('id'=>$id),'obj');
		return $info[0];
	}


	public function information($id){
		/*
		* Fetch user info
		*/
		$this->result = $this->crud->read('SELECT * FROM _users WHERE user_id = :id',array(':id'=>$id),'assoc');
		
		/* remove login security */
		unset($this->result['password']);
		unset($this->result['varKey']);

		$this->info = $this->result;
		
		/* get the role of the user*/
		$role = $this->crud->read('SELECT role FROM _role WHERE role_id=:rid',array(':rid'=>$this->result['role_id']),'assoc');
		$this->info['role'] = $role['role'];

		return $this->info;
	}


	public function acl($module_id){
		/* get the the permission according to role*/
				return $this->crud->read('SELECT * FROM _permission WHERE role_id=:rid AND module_id=:mid',array(':rid'=>$this->result['role_id'],':mid'=>$module_id),'assoc');
	}
	
	
	public function changepassword($id,$old,$pass){
	//fetch old password
		$info = $this->crud->read('SELECT varKey,password FROM _users WHERE user_id = :id',array(':id'=>$id),'obj');

		$info = $info[0];
		$this->hash->hash_encryption($info->varKey);
		$password = $this->hash->decrypt($info->password);
		//echo $old." - ".$password;
		if($password==$old){
			
			//if password is match create new key for new password
				$vars = $this->hash->varkeydump();
				$this->hash->hash_encryption($vars);
				$data['varKey'] = r_string($vars);
				$data['password'] =  $this->hash->encrypt($pass);
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('user_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function email($id,$email,$password){
		$info = $this->crud->read('SELECT varKey,password FROM _users WHERE user_id = :id',array(':id'=>$id),'obj');
		$info = $info[0];
		$this->hash->hash_encryption($info->varKey);
		$passworddb = $this->hash->decrypt($info->password);
		//print_r($info);
		if($password==$passworddb){
			//if password is match create new key for new password
				$data['email_address'] = $email;
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('user_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function changeinformation($id,$vals){
		return $this->crud->update('_users',$vals,array('user_id'=>$id));
	}

	/*
	* print navigation
	*/
	public function navigation(){

		$menu_label = array();
		$menu =  $this->crud->read('SELECT * FROM _module_label',array(),'obj');
		//$menu = $this->user->navigation($this->session->_get('uid'));
			foreach ($menu as $key => $value) {
					$module = $this->crud->read('SELECT module,reference_id,url,module_id,_create,_read,_update,_delete,_export,_print FROM _module WHERE reference_id=:id AND status=1',array(':id'=>$value->label_id),'obj');

						foreach ($module as $xk => $xv) {
							# code...
							if($value->label_id==$xv->reference_id){
								$menu_label[$xv->reference_id]['module'] = $module;
								$menu_label[$xv->reference_id]['label'] = $value->label;
							}
						}

			}
		return $menu_label;
	}
}