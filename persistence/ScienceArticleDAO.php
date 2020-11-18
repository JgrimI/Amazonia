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
	}

	/**
	 * Realiza la consulta de un objeto
	 * @param  [int] $codigo [Código del objeto a consultar]
	 * @return [scienceArticle] scienceArticle encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM scienceArticle WHERE id_sa=".$id;
		$rs = pg_query( $this->connection, $query );
		$scienceArticle = new ScienceArticle();

		if( $rs )
        {
             if( pg_num_rows($rs) > 0 )
            {
				$scienceArticle->setId($obj->id_sa);
				$scienceArticle->setTitle($obj->title);
				$scienceArticle->setSSN($obj->ssn);
				$scienceArticle->setDatePublished($obj->datePublished);
				$scienceArticle->setEditorial($obj->editorial);
				$scienceArticle->setAvailable($obj->available);
				$scienceArticle->setUrl($obj->url);
				$scienceArticle->setAuthors($obj->authors);
				$scienceArticle->setDescription($obj->description);
				$scienceArticle->setIdUser($obj->cod_user);
			}
		}
		
		return $scienceArticle;
	}

	/**
	 * Crea una nuevo scienceArticle en la base de datos
	 * @param  scienceArticle $newArticle
	 * @return void
	 */
	public function create ($newArticle){
		
		$query="INSERT INTO scienceArticle VALUES(0,'".$newArticle->getTitle()."','".$newArticle->getSSN()."','".$newArticle->getDatePublished()."','".$newArticle->getEditorial()."','".$newArticle->getAvailable()."','".$newArticle->getUrl()."','".$newArticle->getAuthors()."','".$newArticle->getDescription()."',".$newArticle->getIdUser().");";
		pg_query($this->connection, $query);

	}

	/**
	 * Modifica una scienceArticle ingresado por parámetro
	 * @param  scienceArticle $scienceArticle scienceArticle ingresado por parámetro
	 * @return void
	 */
	public function modify ($scienceArticle){

		$query="UPDATE scienceArticle SET title='".$scienceArticle->getTitle()."', ssn ='".$scienceArticle->getSSN()."', datePublished='".$scienceArticle->getDatePublished()."', editorial='".$scienceArticle->getEditorial()."', available='".$scienceArticle->getAvailable()."', url='".$scienceArticle->getUrl()."', authors='".$scienceArticle->getAuthors()."', description='".$scienceArticle->getDescription()."' WHERE id_sa= ".$scienceArticle->getId();
		pg_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de scienceArticle
	 * @return [articles]
	 */
	public function listAll(){
		$query="SELECT * FROM scienceArticle";
		$rs = pg_query( $this->connection, $query );
		$articles = array();
		if( $rs ){
			if( pg_num_rows($rs) > 0 ){
			   while( $obj = pg_fetch_object($rs) ){			$scienceArticle=new scienceArticle();
					$scienceArticle->setId($obj->id_sa);
					$scienceArticle->setTitle($obj->title);
					$scienceArticle->setSSN($obj->ssn);
					$scienceArticle->setDatePublished($obj->datePublished);
					$scienceArticle->setEditorial($obj->editorial);
					$scienceArticle->setAvailable($obj->available);
					$scienceArticle->setUrl($obj->url);
					$scienceArticle->setAuthors($obj->authors);
					$scienceArticle->setDescription($obj->description);
					$scienceArticle->setIdUser($obj->cod_user);
					
					array_push($articles,$scienceArticle);
			   }
			}
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
