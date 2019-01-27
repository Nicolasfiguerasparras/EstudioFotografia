<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE HTML>  
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
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
        <br>
        
        <?php
            //Conectar a la Base de Datos y sacar el ID
            include('../connectDB.php');
            $db = connectDb();
            $id = sacarID($db, 'noticias');
            
            // Para indicar que el formulario está incompleto, utilizar javascript
                  
            // Comprobar que se ha enviado el formulario
            if(isset($_POST['submit'])){

                // Rellenamos variables en las que recogemos el contenido de los inputs
                $titular = $_POST['titular'];
                $contenido = $_POST['contenido'];
                $fecha = $_POST['fecha'];
                
                // Subimos la imagen
                $name = $_FILES['imagen']['name'];
                $temp=$_FILES['imagen']['tmp_name'];

                // En caso de que no exista la carpeta para almacenar fotografías, la crea.
                if(!file_exists("./img")){
                    mkdir("./img");
                }
                
                // Sacamos la extensión de archivo para después renombrar el mismo
                $pos = strrpos($name, '.');
                $ext = substr($name, $pos+1);
                
                // Se establece la ruta de subida de la fotografía renombrandola con el ID de la noticia
                $path="img/$id.$ext";
                
                // Definimos la consulta
                $query = "INSERT INTO noticias (id, titular, contenido, imagen, fecha) VALUES ('null', '$titular', '$contenido', '$path', '$fecha')";
                // Sacamos la consulta
                $result = mysqli_query($db, $query);
                
                // Movemos el archivo subido a la carpeta temporal a la ruta "img/"
                move_uploaded_file($temp, $path);
                
                // En caso de que la variable result no contenga nada, le damos el valor 0
                if($result==""){
                    $result=0;
                }
                
                // Redirigimos al cliente al listado de noticias.
                echo "<script> location.href='noticias.php'; </script>";
            }
        ?>
        
        <!--Formulario que recoge los datos insertados por el usuario-->      
        <form method="post" action="insertarNoticia.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-1 offset-1">
                    <label for="idNoticias">ID</label>
                    <input type="text" name="idNoticias" class="form-control" id="idTrabajo" placeholder="<?php echo($id); ?>"disabled>
                </div>
                <div class="form-group col-4">
                    <label for="titular">Título</label>
                    <input type="text" class="form-control" name="titular" id="titular" placeholder="Titular de la noticia" required>
                </div>
                <div class="form-group col-5">
                    <label for="contenido">Contenido</label>
                    <textarea rows="1" class="form-control" name="contenido" id="contenido" placeholder="Contenido de la noticia" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2 offset-1">
                    <label for="fecha">Fecha a partir de la cual estará visible la noticia</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group col-2">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" accept="image/*" name="imagen" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-1 offset-1">
                    <input type="submit" name="submit" value="Enviar">  
                </div>
            </div>
        </form>
        <!--/Formulario que recoge los datos insertados por el usuario-->
    </body>
</html>