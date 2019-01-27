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
                    echo "<div class='col-10 offset-1'>";
                        echo "<table class='table'>"; 

                            //Mostramos las cabeceras de la tabla
                            echo "<tr>"; 
                                echo "<td>Nombre</td>";
                                echo "<td>Apellidos</td>";
                                echo "<td>Dirección</td>";
                                echo "<td>Teléfono 1</td>";
                                echo "<td>Teléfono 2</td>";
                                echo "<td>Nick</td>";
                                echo "<td>Contraseña</td>";
                            echo "</tr>"; 

                            // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                            do{ 
                                echo "<tr>"; 
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
                    echo "</div>";
                    mysqli_close($p_db);
                }
                
                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                else{ 
                    echo "¡No se ha encontrado ningún registro!"; 
                }
            }
        ?>
        
        <!--Formulario-->
        <div class="container">
            <form method="post" action="buscarCliente.php">
                <div class="form-row">
                    <div class="form-group col-10 offset-1">
                      <label for="findText">Texto a buscar</label>
                      <input type="text" class="form-control" id="findText" name="findText" placeholder="Introduzca el texto a buscar">
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
                        <input type="submit" name="submit" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <!--/Formulario-->
        
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