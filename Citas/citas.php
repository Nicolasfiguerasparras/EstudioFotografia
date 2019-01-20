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
            // Definimos los valores iniciales
            $month=date("n");
            $year=date("Y");
            $diaActual=date("j");

            // Obtenemos el dia de la semana del primer dia del mes (devuelve 0 para domingo, 6 para sabado)
            $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
            // Obtenemos el ultimo dia del mes
            $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

            // Creamos un array con todos los nombres de los meses del año
            $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        ?>
        
        <table>
            <caption>
                <?php echo $meses[$month]." ".$year?>
            </caption>
            <tr>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mie</th>
                <th>Jue</th>
                <th>Vie</th>
                <th>Sab</th>
                <th>Dom</th>
            </tr>
            <tr bgcolor="silver">
            <?php
                $last_cell=$diaSemana+$ultimoDiaMes;
                // hacemos un bucle hasta 42, que es el máximo de valores que puede
                // haber... 6 columnas de 7 dias
                for($i=1;$i<=42;$i++){
                        if($i==$diaSemana)
                        {
                                // determinamos en que dia empieza
                                $day=1;
                        }
                        if($i<$diaSemana || $i>=$last_cell)
                        {
                                // celca vacia
                                echo "<td>&nbsp;</td>";
                        }else{
                                // mostramos el dia
                                if($day==$diaActual)
                                        echo "<td class='hoy'>$day</td>";
                                else
                                        echo "<td>$day</td>";
                                $day++;
                        }
                        // cuando llega al final de la semana, iniciamos una columna nueva
                        if($i%7==0)
                        {
                            echo "</tr><tr>\n";
                        }
                    }
            ?>
            </tr>
        </table>
    </body>
</html>