<?php
    /**
     * Importe de clases
     */
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/util/Connection.php';
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/PresentationDAO.php';

    class ManagePresentation{

        /**
         * Atributo para la conexión a la base de datos
         */
        private static $connection;

        function __construct(){

        }

        /**
         * Obtiene un presentationistrador
        * @param  [String] $presentation [Nombre de presentation del presentationistrador a buscar]
        * @return [presentationistrador] presentationistrador encontrado
        */
        public static function consult($id){

            $presentationDAO=PresentationDAO::getPresentationDAO(self::$connection);
            $presentation=$presentationDAO->consult($id);
            return $presentation;

        }
        
        /**
         * Crea un nuevo presentationi
         * @param presentation presentationistrador a ingresar
         * @return void
         */
        public static function createPresentation($presentation){
            $presentationDAO=presentationDAO::getPresentationDAO(self::$connection);
            $presentationDAO->create($presentation);

        }

           /**
         * Lista todos los presentationistradores
         * @return presentation[] Lista de todos los presentationistradores de la base de datos
         */
        public  static function listAll(){
            $presentationDAO = presentationDAO::getPresentationDAO(self::$connection);
            $presentations=$presentationDAO->listAll();
            return $presentations;
        }


        /**
         * Modifica un presentationistrador
         * @param presentation presentationistrador a modificar
         * @return void
         */
        public static function modify($presentation){
            $presentationDAO=presentationDAO::getPresentationDAO(self::$connection);
            $presentationDAO->modify($presentation);
        }



        /**
         * Cambia la conexión
         */
        public static function setConnectionBD($connection)
        {
            self::$connection = $connection;
        }
    }

?>