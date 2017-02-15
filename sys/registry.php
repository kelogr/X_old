<?php
	
	namespace X\Sys;

	/**
	 * 
	 * 
	 * Registry: registra el almacen de información de nuestro
	 * sistema
	 * 
	 * @author Kevin
	 * @package: sys
	 **/

	class Registry{
		private $data=array();

		static $instance;

		function __construct(){
			$this->data=array();
		}

		function __set($key, $value){ //Intrducimos una clave y su valor.
			if(!array_key_exists($key, $this->data)){ 
				$this->data[$key]=$value; //En el caso que no exista
			}
		}

		function __get($key){
			if(array_key_exists($key, $this->data)){
				return $this->data[$key]; //Devolvemos el valor del data de la key
			}
			else
			{
				return null;
			}
		}

		function __unset($key=null){
			if($key!=null){
				if(array_key_exists($key, $this->data)){
				unset($this->data[$key]);
				}
			}else{
				unset($this->data);
			}
			
		}
		
	}