<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar Trabajo</title>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../JavaScript/app.js" type="text/javascript"></script>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
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
        <!--/NavBar-->
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Creamos la función imprimirTabla para que nos la saque cada vez que la necesitemos
            function imprimirTabla($p_db){
                // Creamos la consulta que saca todas las noticias
                $consulta=mysqli_query($p_db,"SELECT * FROM trabajos");
                echo "<div class='container'>";
                // Imprimimos una tabla con las noticias
                if($row = mysqli_fetch_array($consulta)){ 
                        // Establecemos un bucle DO WHILE que imprime las noticias mientras haya
                        do{
                             $del_id=$row['id'];
                            echo "<div class='row'>";
                                echo "<div class='col-md-7'>";
                                    echo "<img class='img-fluid rounded mb-3 mb-md-0' src='".$row["imagen"]."' alt=''>";
                                echo "</div>";
                                echo "<div class='col-md-5'>";
                                    echo "<h3>".$row["titulo"]."</h3>";
                                    echo "<p>".$row["descripcion"]."</p>";
                                    echo "<p>".$row["precio"]."</p>";
                                    echo "<form method='post' action='borrarNoticia.php'>";
                                        echo "<input type='submit' class='btn btn-primary' value='Borrar' name='borrar'>";
                                        echo "<input type='hidden' name='id' value='$del_id'>";
                                    echo "</form>";
                                echo "</div>";
                            echo "</div>";
                            echo "<hr>";
                        }while($row = mysqli_fetch_array($consulta)); 
                // En caso de no encontrar ningún registro, nos lo indica
                }else{
                    echo "¡No se ha encontrado ningún registro!";
                }
                echo "</div>";
            }   
        ?>
        
        <?php
            // Imprimimos la tabla con las noticias
            imprimirTabla($db);
            
            // En caso de que se envíe el formulario, empieza la consulta
            if(isset($_GET['borrar'])){
                // Almacenamos el ID enviado por el método GET en el botón borrar que se haya pulsado
                $p_id=$_GET['id'];   
                // Definimos la consulta
                $query=mysqli_query($db, "DELETE FROM trabajos WHERE id = '$p_id'");
                
                // Si la consulta da fallo, se informa de ello
                if(!$query){
                    echo mysqli_error($query);
                }
                // En caso contrario, refrescamos la página
                else{
                    header("Location: borrarTrabajo.php");
                }
                // Cerramos la conexión
                mysqli_close($db);
            }
        ?>
    </body>
</html>
