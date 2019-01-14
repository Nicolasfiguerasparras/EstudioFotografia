<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscar trabajo</title>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
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
        
        <?php
            
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos la función buscarTrabajo para mayor comodidad
            function buscarTrabajo($p_textField,$p_db){
                
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario (ID o titular)
                if($p_textField!=""){
                    $works = mysqli_query($p_db,"SELECT * from trabajos t, clientes c 
                                                 where(t.titulo like '%$p_textField%' 
                                                 or
                                                 t.precio like '%$p_textField%'
                                                 or
                                                 c.nombre like '%$p_textField%')  
                                                 and
                                                 t.id_cliente=c.id order by $_POST[option]");
                }
                
                // En el caso en el que encuentre trabajos, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($works)){ 
                    echo "<table border='1px' align='center' style='width:500px; height: 500px'>"; 

                        //Mostramos las cabeceras de la tabla
                        echo "<tr>"; 
                            echo "<td>Título</td>";
                            echo "<td>Cliente</td>";
                            echo "<td>Precio</td>";
                            echo "<td>Imagen</td>";
                        echo "</tr>"; 
                        
                        // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                        do{
                            $queryClient = mysqli_query($p_db,"select nombre from clientes where id=$row[id_cliente]");
                            $client = mysqli_fetch_array($queryClient);
                            echo "<tr>"; 
                                echo "<td>".$row["titulo"]."</td>"; 
                                if($row['id_cliente']=0){
                                    echo "";
                                }else{
                                    if($client['nombre'] == "Disponible"){
                                        echo "<td style='background-color:green;'><p>Disponible</p></td>";
                                    }else{
                                        echo "<td>".$client['nombre']."</td>";
                                    }
                                    
                                }
                                echo "<td>".$row["precio"]."</td>";

                                echo "<td><img src='".$row["imagen"]."' height='150' width='150' /></td>";
                            echo "</tr>"; 
                        }while($row = mysqli_fetch_array($works)); 
                    echo "</table>";

                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                }else{ 
                    echo "¡No se ha encontrado ningún registro!"; 
                }
            }
        ?>
        
        <!--Formulario que recoge el texto a buscar-->
        <div class="padre container">
            <div class="row">
                <form method="post" action="buscarTrabajo.php">  
                    Texto a buscar: <input type="text" name="textField">
            </div>
                    <br><br>
                    <h2>¿Por qué parámetro deseas buscarlo?</h2>
                    <label><input type='radio' name='option' value='nombre' checked>Nombre</label><br>
                    <label><input type='radio' name='option' value='apellidos'>Precio</label><br><br>
                    
                    <input type="submit" name="submit" value="Submit">
                </form>
        
        </div>
        <br><br>
        
        <?php
            // Comprobar que se ha introducido el parámetro de ordenación
            if(isset($_POST['option'])){
                //Comprobar que se ha enviado el formulario
                if(isset($_POST['submit'])){
                    $textoBusqueda=$_POST['textField'];
                    buscarTrabajo($textoBusqueda,$db);
                }
            }   
        ?>
    </body>
</html>
