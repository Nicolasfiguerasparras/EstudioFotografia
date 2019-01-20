<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Citas</title>  
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="utf-8">
    </head>
    <body>            
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos los valores iniciales para nuestro calendario
            if(!isset($_GET['ym'])){
                header('Location: citas.php?ym='.date('Y-m'));
            }else{
                $exploded=explode("-", $_GET['ym']);
                $prev = date('Y-m', strtotime('-1 month', strtotime($_GET['ym'] . '-01')));
                $next = date('Y-m', strtotime('+1 month', strtotime($_GET['ym'] . '-01')));
                $month=$exploded[1];
                if($month<10){
                    $nombre=$month[1];
                }else{
                    $nombre=$month;
                }
            }
            
            $year=date("Y");
            $diaActual=date("j");
            $mesActual=date("m");
            $fechaActual=date("Y-m");
            $query=mysqli_query($db,"SELECT * FROM citas"); // A PARTIR DE AQUI

            // Obtenemos el dia de la semana del primer dia
            // Devuelve 0 para domingo, 6 para sabado
            $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
            // Obtenemos el ultimo dia del mes
            $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

            $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        ?>
        
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
        
        <div class="container col-12">
            <div class="offset-5">
                <table border="1px">
                    <a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; Anterior</a>
                    <caption>
                        <?php echo $meses[$nombre]." de ".$exploded[0]?>
                    </caption>
                    <a href="?ym=<?= $next; ?>" class="btn btn-link">Siguiente &gt;</a><br>
                    <tr>
                        <th>Lun</th>
                        <th>Mar</th>
                        <th>Mie</th>
                        <th>Jue</th>
                        <th>Vie</th>
                        <th>Sab</th>
                        <th>Dom</th>
                    </tr>

                    <tr>
                        <?php
                            $last_cell=$diaSemana+$ultimoDiaMes;
                            // Hacemos un bucle hasta 42 (máximo de valores que puede haber: 6 columnas de 7 dias)
                            for($i=1;$i<=42;$i++){
                                if($i==$diaSemana){
                                    // Determinamos en que dia empieza
                                    $day=1;
                                }
                                if($i<$diaSemana || $i>=$last_cell){
                                    // Celda vacia
                                    echo "<td>&nbsp;</td>";
                                }else{
                                    // Mostramos el dia
                                    if($day==$diaActual && $month==$mesActual && $year==$exploded[0]){
                                        echo "<td style='background-color:green'>$day</td>";
                                    }else{
                                        echo "<td>$day</td>";
                                    }
                                    $day++;
                                }
                                // Cuando llega al final de la semana, iniciamos una columna nueva
                                if($i%7==0){
                                    echo "</tr><tr>\n";
                                }
                            }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>