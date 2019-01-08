<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar Trabajo</title>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../JavaScript/app.js" type="text/javascript"></script>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Creamos la función imprimirTabla para que nos la saque cada vez que la necesitemos
            function imprimirTabla($p_db){
                // Creamos la consulta que saca todas las noticias
                $consulta=mysqli_query($p_db,"SELECT * FROM trabajos");

                // Imprimimos una tabla con las noticias
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table border='1px' align='center' style='width:700px; height: 500px'>"; 
                        
                        // Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            echo "<td>ID</td>";
                            echo "<td>Título</td>";
                            echo "<td>Descripción</td>";
                            echo "<td>Precio</td>";
                            echo "<td>Imagen</td>";
                            echo "<td>Borrar trabajo</td>";
                        echo "</tr>"; 


                        // Establecemos un bucle DO WHILE que imprime las noticias mientras haya
                        do{ 
                            echo "<tr>";
                                // Creamos un formulario para introducir el botón borrar en cada noticia
                                echo "<form method='get'>";
                                    // Creamos una variable que almacena el ID
                                    $del_id=$row['id'];
                                    echo "<td>".$del_id."</td>"; 
                                    echo "<td>".$row["titulo"]."</td>"; 
                                    echo "<td>".$row["descripcion"]."</td>";
                                    echo "<td>".$row["precio"]."</td>";
                                    echo "<td><img src='".$row["imagen"]."' style='width:250px; height:240px;' /></td>"; 
                                    echo "<td><a class='deleteButton'><input type='submit' value='Borrar' name='borrar'></a></td>";
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
            // Imprimimos la tabla con las noticias
            imprimirTabla($db);
            
            // En caso de que se envíe el formulario, empieza la consulta
            if(isset($_GET['borrar'])){
                // Almacenamos el ID enviado por el método GET en el botón borrar que se haya pulsado
                $p_id=$_GET['id'];   
                // Definimos la consulta
                $query=mysqli_query($db, "DELETE FROM trabajos WHERE id = '$p_id'");
                
                // Si la consulta da fallo, se informa de ello
                if(!$query){
                    echo mysqli_error($query);
                }
                // En caso contrario, refrescamos la página
                else{
                    header("Location: borrarTrabajo.php");
                }
                // Cerramos la conexión
                mysqli_close($db);
            }
        ?>
    </body>
</html>
