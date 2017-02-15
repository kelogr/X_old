<?php

	/**
	*
	*	vUsers: 
	*   
	*	Vista de users on especifiquem la seva plantilla y les 
	*   dades que li passarem
	*
	*	@author: Kevin
	*	@package: app
	*
	**/

	namespace X\App\Views;

	use \X\Sys\View;
	
	class vUsers extends View{

		function __construct($dataView){
			parent::__construct($dataView);
			$this->output=$this->render('tusers.php');
			//Es important posar que els valors son de $this->output per evitar que agafi el valor de view del controlador de $dataTable, per que si no imprimiria per pantalla el null de dataTable
		}
	}