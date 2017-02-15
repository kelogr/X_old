<?php
	namespace X\Sys;
	
	/**
	*Core: EL centre del nostre framework que colabora amb request 
	*Controla que les direccions que els 
	*  possibles usuaris no siguin erronis i que el framweork  	treballi correctament
	*
	*	@author: Kevin
	* 	@package:sys
	*
	*
	**/

	use X\Sys\Request;

	class Core{
		static private $controller;
		static private $action;
		static private $params;


		public  static function init(){
			
			Request::exploding();
			//$arrayquery preparat per extreure controlador

			/**
			*	Request::exploding(); Fem una crida a *request.php, i més concretament a exploding que *separa les diferents parts de la url en un array
			*/

			self::$controller=Request::getVariable();
			
			self::$action=Request::getVariable();
			
			self::$params=Request::getParams();
			
			// Fer routing			
			self::router();
		}
		/**
		* router: Es fixa en les diferents parts de la nostra
		*	ruta i realitza algunes comprovacions com per
		*	exmple si posem el nom del controlador, si la
		*	possem correctament, o les accions, etc...
		*/
		static function router(){
			//si no hi ha controller busquem 'home'
			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
			//trobar controladors
			$filename=strtolower(self::$controller).'.php';
			$fileroute=APP.'controllers'.DS.$filename;
		
			if(is_readable($fileroute)){
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				// cal cridar ara l'accio
				if (is_callable(array(self::$controller,self::$action))){
					call_user_func(array(self::$controller,self::$action));
				}
				else{ echo self::$action.': Mètode inexistent';
				//Això significaria que a la nostra ruta hem posat una acció inexistent que no es troba a dins del controlador corresponent app/controllers
				/**
				* Un exemple d'això sería posar http://
				* localhost/X_old/home/altra_que_no_estigui/
				* en aquest cas ens sortiria el nom erroni de  * l'acció y el missatge que hagem posat
				* Un exemple correcte seria http://localhost/ * X_old/home/home/
				*/
			}
			}else{
				echo self::$controller.': Controlador inexistent'; //Això significaria que a la nostra ruta hem posat un controlador inexistent app/controllers
			}
		}
	}
