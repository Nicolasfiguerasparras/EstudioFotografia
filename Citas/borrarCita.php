<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar cita</title>
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
                $consulta=mysqli_query($p_db,"SELECT * FROM citas");

                // Imprimimos una tabla con las noticias
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table class='table'>"; 
                        
                        // Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            echo "<td>ID</td>";
                            echo "<td>Fecha</td>";
                            echo "<td>Hora</td>";
                            echo "<td>Motivo</td>";
                            echo "<td>Lugar</td>";
                            echo "<td>Cliente</td>";
                            echo "<td>Borrar cita</td>";
                        echo "</tr>"; 


                        // Establecemos un bucle DO WHILE que imprime las noticias mientras haya
                        do{ 
                            echo "<tr>";
                                // Creamos un formulario para introducir el botón borrar en cada noticia
                                echo "<form method='get' action='borrarCita.php'>";
                                    $consultCliente = mysqli_query($p_db, "SELECT * from clientes where id=$row[id]");
                                    $consultaCliente = mysqli_fetch_array($consultCliente, MYSQLI_ASSOC);
                                    // Creamos una variable que almacena el ID
                                    $del_id=$row['id'];
                                    echo "<td>".$del_id."</td>"; 
                                    $fecha = strtotime($row["fecha"]);
                                    $dia = date('d', $fecha);
                                    $mes = date('m', $fecha);
                                    $anio = date('Y', $fecha);
                                    echo "<td>".$dia."-".$mes."-".$anio."</td>";  
                                    echo "<td>".$row["hora"]."</td>";
                                    echo "<td>".$row["motivo"]."</td>";
                                    echo "<td>".$row["lugar"]."</td>";
                                    echo "<td>".$consultaCliente["nombre"]."</td>";
                                    echo "<td><input type='submit' value='Borrar' name='borrar'></td>";
                                    // Introducimos un input oculto que utilizaremos para conocer a qué botón de borrar de todos ha pulsado el usuario
                                    echo "<input type='hidden' name='id' value='$del_id'>";
                                echo "</form>";
                            echo "</tr>";
                        }while($row = mysqli_fetch_array($consulta)); 
                    echo "</table>"; 
                // En caso de no encontrar ningún registro, nos lo indica
                }else{
                    echo "¡No se ha encontrado ningún registro!";
                }
            }   
        ?>
        
        <?php
            // Imprimimos la tabla con las citas
            imprimirTabla($db);
            
            // En caso de que se envíe el formulario, empieza la consulta
            if(isset($_GET['borrar'])){
                // Almacenamos el ID enviado por el método GET en el botón borrar que se haya pulsado
                $p_id=$_GET['id'];   
                // Definimos la consulta
                $query=mysqli_query($db, "DELETE FROM citas WHERE id = '$p_id'");
                
                // Si la consulta da fallo, se informa de ello
                if(!$query){
                    echo mysqli_error($query);
                }
                // En caso contrario, refrescamos la página
                else{
                    // Redirigimos al cliente al listado de clientes.
                    echo "<script> location.href='citas.php';</script>";
                }
                // Cerramos la conexión
                mysqli_close($db);
            }
        ?>
    </body>
</html>
