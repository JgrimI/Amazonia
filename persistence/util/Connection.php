<?php
	/**
	 * Clase que realiza la conexión a la base de datos
	 */
	class Connection {

		/**
		 * Conecta con la base de datos
		 * @return Object $connection Devuelve un objeto para conectar con la base de datos en caso de éxito y false en caso de error
		 */
		public function conectBD(){
			 $server = "35.184.25.215";
			 $user = "prueba";
			 $pass = "1234";


			$bd = "amazonia";
			$port = "3306";
			$connection = mysqli_connect($server, $user, $pass,$bd,$port)
			or die("Ha sucedido un error inesperado en la connection de la base de datos");

			return $connection;
		}

		/**
		 * Cierra la conexión a la base de datos
		 * @param  Object $connection Conexión a la base de datos
		 * @return boolean $cerrar Devuelve true en caso de éxito y false en caso de error
		 */
		public function turnOffBD($connection){

			$close = mysqli_close($connection)
			or die("Ha sucedido un error inexperado en la desconnection de la base de datos");

			return $close;
		}
	}
	?>
