<?php
/*
* Loader file for the MVC framework
*
*/
if(!defined('APPS')) exit ('No direct access allowed');

class Loader{

	protected static $instance;
	public function __construct(){
			global $config;
			self::$instance =& $this;
			$this->auto_models($config['models']);
			$this->auto_helpers($config['helpers']);
			$this->auto_libraries($config['libraries']);
			if(!empty($config['time_zone'])){
				date_default_timezone_set($config['time_zone']);
			}
	}

	/*
	param @template: require your templates
	*/
	public function render($name = '',array $data = NULL,$template = false){
		if(file_exists($file = VIEWS.$name.EXT)){
				if(isset($data)){
					extract($data);
				}
				if($template){
					if(file_exists($header = VIEWS.'xadmin/common/'.$template[0].EXT) AND file_exists($footer = VIEWS.'xadmin/common/'.$template[1].EXT)){
							require($header);
							require($file);
							require($footer);
					}
				}else{
				require($file);
				}
			return TRUE;
			
		}
		throw new Exception("Error Processing view ".$name, 1);
	}

	public function template($body,$module = false,$data = false){
		$mvc = Registry::getInstance();
		$data['info'] = $mvc->user->information($mvc->session->_get('uid'));
		$data['menu'] = $mvc->user->navigation();
		$acl= $mvc->user->acl($module);
			if($mvc->session->_get('uid')==1){
				$acl = array('_create' => 1,'_update' => 1,'_delete' => 1,'_read' => 1,'_export' => 1,'_print' => 1);
			}
		$this->render('xadmin/common/head_',$data);
			if($acl['_read']!=false || $acl['_read']!=0) {
						# code...
					$this->render($body,$data);
				}else{
					echo 'no permission';
				}
		
		$this->render('xadmin/common/footer_',$data);
	}

	public function model($name){
		$this->auto_models($name);
	}

	public function helper($name){
		$this->auto_helpers($name);
	}

	public function libraries($name){
		$this->auto_libraries($name);
	}
	private function auto_models($name){
		if(is_array($name)){
			foreach ($name as $value) {
				# code...
				$file = CORE.$value.EXT;
				$apps = APPS.'models'.DS.$value.EXT;

				if(file_exists($file)){
					require_once $file;
				}else{
					require_once $apps;
				}
				$mvc =Registry::getInstance();
				$mvc->$value = new $value();
			}
			return;
		}
		throw new Exception("cannot access non-array variable", 1);
		
	}

	private function auto_helpers($helper){
		if(is_array($helper)){
			foreach ($helper as $value) {
				# code...

				$system = SYSHELPER.$value.EXT;
				$app = APPS.'helpers'.DS.$value.EXT;

					if(file_exists($system)){
						require_once $system;
					}
					if(file_exists($app)){
						require_once $app;
					}	

			}
			return;
		}
		throw new Exception("cannot access non-array variable", 1);

	}


	private function auto_libraries($libs){
		if(is_array($libs)){
			foreach ($libs as $value) {
				# code...

				$libraries = LIBS.$value.EXT;
				$systemlibraries = SYSLIBS.$value.EXT;
				
					if(file_exists($libraries)){
						require_once $libraries;
					}
					if(file_exists($systemlibraries)){
						require_once $systemlibraries;
					}
					$lib =Registry::getInstance();
					$lib->$value = new $value();
			}
			return;
		}else{
			$systemlibraries = SYSLIBS.$libs.EXT;
			if(file_exists($systemlibraries)){
						require_once $systemlibraries;
					}
					$lib = Registry::getInstance();
					$lib->$libs = new $libs();
					return;
		}
		throw new Exception("Error Processing Libary", 1);
		
	}


}