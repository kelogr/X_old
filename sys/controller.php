<?php
	namespace X\Sys;
	/**
	*
	*   Controller: Es el controlador central del sistema MVC
	*
	*	@author: Kevin
	*	@package: sysS
	*
	**/

	class Controller{
		protected $model;
		protected $view;
		protected $params;
		function __construct($params){
			$this->params=$params;
		}
		
		function ajax($output){
			ob_clean();
			if(is_array($output)){
				echo json_encode($output);
			}
		}

	}