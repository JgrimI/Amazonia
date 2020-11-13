<?php
/**
 * Archivo de conexión a la base de datos
 */
require_once('../persistence/util/Connection.php');

/**
 * Archivo de entidad
 */
require_once('../business/Presentation.php');
/**
 * Interfaz DAO
 */
require_once('DAO.php');

/**
 * Books DAO
 */
class PresentationDAO implements DAO
{
	/**
	 * Conexión a la base de datos
	 * @var [Object]
	 */
	private $connection;

	/**
	 * Objeto de la clase presentationDAO
	 * @var [presentationDAO]
	 */
	private static $presentationDAO;

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
	 * @return [presentation] presentation encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM presentation WHERE id_presentation=".$id;
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$presentation = new Presentation();
		$presentation->setId($row['id_presentation']);
		$presentation->setTitle($row["title"]);
		$presentation->setIsbn($row["isbn"]);
		$presentation->setDatePublished($row["datePublished"]);
		$presentation->setEditorial($row["editorial"]);
		$presentation->setAvailable($row["available"]);
		$presentation->setUrl($row["url"]);
		$presentation->setAuthors($row["authors"]);
		$presentation->setDescription($row["description"]);
		$presentation->setIdUser($row["cod_user"]);
		$presentation->setCongressName($row["congressName"]);
		
		return $presentation;
	}

	/**
	 * Crea una nuevo presentation en la base de datos
	 * @param  presentation $newPresentation
	 * @return void
	 */
	public function create ($newPresentation){
		
		$query="INSERT INTO presentation VALUES(0,'".$newPresentation->getTitle()."','".$newPresentation->getISBN()."','".$newPresentation->getDatePublished()."','".$newPresentation->getEditorial()."','".$newPresentation->getAvailable()."','".$newPresentation->getUrl()."','".$newPresentation->getAuthors()."','".$newPresentation->getDescription()."','".$newPresentation->getIdUser()."','".$newPresentation->getCongressName()."');";
		mysqli_query($this->connection, $query);

	}

	/**
	 * Modifica una presentation ingresado por parámetro
	 * @param  presentation $presentation presentation ingresado por parámetro
	 * @return void
	 */
	public function modify ($presentation){

		$query="UPDATE presentation SET title='".$presentation->getTitle()."', isbn ='".$presentation->getIsbn()."', datePublished='".$presentation->getDatePublished()."', editorial='".$presentation->getEditorial()."', available='".$presentation->getAvailable()."', url='".$presentation->getUrl()."', authors='".$presentation->getAuthors()."', description='".$presentation->getDescription()."' WHERE id_presentation= ".$presentation->getId();
		mysqli_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de presentation
	 * @return [presentations]
	 */
	public function listAll(){
		$query="SELECT * FROM presentation";
		if(!$result = mysqli_query($this->connection, $query)) die();
		$presentations = array();
		while ($row = mysqli_fetch_array($result)) {
			$presentation=new Presentation();
			$presentation->setId($row["id_presentation"]);
			$presentation->setTitle($row["title"]);
			$presentation->setIsbn($row["isbn"]);
			$presentation->setDatePublished($row["datePublished"]);
			$presentation->setEditorial($row["editorial"]);
			$presentation->setAvailable($row["available"]);
			$presentation->setUrl($row["url"]);
			$presentation->setAuthors($row["authors"]);
			$presentation->setDescription($row["description"]);
			$presentation->setIdUser($row["cod_user"]);
			$presentation->setCongressName($row["congressName"]);
			
			array_push($presentations,$presentation);
		}
		return $presentations;
	}

	/*
	*Obtiene el objeto de esta clase
	*
	*@param $conexion
	*@return void
	*/
	public static function getPresentationDAO($connection) {
            if(self::$presentationDAO == null) {
                self::$presentationDAO = new PresentationDAO($connection);
            }

            return self::$presentationDAO;
    }

}
