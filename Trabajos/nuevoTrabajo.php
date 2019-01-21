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
                
                // Redirigimos al cliente al listado de trabajos.
                echo "<script> location.href='trabajos.php'; </script>";
            }
        ?>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->      
        <form method="post" action="nuevoTrabajo.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-1 offset-1">
                    <label for="idTrabajo">ID</label>
                    <input type="text" name="idTrabajo" class="form-control" id="idTrabajo" placeholder="<?php echo($idTrabajo); ?>"disabled>
                </div>
                <div class="form-group col-4">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título del trabajo" required>
                </div>
                <div class="form-group col-5">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del trabajo" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 offset-1">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" placeholder="Precio del trabajo" name="precio" required>
                </div>
                <div class="form-group col-3">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" name="cliente" id="cliente" required>
                        <option value="0">Elige un cliente</option>
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
                <div class="form-group col-3">
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
        
        <?php
            // Cerramos la conexión a la base de datos
            mysqli_close($db);
        ?>
    </body>
</html>
