<?php

	/**
	*
	*	vHOme: 
	*   
	*	Vista de home on especifiquem la seva plantilla y les 
	*   dades que li passarem
	*
	*	@author: Kevin
	*	@package: app
	*
	**/

	namespace X\App\Views;

	use \X\Sys\View;
	
	class vHome extends View{

		function __construct($dataView){
			parent::__construct($dataView);
			$this->output=$this->render('thome.php');
			//Es important posar que els valors son de $this->output per evitar que agafi el valor de view del controlador de $dataTable, per que si no imprimiria per pantalla el null de dataTable
		}
	}