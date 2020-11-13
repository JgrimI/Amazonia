<?php
    /**
     * Importe de clases
     */
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/util/Connection.php';
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/ScienceArticle.php';

    class ManageScienceArticle{

        /**
         * Atributo para la conexión a la base de datos
         */
        private static $connection;

        function __construct(){

        }

        /**
         * Obtiene un bookistrador
        * @param  [String] $scienceArticle [Nombre de scienceArticle del bookistrador a buscar]
        * @return [bookistrador] bookistrador encontrado
        */
        public static function consult($id){

            $scienceArticleDAO=ScienceArticleDAO::getScienceArticleDAO(self::$connection);
            $scienceArticle=$scienceArticleDAO->consult($id);
            return $scienceArticle;

        }
        
        /**
         * Crea un nuevo booki
         * @param scienceArticle bookistrador a ingresar
         * @return void
         */
        public static function createScienceArticle($scienceArticle){
            $scienceArticleDAO=scienceArticleDAO::getScienceArticleDAO(self::$connection);
            $scienceArticleDAO->create($scienceArticle);

        }

           /**
         * Lista todos los bookistradores
         * @return scienceArticle[] Lista de todos los bookistradores de la base de datos
         */
        public  static function listAll(){
            $scienceArticleDAO = scienceArticleDAO::getScienceArticleDAO(self::$connection);
            $articles=$scienceArticleDAO->listAll();
            return $articles;
        }


        /**
         * Modifica un bookistrador
         * @param scienceArticle bookistrador a modificar
         * @return void
         */
        public static function modify($scienceArticle){
            $scienceArticleDAO=scienceArticleDAO::getScienceArticleDAO(self::$connection);
            $scienceArticleDAO->modify($scienceArticle);
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
