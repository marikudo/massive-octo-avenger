<?php
class actions extends crackerjack{
	
	public function __construct(){
		parent::__construct();
	}
	public function index(){
	echo "oops";
	}
	
	public function delete($id = false){
		if(isset($_POST['_delete'])){
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
			}

	}

}






