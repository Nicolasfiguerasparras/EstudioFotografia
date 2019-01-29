<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nueva cita</title>
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
        
        <?php            
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
                
                // Redirigimos al cliente al listado de clientes.
                echo "<script> location.href='citas.php';</script>";
            }
        ?>
        <br><br>
        
        
        <!--Formulario que recoge los datos insertados por el usuario-->
        <form method="post" action="nuevaCita.php">
            <div class="form-row">
                <div class="form-group col-1 offset-1">
                    <label for="idTrabajo">ID</label>
                    <input type="number" name="idTrabajo" class="form-control" id="idTrabajo" placeholder="<?php echo($idCita); ?>"disabled>
                </div>
                <div class="form-group col-4">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                </div>
                <div class="form-group col-5">
                    <label for="hora">Hora</label>
                    <input type="time" class="form-control" name="hora" id="hora" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="motivo">Motivo</label>
                    <input type="text" class="form-control" id="motivo" placeholder="Motivo de la cita" name="motivo" required>
                </div>
                <div class="form-group col-5">
                    <label for="lugar">Lugar</label>
                    <input type="text" class="form-control" id="lugar" placeholder="Apartamento, estudio, etc" name="lugar" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-3 offset-1">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" name="cliente" id="choseClient">
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
            </div>
            <div class="form-group offset-1">
                <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
            </div>
        </form>
        <br>
        
        <?php            
            // Cerramos la conexión a la base de datos
            mysqli_close($db);
        ?>
    </body>
</html>
