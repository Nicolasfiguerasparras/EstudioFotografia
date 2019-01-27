<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>       
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            $id_cliente = $_GET['cliente'];            
            $id_trabajo = $_GET['id'];
            
            $work="select * from trabajos where id=$id_trabajo";
            $consulta=mysqli_query($db, $work);
            $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
            
            $updateQuery="UPDATE trabajos SET imagen='$array[imagen]', titulo='$array[titulo]', descripcion='$array[descripcion]', "
                    . "precio='$array[precio]', id_cliente='$id_cliente' WHERE id='$id_trabajo'";
            mysqli_query($db,$updateQuery);
            mysqli_close($db);
            echo "<script> location.href='verMas.php?id=$id_trabajo'; </script>";
        ?>
    </body>
</html>
