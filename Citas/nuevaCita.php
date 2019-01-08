<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nueva cita</title>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            // NavBar
            include('../NavBar/navBar.php');
            
            // Conectar a la Base de Datos y sacar el ID
            include('../connectDB.php');
            $db = connectDb();
            $idCita = sacarID($db, 'citas');
                              
            // Comprobar que se ha enviado el formulario
            if(isset($_POST['submit'])){

                // Rellenamos variables en las que recogemos el contenido de los inputs
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $motivo = $_POST['motivo'];
                $lugar = $_POST['lugar'];
                $id_cliente = $_POST['cliente'];                
                
                // Definimos la consulta
                $query = "INSERT INTO citas (id, fecha, hora, motivo, lugar, id_cliente) VALUES ('null', '$fecha', '$hora', '$motivo', '$lugar', '$id_cliente')";
                // Sacamos la consulta
                $result = mysqli_query($db, $query) or die(mysqli_error($db));;
                
                // Redirigimos al cliente a una URL validada.
                header('Location: nuevaCita.php?success='.$result);
            }
        ?>
        <br><br>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="nuevaCita.php">  
                    ID: <input type="number" name="idTrabajo" placeholder="<?php echo($idCita); ?>"disabled>
            </div>
            <br><br>
                    
            <div class="row">
                    Fecha: <input type="date" name="fecha" required>
            </div>
            <br><br>
                    
            <div class="row">
                Hora: <input type="time" name="hora" required>
            </div>
            <br><br>
                    
            <div class="row">
                    Motivo: <input type="text" name="motivo" required>
            </div>
            <br><br>
            
            <div class="row">
                    Lugar: <input type="text" name="lugar" required>
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
                            for($i=1;$i<$rows;$i++){
                                $data=mysqli_fetch_array($result2);
                                // Comprobamos que el cliente no sea el que usamos para hacer aparacer un trabajo disponible
                                if($data['nombre']!="Disponible"){
                                    echo "<option value='$data[id]'>$data[nombre] $data[apellidos]</option>"; 
                                }
                            } 
			?>
		</select>
            </div>
            <br><br>
                    <input type="submit" name="submit" value="Enviar">  
                </form>
            </div>
        </div>
        <br><br>
        
        <?php
            // En caso de que se haya insertado correctamente la cita, mostramos un mensaje por pantalla, al igual que en el caso contrario
            if(isset($_GET['success']) && !$_GET['success']==0){
                echo "Se ha insertado correctamente la cita";
            }elseif(isset($_GET['success']) && $_GET['success']==0){
                echo "No se ha insertado correctamente la cita";
            }
            
            // Cerramos la conexión a la base de datos
            mysqli_close($db);
        ?>
    </body>
</html>
