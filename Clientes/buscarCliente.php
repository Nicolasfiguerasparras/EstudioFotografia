<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Buscar cliente</title>
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
            
            // Definimos la función buscarCliente para mayor comodidad
            function buscarCliente($p_db){
                $submit=$_POST['findText'];
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario
                $query="select * from clientes "
                        . "where nombre like '%$submit%' "
                        . "or apellidos like '%$submit%' "
                        . "or telefono1 like '%$submit%' "
                        . "order by $_POST[option]";
                $consulta = mysqli_query($p_db, $query);
                
                //En el caso en el que encuentre clientes, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table class='table'>"; 

                        //Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            while ($field = mysqli_fetch_field($consulta)){ 
                                echo "<td>$field->name</td>"; 
                            } 
                        echo "</tr>"; 

                        // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                        do{ 
                            echo "<tr>"; 
                                echo "<td>".$row["id"]."</td>"; 
                                echo "<td>".$row["nombre"]."</td>"; 
                                echo "<td>".$row["apellidos"]."</td>"; 
                                echo "<td>".$row["direccion"]."</td>"; 
                                echo "<td>".$row["telefono1"]."</td>";
                                echo "<td>".$row["telefono2"]."</td>";
                                echo "<td>".$row["nick"]."</td>";
                                echo "<td>".$row["contraseña"]."</td>"; 
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
                <form method="post" action="buscarCliente.php">  
                    Texto a buscar: <input type="text" name="findText"><br><br>
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
                    buscarCliente($db);
                }
            }   
        ?>
    </body>
</html>