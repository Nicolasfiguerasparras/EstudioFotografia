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
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('../index.php');
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
        
            $id=$_GET['id'];
            
            $work="select * from trabajos where id=$id";
            $consulta=mysqli_query($db, $work);
            echo "<table border=1px align='center'>";
                echo "<tr>";    
                    echo "<td>Título</td>";
                    echo "<td>Descripción</td>";
                    echo "<td>Precio</td>";
                    echo "<td>Imagen</td>";
                echo "</tr>";
                if($array=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                    echo "<tr>";
                        echo "<td>$array[titulo]</td>";
                        echo "<td>$array[descripcion]</td>";
                        echo "<td>$array[precio]</td>";
                        echo "<td><img src='".$array["imagen"]."' height='150' width='150' /></td>";
                    echo "</tr>";
                }
            echo "</table>";  
        ?>
        <a href="trabajos.php"><h2 style="text-align:center">Volver a todos los trabajos</h2></a>
    </body>
</html>
