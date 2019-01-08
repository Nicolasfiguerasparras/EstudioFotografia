<?php 
    // Creamos la fución connectDB para conectarnos a la base de datos.
    function connectDB() {
        $db = mysqli_connect("127.0.0.1", "root", "", "estudio"); // Aquí hay que introducir el nombre de la base de datos
        if (!$db) {
            echo "Error: No se pudo conectar a MySQL.". PHP_EOL;
            echo "Error de depuración: ". mysqli_connect_errno() . PHP_EOL;
            echo "Error de depuración: ". mysqli_connect_error() . PHP_EOL;
            exit;
        }
        mysqli_set_charset($db,'utf8');
        return $db;
    }

    // Creamos la función sacarID para sacar el ID de cualquier tabla introducida por parámetros.
    function sacarID($db, $table){
        $consulta = "SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '$table'";
        $resultado = mysqli_query($db, $consulta);
        // Se escribe así, el auto_increment sale de la consulta de arriba
        return $resultado->fetch_object()->auto_increment;
    }
?>