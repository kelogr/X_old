<?php

   /**
   *
   *  Home: 
   *   
   *     Es el controlador principal, al que accedirem en     primera instancia o especificarem a l'url
   *
   *
   *  @author: Kevin
   *  @package: app
   *
   **/

   namespace X\App\Controllers;

   use X\Sys\Controller;

   class Home extends Controller{
   		protected $model;
   		protected $view;
   		protected $params;

   		public function __construct($params){
   			parent::__construct($params);
            /**
            *
            *  Estem guardant a una array els valors que volem pasar a les plantilles, i ho passarem a través de la creació de la nova classe
            *
            **/

            $this->dataView=array(
               'title'=>'Home',
               'name'=>'Kevin');
   			$this->model=new \X\App\Models\mHome();
   			$this->view =new \X\App\Views\vHome($this->dataView);
            echo "<hr><br>Porta l'informació a la vista del nostre controlador";
            var_dump($this->view);
            echo "<hr>";
   		}

   		function home(){
   			$this->view->__construct($this->dataView); //L'hi estem passant a través del constructor les dades
            $this->view->show(); //cridem a la funció show de view que ens servirá per mostrar per pantalla les dades
   		}
   }
