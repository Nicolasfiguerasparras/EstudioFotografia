<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mis datos</title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('../index.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header('../Acceder/error.php');
            }
        ?>
        <!--/NavBar-->
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Sacamos el id del cliente que está conectado
            $id_user = $_SESSION['id_user'];
            
            // Creamos la consulta que saca todos los clientes
            $consulta=mysqli_query($db,"SELECT * FROM clientes where id=$id_user");

            // Imprimimos una tabla con los datos personales
            if($row = mysqli_fetch_array($consulta)){ 
                echo "<table border=1>"; 

                // Mostramos las cabeceras de la tabla
                echo "<tr>"; 
                    echo "<td>Nombre</td>";
                    echo "<td>Apellidos</td>";
                    echo "<td>Dirección</td>";
                    echo "<td>Teléfono 1</td>";
                    echo "<td>Teléfono 2</td>";
                    echo "<td>Nick</td>";
                    echo "<td>Contraseña</td>";
                echo "</tr>"; 

                echo "<form method='post'>";
                    echo "<tr>";
                        // Creamos una variable que almacena el ID
                        $mod_id=$row['id'];
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
                echo "</table>"; 
            }
            
            if(isset($_POST["submit"])){
                $id=$_POST['id'];
                $client="select * from clientes where id=$id";
                $consulta=mysqli_query($db, $client);
                $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
                
                //Formulario que recoge los datos insertados por el usuario
                echo "<form method='post' action='clientes.php'>";
                    echo "Dirección: <input type='text' name='direccion' value='$array[direccion]' required><br><br>";
                    echo "Teléfono 1: <input type='text' name='telef1' value='$array[telefono1]' required><br><br>";
                    echo "Teléfono 2: <input type='text' name='telef2' value='$array[telefono2]'><br><br>";
                    echo "Contraseña: <input type='password' name='pass' value='$array[contraseña]' required><br><br>";
                    echo "<input type='hidden' name='idCliente' placeholder='$id' disabled><br><br>";
                    echo "<input type='hidden' name='nombre' value='$array[nombre]' required><br><br>";
                    echo "<input type='hidden' name='apellidos' value='$array[apellidos]' required><br><br>";
                    echo "<input type='hidden' name='nick' value='$array[nick]' required><br><br>";
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
                header("Refresh:0");
            }
            // Vuelvo a imprimir la tabla después de haber actualizado la información
            
            mysqli_close($db);
        ?>
        
    </body>
</html>
