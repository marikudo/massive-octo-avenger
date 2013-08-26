
<?php
	if(!defined('APPS')) exit ('No direct access allowed');
	
	class sample extends crackerjack{
		
		public function __construct(){
			parent::__construct();
		}
	
		public function index(){
			//todo here

			print_r($_POST);
	
		}
	
	}