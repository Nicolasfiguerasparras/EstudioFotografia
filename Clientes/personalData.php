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
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('location:../index.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header('location:../Acceder/error.php');
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

            function imprimirTabla($consulta_var){
                if($row = mysqli_fetch_array($consulta_var)){ 
                    echo "<div class='col-10 offset-1'>";   
                        echo "<table class='table'>"; 

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
                    echo "</div>";
                }
            }
            imprimirTabla($consulta);
            
            if(isset($_POST["submit"])){
                $id=$_POST['id'];
                $client="select * from clientes where id=$id";
                $consulta=mysqli_query($db, $client);
                $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
                
                echo "<form method='post' action='nuevoCliente.php'>
                        <div class='form-row'>
                            <div class='form-group col-4 offset-1'>
                                <label for='direccion'>Dirección</label>
                                <input type='text' name='direccion' class='form-control' id='direccion' value='$array[direccion]' required>
                            </div>
                            <div class='form-group col-2'>
                                <label for='telef1'>Teléfono 1</label>
                                <input type='text' class='form-control' name='telef1' id='telef1' value='$array[telefono1]' required>
                            </div>
                            <div class='form-group col-2'>
                                <label for='telef2'>Teléfono 2</label>
                                <input type='text' class='form-control' name='telef2' id='telef2' value='$array[telefono2]' required>
                            </div>
                            <div class='form-group col-2'>
                                <label for='pass'>Contraseña</label>
                                <input type='password' class='form-control' name='pass' id='pass' value='$array[contraseña]' required>
                            </div>
                        </div>
                        <input type='hidden' name='idCliente' placeholder='$id' disabled>
                        <input type='hidden' name='nombre' value='$array[nombre]' required>
                        <input type='hidden' name='apellidos' value='$array[apellidos]' required>
                        <input type='hidden' name='nick' value='$array[nick]' required>
                        <input type='hidden' name='id' value='$id'>
                        <div class='form-group offset-1'>
                            <input type='submit' name='update' value='Enviar'>  
                        </div>
                    </form>";
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
                
                header("Location:personalData.php");
            }
            mysqli_close($db);
        ?>
        
    </body>
</html>
