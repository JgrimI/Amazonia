<?php
    /**
     * Importe de clases
     */
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/util/Connection.php';
    require_once($_SERVER["DOCUMENT_ROOT"]).'/Amazonia/persistence/BookingDAO.php';

    class ManageBooking{

        /**
         * Atributo para la conexión a la base de datos
         */
        private static $connection;

        function __construct(){

        }

        /**
         * Obtiene un bookistrador
        * @param  [String] $book [Nombre de book del bookistrador a buscar]
        * @return [bookistrador] bookistrador encontrado
        */
        public static function consult($cod_booking){

            $bookingDAO=BookingDAO::getBookingDAO(self::$connection);
            $booking=$bookingDAO->consult($cod_booking);
            return $booking;

        }
        
        /**
         * Crea un nuevo booki
         * @param book bookistrador a ingresar
         * @return void
         */
        public static function create($booking){
            $bookingDAO=bookingDAO::getBookingDAO(self::$connection);
            $bookingDAO->create($booking);

        }

           /**
         * Lista todos los bookistradores
         * @return book[] Lista de todos los bookistradores de la base de datos
         */
        public  static function listAll(){
            $bookingDAO = bookingDAO::getBookingDAO(self::$connection);
            $bookings=$bookingDAO->listAll();
            return $bookings;
        }


        /**
         * Modifica un bookistrador
         * @param book bookistrador a modificar
         * @return void
         */
        public static function modify($booking){
            $bookingDAO=bookingDAO::getBookingDAO(self::$connection);
            $bookingDAO->modify($booking);
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
