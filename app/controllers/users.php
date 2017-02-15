<?php

   namespace X\App\Controllers;

   
   use X\Sys\Controller;


   class Users extends Controller{
         

         public function __construct($params){
            parent::__construct($params);
         
            $this->dataView=array(
               'title'=>'Users'); //Dades a passar
            //Creació del model i de la vista de users
            $this->model=new \X\App\Models\mUsers();
            $this->view =new \X\App\Views\vUsers($this->dataView);
            echo "<hr><br>Porta l'informació a la vista del nostre controlador";
            var_dump($this->view);
            echo "<hr>";
            
         }
         function home(){
            $this->view->__construct($this->dataView); //L'hi estem passant a través del constructor les dades
            $this->view->show(); //cridem a la funció show de view que ens servirá per mostrar per pantalla les dades
         }
   }