<?php
/**
 * Archivo de conexión a la base de datos
 */
require_once('../persistence/util/Connection.php');

/**
 * Archivo de entidad
 */
require_once('../business/Administrator.php');
/**
 * Interfaz DAO
 */
require_once('DAO.php');

/**
 * Dao para los admins
 */
class AdminDAO implements DAO
{
	/**
	 * Conexión a la base de datos
	 * @var [Object]
	 */
	private $connection;

	/**
	 * Objeto de la clase adminDAO
	 * @var [adminDAO]
	 */
	private static $adminDAO;


	/**
	 * Constructor de la clase
	 */

	private function __construct($connection)
	{
		$this->connection=$connection;
		mysqli_set_charset($this->connection, "utf8");
	}

	/**
	 * Realiza la consulta de un objeto
	 * @param  [int] $codigo [Código del objeto a consultar]
	 * @return [admin]         admin encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM administrator WHERE cod_admin=".$id;
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$admin = new Administrator();
		$admin->setId($row['cod_admin']);
		$admin->setPassword($row['pass_admin']);
		$admin->setEmail($row['email_admin']);
		$admin->setName($row['name_admin']);
		
		return $admin;

	}

	/**
	 * Realiza la consulta de un objeto
	 * @param  [int] $codigo [Código del objeto a consultar]
	 * @return [admin]         admin encontrado
	 */
	public function consultByMail($email){
		$query="SELECT * FROM administrator WHERE email_admin='".$email."'";
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$admin = new Administrator();
		$admin->setId($row['cod_admin']);
		$admin->setPassword($row['pass_admin']);
		$admin->setEmail($row['email_admin']);
		$admin->setName($row['name_admin']);
		
		return $admin;

	}
	/**
	 * Crea una nuevo admin en la base de datos
	 * @param  admin $newUser
	 * @return void
	 */
	public function create ($newUser){
		$password = password_hash($newUser->getPassword(), PASSWORD_BCRYPT);

		$query="INSERT INTO administrator VALUES(0,'".$newUser->getName()."','".$password."','".$newUser->getEmail()."');";
		mysqli_query($this->connection, $query);

	}

	/**
	 * Modifica una admin ingresado por parámetro
	 * @param  admin $admin admin ingresado por parámetro
	 * @return void
	 */
	public function modify ($admin){
		$password = password_hash($admin->getPassword(), PASSWORD_BCRYPT);
		$query="UPDATE administrator SET name_admin='".$admin->getName()."', email_admin ='".$admin->getEmail()."', pass_admin='".$password."' WHERE cod_admin= ".$admin->getId();
		mysqli_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de admin
	 * @return [admins]
	 */
	public function listAll(){
		$query="SELECT * FROM admin";
		if(!$result = mysqli_query($this->connection, $query)) die();
		$admins = array();

		while ($row = mysqli_fetch_array($result)) {
			$admin=new Administrator();

			$admin->setId($row["cod_admin"]);
			$admin->setName($row["name_admin"]);
			$admin->setEmail($row["email_admin"]);
			$admin->setPassword($row["pass_admin"]);
			
			array_push($admins,$admin);
		}
		return $admins;
	}

	/*
	*Obtiene el objeto de esta clase
	*
	*@param $conexion
	*@return void
	*/
	public static function getAdminDAO($connection) {
            if(self::$adminDAO == null) {
                self::$adminDAO = new AdminDAO($connection);
            }

            return self::$adminDAO;
        }

}


?>
