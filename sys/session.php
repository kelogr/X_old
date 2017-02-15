<?php
	namespace X\Sys;
	
	/**
	*
	*	Session: Obtenim el valor de la sessió
	*   
	*	@author: Kevin
	*	@package: sys
	*
	**/

	class Session{

		static function init(){ //iniciem sessió
			session_start();
			self::set('id',session_id()); //utilitzem la funció creada després per guardar els valors
		}

		static function set($key,$value){ //set --> introduir
			$_SESSION[$key]=$value;
			echo $_SESSION[$key];
			
		}

		static function get($key){ //get --> extreure
			if(self::exist($key)){
				return $_SESSION[$key];
				
			}
			else{
				return null;
			}
		}

		static function exist($key){
			if(array_key_exists($key, $_SESSION)){ //comprobem si aquesta clau existeix
				return true;
			}else{
				return false;
			}
		}
		static function del($key){
			if (self::exist($key)){
				unset($_SESSION[$key]); //eliminem una sessió d'una clau
			}
		}

		static function destroy(){
			session_destroy();
		}
	}