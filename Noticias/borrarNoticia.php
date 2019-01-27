<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="tableStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>  
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    header("location: ../Acceder/error.php");
                }
            }else{
                header("location: ../Acceder/error.php");
            }
        ?>
        <br>
        <!--/NavBar-->
        
        
        <div class="container"> 
            <?php        
                // Establecemos conexión con la base de datos
                include('../connectDB.php');
                $db = connectDb(); 
           
                // Imprimimos el listado de noticias
                $consulta=mysqli_query($db,"SELECT * FROM noticias");
                if($row = mysqli_fetch_array($consulta)){
                    do{
                        echo "<div class='row'>";
                            echo "<div class='col-md-7'>";
                                echo "<a href='verMas.php?id=$row[id]'>";
                                    echo "<img class='img-fluid rounded mb-3 mb-md-0' src='".$row["imagen"]."' alt=''>";
                                echo "</a>";
                            echo "</div>";
                            echo "<div class='col-md-5'>";
                                echo "<h3>".$row["titular"]."</h3>";
                                echo "<p>".$row["contenido"]."</p>";
                                echo "<form method='post' action='borrarNoticia.php'>";
                                    echo "<input type='submit' class='btn btn-primary' value='Borrar' name='borrar'>";
                                    echo "<input type='hidden' name='id' value='$row[id]'>";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";
                        echo "<hr>";
                    }while($row=mysqli_fetch_array($consulta));
                }


                // En caso de que se envíe el formulario, empieza la consulta
                if(isset($_POST['borrar'])){
                    // Almacenamos el ID enviado por el método GET en el botón borrar que se haya pulsado
                    $p_id=$_POST['id'];   
                    // Definimos la consulta
                    $query=mysqli_query($db, "DELETE FROM noticias WHERE id = '$p_id'");

                    // Si la consulta da fallo, se informa de ello
                    if(!$query){
                        echo mysqli_error($query);
                    }
                    // En caso contrario, refrescamos la página
                    else{
                        echo "<script> location.href='borrarNoticia.php'; </script>";
                    }
                    // Cerramos la conexión
                    mysqli_close($db);
                }
            ?>
        </div>
    </body>
</html>
