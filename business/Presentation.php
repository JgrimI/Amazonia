<?php
/*
clase que representa a la entidad Usuario
*/
require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/business/Document.php';
class Presentation extends Document{

    //-------------------------
    //Atributos
    //-------------------------
    /*
    Representa numero de paginas
    */
    private $namCongress;


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
    public function getNamCongress(){
        return $this->namCongress;
    }
    /**
    * Método para cambiar la clave de acceso del Usuario
    * @param [String] clave de acceso del Usuario
    */
    public function setNamCongress($namCongress){
        $this->namCongress = $namCongress;
    }
    
}
?>