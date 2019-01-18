<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clientes</title>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
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
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Creamos la función imprimirTabla para que nos la saque cada vez que la necesitemos
            function imprimirTabla($p_db){
                // Creamos la consulta que saca todos los clientes
                $consulta=mysqli_query($p_db,"SELECT * FROM clientes");

                // Imprimimos una tabla con los clientes
                if($row = mysqli_fetch_array($consulta)){ 
                    echo "<table border=1>"; 
                        
                        // Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            while ($field = mysqli_fetch_field($consulta)){ 
                                echo "<td>$field->name</td>"; 
                            }
                        echo "</tr>";

                        // Establecemos un bucle DO WHILE que imprime los clientes mientras haya
                        do{ 
                            echo "<form method='post' action='clientes.php'>";
                            if($row['nombre']!="Disponible"){
                                echo "<tr>";
                                    // Creamos una variable que almacena el ID
                                    $mod_id=$row['id'];
                                    echo "<td>".$row['id']."</td>"; 
                                    echo "<td>".$row["nombre"]."</td>"; 
                                    echo "<td>".$row["apellidos"]."</td>"; 
                                    echo "<td>".$row["direccion"]."</td>"; 
                                    echo "<td>".$row["telefono1"]."</td>"; 
                                    echo "<td>".$row["telefono2"]."</td>"; 
                                    echo "<td>".$row["nick"]."</td>"; 
                                    echo "<td>".$row["contraseña"]."</td>";
                                    echo "<td><input type='submit' name='submit' value='Modificar'></td>";
                                    echo "<input type='hidden' name='id' value='$mod_id'>";
                                    echo "</form>";
                                echo "</tr>";
                            }
                        }while($row = mysqli_fetch_array($consulta)); 
                    echo "</table>"; 
                // En caso de no encontrar ningún registro, nos lo indica
                }else{
                    echo "¡No se ha encontrado ningún registro!";
                }
            }

            // En caso de que se envíe el formulario, empieza la consulta
            if(isset($_POST["submit"])){
                $id=$_POST['id'];
                $client="select * from clientes where id=$id";
                $consulta=mysqli_query($db, $client);
                $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
                
                //Formulario que recoge los datos insertados por el usuario
                echo "<form method='post' action='clientes.php'>";
                    echo "ID: <input type='text' name='idCliente' placeholder='$id' disabled><br><br>";
                    echo "Nombre: <input type='text' name='nombre' value='$array[nombre]' required><br><br>";
                    echo "Apellidos: <input type='text' name='apellidos' value='$array[apellidos]' required><br><br>";
                    echo "Dirección: <input type='text' name='direccion' value='$array[direccion]' required><br><br>";
                    echo "Teléfono 1: <input type='text' name='telef1' value='$array[telefono1]' required><br><br>";
                    echo "Teléfono 2: <input type='text' name='telef2' value='$array[telefono2]'><br><br>";
                    echo "Nick: <input type='text' name='nick' value='$array[nick]' required><br><br>";
                    echo "Contraseña: <input type='password' name='pass' value='$array[contraseña]' required><br><br>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<input type='submit' name='update' value='Enviar'>";
                echo "</form>";
            }
            if(isset($_POST["update"])){ 
                $id=$_POST['id'];
                $nombre=$_POST["nombre"];
                $apellidos=$_POST["apellidos"];
                $direccion=$_POST["direccion"];
                $telefono1=$_POST["telef1"];
                $telefono2=$_POST["telef2"];
                $nick=$_POST["nick"];
                $contraseña=$_POST["pass"];

                $update="UPDATE clientes SET nombre='$nombre', apellidos='$apellidos', direccion='$direccion',
                        telefono1='$telefono1', telefono2='$telefono2', nick='$nick', contraseña='$contraseña' 
                        WHERE id='$id'";
                mysqli_query($db, $update);
            }
            // Vuelvo a imprimir la tabla después de haber actualizado la información
            imprimirTabla($db);
            mysqli_close($db);
        ?>
    </body>
</html>