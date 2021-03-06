<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Buscar cita</title>
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
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos la función buscarNoticia para mayor comodidad
            function buscarCita($p_db){
                $submit=$_POST['findText'];
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario
                $query = "SELECT * FROM citas ci, clientes cli WHERE (ci.fecha='$submit' or cli.nombre like '%$submit%') and ci.id_cliente = cli.id ORDER BY $_POST[option]";
                $consulta = mysqli_query($p_db, $query);
                
                echo "<div class='container'>";
                    //En el caso en el que encuentre clientes, imprime una tabla con los resultados
                    if($row = mysqli_fetch_array($consulta)){ 
                        echo "<table class='table'>"; 

                            //Mostramos las cabeceras de la tabla
                            echo "<tr>"; 
                                echo "<td>Fecha</td>";
                                echo "<td>Hora</td>";
                                echo "<td>Motivo</td>";
                                echo "<td>Lugar</td>";
                                echo "<td>ID del cliente</td>";
                            echo "</tr>"; 

                            // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                            do{ 
                                echo "<tr>"; 
                                    $fecha = strtotime($row["fecha"]);
                                    $dia = date('d', $fecha);
                                    $mes = date('m', $fecha);
                                    $anio = date('Y', $fecha);
                                    echo "<td>".$dia."-".$mes."-".$anio."</td>"; 
                                    echo "<td>".$row["hora"]."</td>"; 
                                    echo "<td>".$row["motivo"]."</td>"; 
                                    echo "<td>".$row["lugar"]."</td>"; 
                                    echo "<td>".$row["id_cliente"]."</td>";
                                echo "</tr>"; 
                            }while($row = mysqli_fetch_array($consulta)); 
                        echo "</table>"; 
                        mysqli_close($p_db);
                    }

                    // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                    else{ 
                        echo "¡No se ha encontrado ningún registro!"; 
                    }
                echo "</div>";
            }
        ?>
        <br>
        
        <!--Formulario-->
        <div class="padre container">
            <form method="post" action="buscarCita.php">
                <div class="form-row">
                    <div class="form-group col-5 offset-1">
                        <label for="findText">Texto a buscar</label>
                        <input type="text" class="form-control" id="findText" name="findText" placeholder="Introduzca el texto a buscar">
                    </div>
                    <div class="form-group col-5">
                        <label for="findText">Fecha a buscar</label>
                        <input type="text" class="form-control" id="findDate" name="findDate" placeholder="Introduzca la fecha a buscar">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-check offset-1">
                        <input class="form-check-input" type="radio" name="option" value="nombre" id="nombre" checked>
                        <label class="form-check-label" for="nombre">
                            Nombre
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-check offset-1">
                        <input class="form-check-input" type="radio" name="option" value="apellidos" id="apellidos">
                        <label class="form-check-label" for="apellidos">
                            Apellidos
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group offset-1">
                        <input type="submit" class="btn btn-primary" name="submit" value="Buscar">
                    </div>
                </div>
            </form>        
        </div>
        <br>
        
        <?php
            // Comprobar que se ha introducido el parámetro de ordenación
            if(isset($_POST['option'])){
                //Comprobar que se ha enviado el formulario
                if(isset($_POST['submit'])){
                    buscarCita($db);
                }
            }   
        ?>
    </body>
</html>