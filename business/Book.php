<?php
/*
clase que representa a la entidad Usuario
*/
class Book{

    //-------------------------
    //Atributos
    //-------------------------
    /*
    Representa numero de paginas
    */
    private $numPages;


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
    public function getNumPages(){
        return $this->numPages;
    }
    /**
    * Método para cambiar la clave de acceso del Usuario
    * @param [String] clave de acceso del Usuario
    */
    public function setNumPages($numPages){
        $this->numPages = $numPages;
    }
    
}
?>