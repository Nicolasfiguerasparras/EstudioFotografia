<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo cliente</title>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
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
                
                // Redirigimos al cliente a una URL validada.
                header('Location: nuevoCliente.php?success='.$result);
            }
        ?>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="nuevoCliente.php">  
                    ID: <input type="text" name="idCliente" placeholder="<?php echo($id); ?>"disabled>
            </div>
            <br><br>
                    
            <div class="row">
                        Nombre: <input type="text" name="nombre" required>
            </div>
            <br><br>
                    
            <div class="row">
                        Apellidos: <input type="text" name="apellidos" required>
            </div>
            <br><br>
                    
            <div class="row">
                        Dirección: <input type="text" name="direccion" required>
            </div>
            <br><br>
            
            <div class="row">
                        Teléfono 1: <input type="text" name="telef1" required>
            </div>
            <br><br>
            
            <div class="row">
                        Teléfono 2: <input type="text" name="telef2">
            </div>
            <br><br>
            
            <div class="row">
                        Nick: <input type="text" name="nick" required>
            </div>
            <br><br>
            
            <div class="row">
                        Contraseña: <input type="password" name="pass" required>
            </div>
            <br><br>
                    
                    <input type="submit" name="submit" value="Enviar">  
                </form>
            </div>
        </div>
        <br><br>
        
        <?php
            // En caso de que se haya insertado correctamente el usuario, mostramos un mensaje por pantalla, al igual que en el caso contrario
            if(isset($_GET['success']) && !$_GET['success']==0){
                echo "Se ha insertado correctamente el cliente";
            }elseif(isset($_GET['success']) && $_GET['success']==0){
                echo "No se ha insertado correctamente el cliente";
            }
        ?>
    </body>
</html>
