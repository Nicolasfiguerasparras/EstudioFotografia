<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header("location: ../Acceder/error.php");
            }
        ?>
        <!--/NavBar-->
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $cita="select * from citas where id=$id";
                $consulta=mysqli_query($db, $cita);
                $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
                $id_cliente=$array["id_cliente"];

                $queryClient=mysqli_query($db, "SELECT * FROM clientes WHERE id=$array[id_cliente]");
                $datosClient=mysqli_fetch_array($queryClient, MYSQLI_ASSOC);
                $nombre="$datosClient[nombre] $datosClient[apellidos]";

                //Formulario que recoge los datos insertados por el usuario
                echo "<form method='post' action='modificaCita.php'>";
                    echo "Fecha: <input type='date' name='fecha' value='$array[fecha]' required><br><br>";
                    echo "Hora: <input type='time' name='hora' value='$array[hora]' required><br><br>";
                    echo "Motivo: <input type='text' name='motivo' value='$array[motivo]'><br><br>";
                    echo "Lugar: <input type='text' name='lugar' value='$array[lugar]' required><br><br>";

                    echo "<select name='cliente' id='choseClient'>";
                        echo "<option value=0>$nombre</option>";
                        $consulta = "SELECT id, nombre, apellidos FROM clientes";
                        $result2 = mysqli_query($db, $consulta);
                        // Sacamos el número de clientes que hay
                        $rows = mysqli_num_rows($result2);
                        for($i=1;$i<$rows;$i++){
                            $data=mysqli_fetch_array($result2);
                            // Comprobamos que el cliente no sea el que usamos para hacer aparacer un trabajo disponible
                            if($data['nombre']!="Disponible" && $data['nombre']!=$datosClient['nombre']){
                                echo "<option value='$data[id]'>$data[nombre] $data[apellidos]</option>"; 
                            }
                        }
                    echo "<input type='hidden' name='idCita' value='$id'>";
                    echo "<input type='hidden' name='idCliente' value='$id_cliente'>";
                    echo "<input type='submit' name='update' value='Enviar'>";
                echo "</form>";
            }
            
            if(isset($_POST["update"])){ 
                $idCita=$_POST['idCita'];
                $idCliente=$_POST['idCliente'];
                $fecha=$_POST["fecha"];
                $hora=$_POST["hora"];
                $motivo=$_POST["motivo"];
                $lugar=$_POST["lugar"];

                $update="UPDATE citas SET fecha='$fecha',
                        hora='$hora', motivo='$motivo', lugar='$lugar', id_cliente='$idCliente' WHERE id='$idCita'";
                mysqli_query($db, $update);
                
                echo "<script> location.href='citaDia.php?data=$idCita'; </script>";
            }
            mysqli_close($db);
        ?>
    </body>
</html>
