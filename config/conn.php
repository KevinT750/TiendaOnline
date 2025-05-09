<?php 
require_once 'global.php';
class Cls_DataConnection {
    // Método para obtener la conexión a la base de datos
    public function Fn_getConnect($db = 'tienda_online') {
        if ($db === 'tienda_online') {
            $conexion = new mysqli(DB_HOST_TIENDA_ONLINE, DB_USERNAME_TIENDA_ONLINE, DB_PASSWORD_TIENDA_ONLINE, DB_NAME_TIENDA_ONLINE);
        } 

        // Verificar si hubo un error en la conexión
        if ($conexion->connect_errno) {
            echo "Error al conectar a la base de datos " . $db . ": " . $conexion->connect_error;
            exit();
        }

        return $conexion;
    }
}

?>