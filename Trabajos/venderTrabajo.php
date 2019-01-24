<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vender trabajo</title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                    $usuario=1;
                }else{
                    include('../NavBar/navBarClient.php');
                    $usuario=0;
                }
            }else{
                include('../NavBar/navBarClearUser.php');
                $usuario=0;
            }
        ?><br>
        <!--/NavBar-->
        
        <!-- Form action -->
        <?php
            //Conectar a la Base de Datos y sacar el ID
            include('../connectDB.php');
            $db = connectDb();

            $id=$_GET['id'];
            
            if(isset($_POST["update"])){
                header("location:modificaTrabajo.php?data=$_POST[id]-$_POST[cliente]"); // Aquí grumete grrrrrrrr
            }
        ?>
        <!-- ./form action -->
        
        <?php
            echo "<form method='get' action='modificaTrabajo.php' style='text-align:center;>";
                echo "<div class='form-row'>";
                    echo "<div class='form-group col-10 offset-1 col-md-6 offset-md-3'>";
                        echo "<h3><label for='cliente'>¿A qué cliente deseas vender éste trabajo?</label></h3>";
                        echo "<select id='choseClient' name='cliente' class='form-control'>";
                            echo "<option selected value=0>Elige un cliente</option>";
                            $consultaClientes = "SELECT id, nombre, apellidos FROM clientes";
                            $result2 = mysqli_query($db, $consultaClientes);
                            // Sacamos el número de clientes que hay
                            $rows = mysqli_num_rows($result2);
                            for($i=0;$i<$rows;$i++){
                                $data=mysqli_fetch_array($result2);
                                if($data['nombre']!="Disponible"){
                                    echo "<option value='$data[id]'>$data[nombre] $data[apellidos]</option>"; 
                                }
                            }
                        echo "</select>";
                    echo "</div>";
                    echo "<div class='form-group col-10 offset-1 col-md-6 offset-md-3'>";
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo "<input type='submit' name='update' value='Vender'>";
                    echo "</div>";
                echo "</div>";
            echo "</form>";
            
            
//            <div class="form-row">
//                <div class="form-group col-md-6">
//                    <label for="inputEmail4">Email</label>
//                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
//                </div>
//                <div class="form-group col-md-6">
//                    <label for="inputPassword4">Password</label>
//                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
//                </div>
//            </div>
        ?>
    </body>
</html>
                    