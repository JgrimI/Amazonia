<?php
/**
 * Archivo de conexión a la base de datos
 */
require_once('../persistence/util/Connection.php');

/**
 * Archivo de entidad
 */
require_once('../business/ScienceArticle.php');
/**
 * Interfaz DAO
 */
require_once('DAO.php');

/**
 * Books DAO
 */
class ScienceArticleDAO implements DAO
{
	/**
	 * Conexión a la base de datos
	 * @var [Object]
	 */
	private $connection;

	/**
	 * Objeto de la clase scienceArticleDAO
	 * @var [scienceArticleDAO]
	 */
	private static $scienceArticleDAO;

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
	 * @return [scienceArticle] scienceArticle encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM scienceArticle WHERE id_sa=".$id;
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$scienceArticle = new ScienceArticle();
		$scienceArticle->setId($row['id_sa']);
		$scienceArticle->setTitle($row["title"]);
		$scienceArticle->setSSN($row["ssn"]);
		$scienceArticle->setDatePublished($row["datePublished"]);
		$scienceArticle->setEditorial($row["editorial"]);
		$scienceArticle->setAvailable($row["available"]);
		$scienceArticle->setUrl($row["url"]);
		$scienceArticle->setAuthors($row["authors"]);
		$scienceArticle->setDescription($row["description"]);
		$scienceArticle->setIdUser($row["cod_user"]);
		
		return $scienceArticle;
	}

	/**
	 * Crea una nuevo scienceArticle en la base de datos
	 * @param  scienceArticle $newArticle
	 * @return void
	 */
	public function create ($newArticle){
		
		$query="INSERT INTO scienceArticle VALUES(0,'".$newArticle->getTitle()."','".$newArticle->getSSN()."','".$newArticle->getDatePublished()."','".$newArticle->getEditorial()."','".$newArticle->getAvailable()."','".$newArticle->getUrl()."','".$newArticle->getAuthors()."','".$newArticle->getDescription()."',".$newArticle->getIdUser().");";
		mysqli_query($this->connection, $query);

	}

	/**
	 * Modifica una scienceArticle ingresado por parámetro
	 * @param  scienceArticle $scienceArticle scienceArticle ingresado por parámetro
	 * @return void
	 */
	public function modify ($scienceArticle){

		$query="UPDATE scienceArticle SET title='".$scienceArticle->getTitle()."', ssn ='".$scienceArticle->getSSN()."', datePublished='".$scienceArticle->getDatePublished()."', editorial='".$scienceArticle->getEditorial()."', available='".$scienceArticle->getAvailable()."', url='".$scienceArticle->getUrl()."', authors='".$scienceArticle->getAuthors()."', description='".$scienceArticle->getDescription()."' WHERE id_sa= ".$scienceArticle->getId();
		mysqli_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de scienceArticle
	 * @return [articles]
	 */
	public function listAll(){
		$query="SELECT * FROM scienceArticle";
		if(!$result = mysqli_query($this->connection, $query)) die();
		$articles = array();
		while ($row = mysqli_fetch_array($result)) {
			$scienceArticle=new scienceArticle();
			$scienceArticle->setId($row["id_book"]);
			$scienceArticle->setTitle($row["title"]);
			$scienceArticle->setSSN($row["ssn"]);
			$scienceArticle->setDatePublished($row["datePublished"]);
			$scienceArticle->setEditorial($row["editorial"]);
			$scienceArticle->setAvailable($row["available"]);
			$scienceArticle->setUrl($row["url"]);
			$scienceArticle->setAuthors($row["authors"]);
			$scienceArticle->setDescription($row["description"]);
			$scienceArticle->setIdUser($row["cod_user"]);
			
			array_push($articles,$scienceArticle);
		}
		return $articles;
	}

	/*
	*Obtiene el objeto de esta clase
	*
	*@param $conexion
	*@return void
	*/
	public static function getScienceArticleDAO($connection) {
            if(self::$scienceArticleDAO == null) {
                self::$scienceArticleDAO = new scienceArticleDAO($connection);
            }

            return self::$scienceArticleDAO;
    }

}
