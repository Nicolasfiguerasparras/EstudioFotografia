<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo trabajo</title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
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
            //Conectar a la Base de Datos y sacar el ID
            include('../connectDB.php');
            $db = connectDb();
            $idTrabajo = sacarID($db, 'trabajos');
            
            // Para indicar que el formulario está incompleto, utilizar javascript
                  
            // Comprobar que se ha enviado el formulario
            if(isset($_POST['submit'])){

                // Rellenamos variables en las que recogemos el contenido de los inputs
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $id_cliente = $_POST['cliente'];                
                
                // Subimos la imagen
                $name=$_FILES['imagen']['name'];
                $temp=$_FILES['imagen']['tmp_name'];

                // En caso de que no exista la carpeta para almacenar fotografías, la crea.
                if(!file_exists("./img")){
                    mkdir("./img");
                }
                
                // Sacamos la extensión de archivo para después renombrar el mismo
                $pos = strrpos($name, '.');
                $ext = substr($name, $pos+1);
                
                // Se establece la ruta de subida de la fotografía renombrandola con el ID de la noticia
                $path="img/$idTrabajo.$ext";

                // Definimos la consulta
                $query = "INSERT INTO trabajos (id, titulo, descripcion, precio, id_cliente, imagen) VALUES ('null', '$titulo', '$descripcion', '$precio', '$id_cliente', '$path')";
                // Sacamos la consulta
                $result = mysqli_query($db, $query) or die(mysqli_error($db));;
                
                // Redirigimos al cliente a una URL validada.
                header('Location: nuevoTrabajo.php?success='.$result);
            }
        ?>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="nuevoTrabajo.php" enctype="multipart/form-data">  
                    ID: <input type="number" name="idTrabajo" placeholder="<?php echo($idTrabajo); ?>"disabled>
            </div>
            <br><br>
                    
            <div class="row">
                    Título: <input type="text" name="titulo" required>
            </div>
            <br><br>
                    
            <div class="row">
                    Descripción: <input type="text" name="descripcion" required>
            </div>
            <br><br>
                    
            <div class="row">
                    Precio: <input type="text" name="precio" required>
            </div>
            <br><br>
            
            <div class="row">
                    <select name="cliente" id="choseClient">
                        <option value=0>Elige un cliente</option>
                        
			<?php 
                            $consulta = "SELECT id, nombre, apellidos FROM clientes";
                            $result2 = mysqli_query($db, $consulta);
                            // Sacamos el número de clientes que hay
                            $rows = mysqli_num_rows($result2);
                            for($i=0;$i<$rows;$i++){
                                $data=mysqli_fetch_array($result2);
                                if($data['nombre']!="Disponible"){
                                    echo "<option value='$data[id]'>$data[nombre] $data[apellidos]</option>"; 
                                }
                            } 
			?>
                    </select>
            </div>
            <br><br>
            
            <div class="row">
                    Sube una imagen: <input type="file" name="imagen" accept="image/*" required>
            </div>
            <br><br>
                    
                    <input type="submit" name="submit" value="Enviar">  
                </form>
            </div>
        </div>
        <br><br>
        
        <?php
            // En caso de que se haya insertado correctamente el trabajo, mostramos un mensaje por pantalla, al igual que en el caso contrario
            if(isset($_GET['success']) && !$_GET['success']==0){
                echo "Se ha insertado correctamente el trabajo";
            }elseif(isset($_GET['success']) && $_GET['success']==0){
                echo "No se ha insertado correctamente el trabajo";
            }
            
            // Cerramos la conexión a la base de datos
            mysqli_close($db);
        ?>
    </body>
</html>
