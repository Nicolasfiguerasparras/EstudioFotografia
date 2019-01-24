<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver todos los trabajos</title>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
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
        ?>
        <!--/NavBar-->
      
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            
            if(isset($_POST["update"])){
                header("location:modificaTrabajo.php?data=$_POST[id]-$_POST[cliente]");
            }
            if(isset($_POST["submit"])){
                $id=$_POST['id'];
                $work="select * from trabajos where id=$id";
                $consulta=mysqli_query($db, $work);
                $array=mysqli_fetch_array($consulta, MYSQLI_ASSOC);

                //Formulario que recoge los datos insertados por el usuario
                echo "<form method='get' action='modificaTrabajo.php'>";
                    echo "<select name='cliente' id='choseClient'>";
                        echo "<option value=0>Elige un cliente</option>";
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
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<input type='submit' name='update' value='Enviar'>";
                echo "</form>";
            }else{
                // Definimos la consulta de búsqueda
                $works = mysqli_query($db,"SELECT * FROM trabajos"); 

                // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($works)){ 
                    echo "<table class='table table-sm table-dark'>"; 
                    
                        // Mostramos las cabeceras de la tabla
                        echo "<thead>";
                            echo "<tr>"; 
                                echo "<th scope='col'>Título</th>";
                                if($usuario==1){
                                    echo "<th scope='col'>Cliente</th>";
                                }
                                echo "<th scope='col'>Precio</th>";
                                echo "<th scope='col'>Imagen</th>";
                            echo "</tr>"; 
                        echo "</thead>";
                        
                        // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                        do{
                            $queryClient = mysqli_query($db,"select nombre from clientes where id=$row[id_cliente]");
                            $client = mysqli_fetch_array($queryClient);
                            echo "<tr>"; 
                                echo "<form method='post' action='trabajos.php'>";
                                $mod_id=$row['id'];
                                echo "<td>".$row["titulo"]."</td>"; 
                                if($row['id_cliente']=0){
                                    echo "";
                                }else{
                                    if($usuario==1){
                                        if($client['nombre'] == "Disponible"){
                                            echo "<td style='background-color:green;'><p>Disponible</p></td>";
                                        }else{
                                            echo "<td>".$client['nombre']."</td>";
                                        }
                                    }
                                }
                                echo "<td>".$row["precio"]."</td>";

                                echo "<td><img src='".$row["imagen"]."' height='150' width='150' /></td>";
                                if($usuario==1){
                                    if($client['nombre']=="Disponible"){
                                        echo "<td><input type='submit' name='submit' value='Modificar'></td>";
                                        echo "<input type='hidden' name='id' value='$mod_id'>";
                                    }
                                }else{
                                    echo "<td><a href='verMas.php?id=$mod_id'>Ver más</td>";
                                }
                                
                                echo "</form>";
                            echo "</tr>"; 
                        }while($row = mysqli_fetch_array($works)); 
                    echo "</table>";

                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                }else{ 
                    echo "¡No se ha encontrado ningún registro!"; 
                }
            }
            
            mysqli_close($db);
        ?>
    </body>
</html>
