<?php
	namespace X\Sys;

	/**
	*
	*	Request: Agafem l'url del navegador i la traduim
	*   Volem agafar el controlador, que será el següent al 
	*	nom de la carpeta. En cas de no existir ens sortirá un *   error
	*   També agafem l'acció i el seu parametre
	*	@author: Kevin
	*	@package: sys
	*
	**/
	
	class Request{
		static private $query=array();

		static function exploding(){
			$array_query=explode('/',$_SERVER['REQUEST_URI']);
			var_dump($array_query); //Obtenim la direcció complerta de la nostra url separada en variables en un array
			/**
			*	var_dump($array_query);
			*	Amb això aconseguim anar fent comprovacions de *   els valors que aconseguim
			*/
			array_shift($array_query); //Serveix per treure el primer valor de l'array
			if(end($array_query)==""){
				array_pop($array_query);//Si es compleix la condició també treiem l'ultimvalor de l'array
			}
			//si es base no fem res,pero si
			// no lo es fem array_shift una altra vegada
			$dir=dirname($_SERVER['PHP_SELF']);
			 //Ens dona el nom del directori al que estem accedint
			
			if($dir=='/'.$array_query[0]){
				array_shift($array_query);
			}		
						
			self::$query=$array_query;
			echo "<br><hr>Valores después del nombre de la carpeta<br>";
			var_dump(self::$query);//Dona les variables posteriors a la carpeta principal
			echo "<br>";
			/*var_dump(Request::getParams());
			echo "<br>";
			var_dump(Request::getVariable());*/
		}

		static function getVariable(){ //Obtenim el nom de les variables
			return array_shift(self::$query);
		}

		static function getParams(){ //Obtenim el valor dels parametres i ells en si mateix
			if(count(self::$query)>0){
				if((count(self::$query)%2)==0){
					for($i=0;$i<count(self::$query);$i++){
						if(($i%2)==0){
							$key[]=self::$query[$i];
						}
						else{
							$value[]=self::$query[$i];
						}
					}
					$result=array_combine($key, $value);
					return $result;
				}
			}
		}

	}