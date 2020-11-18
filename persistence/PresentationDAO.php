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
	}

	/**
	 * Realiza la consulta de un objeto
	 * @param  [int] $codigo [Código del objeto a consultar]
	 * @return [presentation] presentation encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM presentation WHERE id_presentation=".$id;
		$rs = pg_query( $this->connection, $query );
		$presentation = new Presentation();

		if( $rs )
        {
             if( pg_num_rows($rs) > 0 )
            {
				$presentation->setId($obj->id_presentation);
				$presentation->setTitle($obj->title);
				$presentation->setIsbn($obj->isbn);
				$presentation->setDatePublished($obj->datePublished);
				$presentation->setEditorial($obj->editorial);
				$presentation->setAvailable($obj->available);
				$presentation->setUrl($obj->url);
				$presentation->setAuthors($obj->authors);
				$presentation->setDescription($obj->description);
				$presentation->setIdUser($obj->cod_user);
				$presentation->setCongressName($obj->congressName);
			}
		}
		
		return $presentation;
	}

	/**
	 * Crea una nuevo presentation en la base de datos
	 * @param  presentation $newPresentation
	 * @return void
	 */
	public function create ($newPresentation){
		
		$query="INSERT INTO presentation VALUES(0,'".$newPresentation->getTitle()."','".$newPresentation->getISBN()."','".$newPresentation->getDatePublished()."','".$newPresentation->getEditorial()."','".$newPresentation->getAvailable()."','".$newPresentation->getUrl()."','".$newPresentation->getAuthors()."','".$newPresentation->getDescription()."','".$newPresentation->getIdUser()."','".$newPresentation->getCongressName()."');";
		pg_query($this->connection, $query);

	}

	/**
	 * Modifica una presentation ingresado por parámetro
	 * @param  presentation $presentation presentation ingresado por parámetro
	 * @return void
	 */
	public function modify ($presentation){

		$query="UPDATE presentation SET title='".$presentation->getTitle()."', isbn ='".$presentation->getIsbn()."', datePublished='".$presentation->getDatePublished()."', editorial='".$presentation->getEditorial()."', available='".$presentation->getAvailable()."', url='".$presentation->getUrl()."', authors='".$presentation->getAuthors()."', description='".$presentation->getDescription()."' WHERE id_presentation= ".$presentation->getId();
		pg_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de presentation
	 * @return [presentations]
	 */
	public function listAll(){
		$query="SELECT * FROM presentation";
		$rs = pg_query( $this->connection, $query );
		$presentations = array();
		if( $rs ){
			if( pg_num_rows($rs) > 0 ){
			   while( $obj = pg_fetch_object($rs) ){
					$presentation=new Presentation();
					$presentation->setId($obj->id_presentation);
					$presentation->setTitle($obj->title);
					$presentation->setIsbn($obj->isbn);
					$presentation->setDatePublished($obj->datePublished);
					$presentation->setEditorial($obj->editorial);
					$presentation->setAvailable($obj->available);
					$presentation->setUrl($obj->url);
					$presentation->setAuthors($obj->authors);
					$presentation->setDescription($obj->description);
					$presentation->setIdUser($obj->cod_user);
					$presentation->setCongressName($obj->congressName);
					
					array_push($presentations,$presentation);
			   }
			}
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
