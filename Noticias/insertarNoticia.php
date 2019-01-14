<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE HTML>  
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">	
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
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        <br><br>
        
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
                
                // Redirigimos al cliente a una URL validada.
                header('Location: ../Noticias/insertarNoticia.php?success='.$result);
            }
        ?>
        <br><br>
        
        <!--Recogemos los parámetros a través de un formulario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="insertarNoticia.php" enctype="multipart/form-data">  
                    ID: <input type="text" name="idNoticias" placeholder="<?php echo($id); ?>"disabled>
            </div>
            <br><br>
                    
            <div class="row">
                        Titular: <input type="text" name="titular" required>
            </div>
            <br><br>
                    
            <div class="row">
                        Contenido: <textarea name="contenido" rows="5" cols="40" required></textarea>
            </div>
            <br><br>
                    
            <div class="row">
                        Sube una imagen: <input type="file" name="imagen" accept="image/*" required>
            </div>
            <br><br>
                    
            <div class="row">
                        Fecha a partir de la que estará visible la noticia: <input type="date" name="fecha" required>
            </div>
            <br><br>
                    
                    <input type="submit" name="submit" value="Enviar">  
                </form>
            </div>
        </div>
        <br><br>
        
        <!--Mandamos un mensaje para indicar que se ha insertado corréctamente la noticia-->
        <?php
            if(isset($_GET['success']) && !$_GET['success']==0){
                echo "Se ha insertado correctamente la noticia";
            }elseif(isset($_GET['success']) && $_GET['success']==0){
                echo "No se ha introducido corréctamente la noticia"; // Estaría bien indicar qué ha fallado en dicho caso
            }
            
            // Cerramos la conexión a la base de datos
                mysqli_close($db);
        ?> 
    </body>
</html>