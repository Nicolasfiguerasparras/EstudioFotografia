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
                    while ($field = mysqli_fetch_field($consulta)){ 
                        echo "<td>$field->name</td>"; 
                    }
                echo "</tr>"; 

                echo "<form method='post'>";
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
                echo "</table>"; 
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
                header("location: personalData.php");
            }
            // Vuelvo a imprimir la tabla después de haber actualizado la información
            
            mysqli_close($db);
        ?>
        
    </body>
</html>
