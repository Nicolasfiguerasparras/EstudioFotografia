<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mis citas</title>
        
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="utf-8">

    </head>
    <body>     
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header("location: ../index.php");
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            $id_user=$_SESSION['id_user'];
            // Definimos la consulta
            $query = mysqli_query($db,"SELECT * FROM citas where id_cliente=$id_user");
            
            if($row=mysqli_fetch_array($query)){
                echo "Fecha: $row[fecha]<br>";
                echo "Hora: $row[hora]<br>";
                echo "Motivo: $row[motivo]<br>";
                echo "Lugar: $row[lugar]<br>";

                $queryClient=mysqli_query($db, "SELECT * FROM clientes WHERE id=$row[id_cliente]");
                $datosClient=mysqli_fetch_array($queryClient, MYSQLI_ASSOC);
                $nombre="$datosClient[nombre] $datosClient[apellidos]";
                echo "Cliente: $nombre <br>";
            }else{
                echo "<h1 style='color:red; text-align:center'>¡Aún no tienes ninguna cita!</h1>";
            }
        ?>
    </body>
</html>
