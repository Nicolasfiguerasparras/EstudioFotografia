<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Buscar cita</title>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
        
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
                
                //En el caso en el que encuentre clientes, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table border=1>"; 

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
            }
        ?>
        <br><br>
        
        <!--Formulario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="buscarCita.php">  
                    Texto a buscar: <input type="text" name="findText"><br><br>
                    Fecha a buscar: <input type="date" name="findDate"><br><br>
                    <h2>¿Por qué parámetro deseas buscarlo?</h2>
                    <label><input type='radio' name='option' value='nombre' checked>Nombre</label><br>
                    <label><input type='radio' name='option' value='apellidos'>Apellidos</label><br><br>
                    <input type="submit" name="submit" value="Buscar">
            </div>
                </form>
        
        </div>
        <br><br>
        
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