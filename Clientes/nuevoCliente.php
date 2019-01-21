<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo cliente</title>
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
            $id = sacarID($db, 'clientes');
            
            // Para indicar que el formulario está incompleto, utilizar javascript
                  
            // Comprobar que se ha enviado el formulario
            if(isset($_POST['submit'])){

                // Rellenamos variables en las que recogemos el contenido de los inputs
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $direccion = $_POST['direccion'];
                $telef1 = $_POST['telef1'];
                $telef2 = $_POST['telef2'];
                $nick = $_POST['nick'];
                $pass = $_POST['pass'];
                
                // Definimos la consulta
                $query = "INSERT INTO clientes (id, nombre, apellidos, direccion, telefono1, telefono2, nick, contraseña) VALUES ('null', '$nombre', '$apellidos', '$direccion', '$telef1', '$telef2', '$nick', '$pass')";
                // Sacamos la consulta
                $result = mysqli_query($db, $query);
                
                // Cerramos la conexión a la base de datos
                mysqli_close($db);
                
                // Redirigimos al cliente al listado de clientes.
                echo "<script> location.href='clientes.php'; </script>";
            }
        ?>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->      
        <form method="post" action="nuevoCliente.php">
            <div class="form-row">
                <div class="form-group col-1 offset-1">
                    <label for="idCliente">ID</label>
                    <input type="text" name="idCliente" class="form-control" id="idCliente" placeholder="<?php echo($id); ?>"disabled>
                </div>
                <div class="form-group col-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Arturo" required>
                </div>
                <div class="form-group col-5">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Pérez Ávila" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 offset-1">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Apartamento, estudio, etc" name="direccion" required>
                </div>
                <div class="form-group col-3">
                    <label for="telef1">Teléfono 1</label>
                    <input type="text" class="form-control" id="telef1" name="telef1" required>
                </div>
                <div class="form-group col-3">
                    <label for="telef2">Teléfono 2</label>
                    <input type="text" class="form-control" id="telef2" name="telef2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="nick">Nick</label>
                    <input type="text" class="form-control" id="nick" name="nick" required>
                </div>
                <div class="form-group col-5">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
            </div>
            <div class="form-group offset-1">
                <input type="submit" name="submit" value="Crear cliente">  
            </div>
        </form>
    </body>
</html>
