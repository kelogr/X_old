<?php

	namespace X\Sys;

	class View extends \ArrayObject{ //definim un objecte com una array (es una llibreria standard de php)
		protected $output;
		protected $dataTable;

		public function __construct($dataView,$dataTable=null){ //poder construir 
			parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS); //passar una array amb propietats (array associatiu). a variables 
			if ($dataTable!=null){
				$this->dataTable=$dataTable;
			}
		}
		public function render($fileview){ //Serveix per passar les dades a la plantilla que especifiquem nosaltres
			ob_start();
	 		include APP.'tpl'.DS.$fileview;
	 		return ob_get_clean();
		}
		function show(){
			echo $this->output;
			
			//var_dump($this->output); //Conté totes les dades que passem per l'array i com es mostraria
			//Una forma de comprobar si es passen correctament les dades
		}
	}