<!DOCTYPE HTML>  
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="noticiasStyle.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <link href="tableStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>  
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos la función buscarNoticia para mayor comodidad
            function buscarNoticia($p_db){
                $submitName=$_POST['findText'];
                $submitDate=$_POST['findDate'];
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario
                if(!$submitName){
                    $query="select * from noticias where fecha like '%$submitDate%' order by $_POST[option]";
                }elseif(!$submitDate){
                    $query="select * from noticias where titular like '%$submitName%' order by $_POST[option]";
                }
                $consulta = mysqli_query($p_db, $query) or die(mysqli_error());
                
                // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table>"; 

                        // Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            echo "<td style='width:250px;'>ID</td>";
                            echo "<td style='width:250px;'>Titular</td>";
                            echo "<td style='width:400px;'>Contenido</td>";
                            echo "<td style='width:250px;'>Imagen</td>";
                            echo "<td style='width:250px;'>Fecha de activación</td>";
                        echo "</tr>"; 

                        // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                        do{ 
                            echo "<tr>"; 
                                echo "<td>".$row["id"]."</td>"; 
                                echo "<td>".$row["titular"]."</td>"; 
                                echo "<td>".$row["contenido"]."</td>"; 
                                echo "<td><img src='".$row["imagen"]."' style='width:250px; height:240px;' /></td>"; 
                                $fecha = strtotime($row["fecha"]);
                                $dia = date('d', $fecha);
                                $mes = date('m', $fecha);
                                $anio = date('Y', $fecha);
                                echo "<td>".$dia."-".$mes."-".$anio."</td>"; 
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
        
        <!--Formulario-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="buscarNoticia.php">  
                    Texto a buscar: <input type="text" name="findText"><br><br>
                    Fecha a buscar: <input type="date" name="findDate"><br><br>
                    <h2>¿Por qué parámetro deseas buscarlo?</h2>
                    <label><input type='radio' name='option' value='titular' checked>Titulo</label><br>
                    <label><input type='radio' name='option' value='fecha'>Fecha de activación</label><br><br>
                    <input type="submit" name="submit" value="Buscar">
                </form>
            </div>
        </div>
        <br><br>
        
        <?php
            // Comprobar que se ha introducido el parámetro de ordenación
            if(isset($_POST['option'])){
                //Comprobar que se ha enviado el formulario
                if(isset($_POST['submit'])){
                    buscarNoticia($db);
                }
            }
        ?>

    </body>
</html>