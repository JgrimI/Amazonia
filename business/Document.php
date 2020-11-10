<?php
/*
clase que representa a la entidad Usuario
*/
abstract class Document{

    //-------------------------
    //Atributos
    //-------------------------
    /*
    Representa la clave de acceso del Usuario
    */
    protected $title;
    /*
    Representa la clave de acceso del Usuario
    */
    protected $authors;
    /*
    Representa el correo electronico del Usuario
    */
    protected $ISBN;
    /*
    Representa el status del Usuario: activo/inactivo
    */
    protected $monthPublished;
    /*
    Representa el nombre del Usuario
    */
    protected $dayPublished;
    /*
    Representa el nombre del Usuario
    */
    protected $yearPublished;
        /*
    Representa el nombre del Usuario
    */
    protected $editorial;
    /*
    Representa el nombre del Usuario
    */
    protected $available;
        /*
    Representa el nombre del Usuario
    */
    protected $registry;
    /*
    Representa el nombre del Usuario
    */
    protected $fileDoc;
    /*
    Representa el nombre del Usuario
    */
    protected $idUser;



    //----------------------------
    //Constructor
    //----------------------------
    /*
    Representa un constructor vacio para la clase Usuario
    */
    function __construct(){

    }
    /**
    * Método para obtener la clave de acceso del Usuario
    * @return [String] clave de acceso del Usuario
    */
    public function getTitle(){
        return $this->title;
    }
    /**
    * Método para cambiar la clave de acceso del Usuario
    * @param [String] clave de acceso del Usuario
    */
    public function setTitle($title){
        $this->title = $title;
    }
    /**
    * Método para obtener la clave de acceso del Usuario
    * @return [String] clave de acceso del Usuario
    */
    public function getAuthors(){
        return $this->authors;
    }
    /**
    * Método para cambiar la clave de acceso del Usuario
    * @param [String] clave de acceso del Usuario
    */
    public function setAuthors($authors){
        $this->authors = $authors;
    }
    /**
     * Método para obtener el correo electronico del Usuario
     * @return [String] correo del Usuario
    */
    public function getISBN(){
        return $this->ISBN;
    }
    /**
     * Método para obtener el correo electronico del Usuario
     * @param [String] correo del Usuario
     */
    public function setISBN($ISBN){
        $this->ISBN = $ISBN;
    }
    /**
     * Método para obtener el status del Usuario (1:Activo/0:Inactivo)
     * @return [integer] status del Usuario
     */
    public function getMonthPublished(){
        return $this->monthPublished;
    }
    /**
     * Método para cambiar el status del Usuario 
    * @param [integer] status del Usuario
    */
    public function setMonthPublished($monthPublished){
        $this->monthPublished = $monthPublished;
    }
    /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getDayPublished(){
        return $this->dayPublished;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setDayPublished($dayPublished){
        $this->dayPublished = $dayPublished;
    }
    /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getYearPublished(){
        return $this->yearPublished;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setYearPublished($yearPublished){
        $this->yearPublished = $yearPublished;
    }
        /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getEditorial(){
        return $this->editorial;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }
        /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getAvailable(){
        return $this->available;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setAvailable($available){
        $this->available = $available;
    }
        /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getRegistry(){
        return $this->registry;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setRegistry($registry){
        $this->registry = $registry;
    }
        /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getFileDoc(){
        return $this->fileDoc;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setFileDoc($fileDoc){
        $this->fileDoc = $fileDoc;
    }
        /**
     * Método para obtener  el name del Usuario
     * @return [String] name del Usuario
     */
    public function getIdUser(){
        return $this->idUser;
    }
    /**
     * Método para cambiar  el Name del Usuario
    * @param [String] Name del Usuario
    */
    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }
}
?>