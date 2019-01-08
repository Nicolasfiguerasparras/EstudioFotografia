<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Citas</title>
        
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../JavaScript/app.js" type="text/javascript"></script>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        
        <style>
            .centro {
                text-align: center;
                margin: 60px auto;
            }
            
            .title {
                font-weight: bold;
                font-size: 26px;
            }
            th {
                text-align: center;
            }
            
            .today {
                background-color: blueviolet;
            }
        </style>
    </head>
    <body>
        <?php
            // Hoy
            $today = date('Y-m');
            if(empty($_GET)){
                header('Location: citas.php?ym='.$today);
            }
        ?>
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
        
        <div class='contextMenu'>
            <table border='1px solid'>
                <tr>
                    <td><a href='borrarCita.php'>Borrar cita</a></td>
                </tr>
                <tr>
                    <td><a href='buscarCita.php'>Buscar cita</a></td>
                </tr>
                <tr>
                    <td><a href='nuevaCita.php'>Nueva cita</a></td>
                </tr>
            </table>
        </div>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
        
            // Fijamos nuestra zona horaria
            date_default_timezone_set('Europe/Madrid');
            // Sacar el siguiente mes y el anterior
            if(isset($_GET['ym'])) {
                $ym = $_GET['ym'];
            }else {
                // Este mes
                $ym = date('Y-m');
            }
            // Comprobamos el formato
            $timestamp = strtotime($ym . '-01');  // El primer día del mes
            if ($timestamp === false) {
                $ym = date('Y-m');
                $timestamp = strtotime($ym . '-01');
            }

            // Mes
            $month = date('Y-m-j');

            // Título
            $title = date('F, Y', $timestamp);
            // Link para anterior y siguiente mes
            $prev = date('Y-m', strtotime('-1 month', $timestamp));
            $next = date('Y-m', strtotime('+1 month', $timestamp));

            // Número de días en el mes
            $day_count = date('t', $timestamp);
            $str = date('N', $timestamp);

            // Cremaos un array para el calendario
            $weeks = [];
            $week = '';

            // Añadimos filas vacías
            $week .= str_repeat('<td></td>', $str - 1);
            for($day = 1; $day <= $day_count; $day++){
                // Sacamos en una consulta las fechas en las que hay citas
                $query = mysqli_query($db, "select * from citas");
                $fechas=mysqli_fetch_array($query);
                $num_citas=mysqli_num_rows($query);
                $date=$ym . '-' . $day;
                
                // Sacamos en qué mes nos encontramos para poder realizar la consulta
                if(!$_GET['ym']){
                    
                } 
                
                $today = date('Y-m-j');
                
                // Le cambiamos el formato si se encuentra el día de hoy
                if($today == $date){
                    $week .= '<td class="today">';
                }else{
                    $week .= '<td>';
                }

                $week .= $day . '</td>';
                // Sunday OR last day of the month
                if ($str % 7 == 0 || $day == $day_count) {
                    // Último día del mes
                    if ($day == $day_count && $str % 7 != 0) {
                        // Añadir celdas vacías
                        $week .= str_repeat('<td></td>', 7 - $str % 7);
                    }
                    $weeks[] = '<tr>' . $week . '</tr>';
                    $week = '';
                }
                $str++;
            }
        ?>
        
        <div class="centro">
            
            <a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; Anterior</a>
            <span class="title"><?= $title; ?></span>
            <a href="?ym=<?= $next; ?>" class="btn btn-link">Siguiente &gt;</a><br>
            <a href="citas.php">Hoy</a><br><br>
            <table border="1px" align="center" style="width:500px; height: 500px">
                <thead>
                    <tr>
                        <th>L</th>
                        <th>M</th>
                        <th>X</th>
                        <th>J</th>
                        <th>V</th>
                        <th>S</th>
                        <th>D</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($weeks as $week) {
                            echo $week; // DIU LOCO HAZ UN DOLAR GET CON YM Y SACA EL MES LOCO
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
