<?php
/**
 * Archivo de conexión a la base de datos
 */
require_once('../persistence/util/Connection.php');

/**
 * Archivo de entidad
 */
require_once('../business/Book.php');
/**
 * Interfaz DAO
 */
require_once('DAO.php');

/**
 * Books DAO
 */
class BookDAO implements DAO
{
	/**
	 * Conexión a la base de datos
	 * @var [Object]
	 */
	private $connection;

	/**
	 * Objeto de la clase bookDAO
	 * @var [bookDAO]
	 */
	private static $bookDAO;

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
	 * @return [book] book encontrado
	 */
	public function consult($id){
		$query="SELECT * FROM book WHERE id_book=".$id;
		if(!$result=mysqli_query($this->connection,$query))die();
		$row=mysqli_fetch_array($result);
		$book = new Book();
		$book->setId($row['id_book']);
		$book->setTitle($row["title"]);
		$book->setIsbn($row["isbn"]);
		$book->setDatePublished($row["datePublished"]);
		$book->setEditorial($row["editorial"]);
		$book->setAvailable($row["available"]);
		$book->setUrl($row["url"]);
		$book->setAuthors($row["authors"]);
		$book->setDescription($row["description"]);
		$book->setIdUser($row["cod_user"]);
		$book->setNumPages($row["num_pages"]);
		
		return $book;
	}

	/**
	 * Crea una nuevo book en la base de datos
	 * @param  book $newBook
	 * @return void
	 */
	public function create ($newBook){
		
		$query="INSERT INTO book VALUES(0,'".$newBook->getTitle()."','".$newBook->getISBN()."','".$newBook->getDatePublished()."','".$newBook->getEditorial()."','".$newBook->getAvailable()."','".$newBook->getUrl()."','".$newBook->getAuthors()."','".$newBook->getDescription()."','".$newBook->getIdUser()."','".$newBook->getNumPages()."');";
		mysqli_query($this->connection, $query);

	}

	/**
	 * Modifica una book ingresado por parámetro
	 * @param  book $book book ingresado por parámetro
	 * @return void
	 */
	public function modify ($book){

		$query="UPDATE book SET title='".$book->getTitle()."', isbn ='".$book->getIsbn()."', datePublished='".$book->getDatePublished()."', editorial='".$book->getEditorial()."', available='".$book->getAvailable()."', url='".$book->getUrl()."', authors='".$book->getAuthors()."', description='".$book->getDescription()."', num_pages='".$book->getNumPages()."' WHERE id_book= ".$book->getId();
		mysqli_query($this->connection,$query);
	}

	/**
	 * Lista todos los objetos que se están en la tabla de book
	 * @return [books]
	 */
	public function listAll(){
		$query="SELECT * FROM book";
		if(!$result = mysqli_query($this->connection, $query)) die();
		$books = array();
		while ($row = mysqli_fetch_array($result)) {
			$book=new book();
			$book->setId($row["id_book"]);
			$book->setTitle($row["title"]);
			$book->setIsbn($row["isbn"]);
			$book->setDatePublished($row["datePublished"]);
			$book->setEditorial($row["editorial"]);
			$book->setAvailable($row["available"]);
			$book->setUrl($row["url"]);
			$book->setAuthors($row["authors"]);
			$book->setDescription($row["description"]);
			$book->setIdUser($row["cod_user"]);
			$book->setNumPages($row["num_pages"]);
			
			array_push($books,$book);
		}
		return $books;
	}

	/*
	*Obtiene el objeto de esta clase
	*
	*@param $conexion
	*@return void
	*/
	public static function getBookDAO($connection) {
            if(self::$bookDAO == null) {
                self::$bookDAO = new bookDAO($connection);
            }

            return self::$bookDAO;
    }

}
