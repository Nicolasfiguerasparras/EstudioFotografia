<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header("location: ../Acceder/error.php");
            }
        ?>
        <!--/NavBar-->
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();

            $id_cita=$_GET['data'];
            $query=mysqli_query($db, "SELECT * FROM citas WHERE id=$id_cita");
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);
            
            echo "ID: $datos[id]<br>";
            echo "Fecha: $datos[fecha]<br>";
            echo "Hora: $datos[hora]<br>";
            echo "Motivo: $datos[motivo]<br>";
            echo "Lugar: $datos[lugar]<br>";
            
            $queryClient=mysqli_query($db, "SELECT * FROM clientes WHERE id=$datos[id_cliente]");
            $datosClient=mysqli_fetch_array($queryClient, MYSQLI_ASSOC);
            $nombre="$datosClient[nombre] $datosClient[apellidos]";
            echo "Cliente: $nombre <br>";
            
            echo "<a href='modificaCita.php?id=$id_cita' class='btn btn-link'>Modificar</a>";
            mysqli_close($db);
        ?>
    </body>
</html>
