<?php
/**
 * Archivo de conexión a la base de datos
 */
require_once('../persistence/util/Connection.php');

/**
 * Archivo de entidad
 */
require_once('../business/User.php');
/**
 * Interfaz DAO
 */
require_once('DAO.php');

/**
 * Dao para los users
 */
class UserDAO implements DAO
{
	/**
	 * Conexión a la base de datos
	 * @var [Object]
	 */
	private $connection;

	/**
	 * Objeto de la clase userDAO
	 * @var [userDAO]
	 */
	private static $userDAO;


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
	 * @return [user]         user encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM user WHERE cod_user=".$id;
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$user = new User();
		$user->setId($row['cod_user']);
		$user->setPassword($row['pass_user']);
		$user->setEmail($row['email_user']);
		$user->setStatus($row['status_user']);
		$user->setName($row['name_user']);

		return $user;

	}

	/**
	 * Realiza la consulta de un objeto
	 * @param  [int] $codigo [Código del objeto a consultar]
	 * @return [user]         user encontrado
	 */
	public function consultByMail($email){
		$query="SELECT * FROM user WHERE email_user='".$email."'";
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$user = new User();
		$user->setId($row['cod_user']);
		$user->setPassword($row['pass_user']);
		$user->setEmail($row['email_user']);
		$user->setStatus($row['status_user']);
		$user->setName($row['name_user']);

		return $user;

	}
	/**
	 * Crea una nuevo user en la base de datos
	 * @param  user $newUser
	 * @return void
	 */
	public function create ($newUser){
		$password = password_hash($newUser->getPassword(), PASSWORD_BCRYPT);

		$query="INSERT INTO user VALUES(0,'".$newUser->getName()."','".$password."','".$newUser->getStatus()."','".$newUser->getEmail()."','".$newUser->getPermits()."');";
		mysqli_query($this->connection, $query);

	}

	/**
	 * Modifica una user ingresado por parámetro
	 * @param  user $user user ingresado por parámetro
	 * @return void
	 */
	public function modify ($user){
		$password = password_hash($user->getPassword(), PASSWORD_BCRYPT);
		$query="UPDATE user SET name_user='".$user->getName()."', email_user ='".$user->getEmail()."', pass_user='".$password."', status_user='".$user->getStatus()."' WHERE cod_user= ".$user->getId();
		mysqli_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de user
	 * @return [users]
	 */
	public function listAll(){
		$query="SELECT * FROM user";
		if(!$result = mysqli_query($this->connection, $query)) die();
		$users = array();

		while ($row = mysqli_fetch_array($result)) {
			$user=new user();

			$user->setId($row["cod_user"]);
			$user->setName($row["name_user"]);
			$user->setEmail($row["email_user"]);
			$user->setPassword($row["pass_user"]);
			$user->setStatus($row["status_user"]);

			array_push($users,$user);
		}
		return $users;
	}

/*
	*Obtiene el objeto de esta clase
	*
	*@param $conexion
	*@return void
	*/
	public static function getUserDAO($connection) {
            if(self::$userDAO == null) {
                self::$userDAO = new userDAO($connection);
            }

            return self::$userDAO;
        }

}


?>
