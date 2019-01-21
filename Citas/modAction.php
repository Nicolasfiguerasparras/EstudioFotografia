<?php
    if(isset($_POST["update"])){ 
        $idCita=$_POST['idCita'];
        $idCliente=$_POST['cliente'];
        $fecha=$_POST["fecha"];
        $hora=$_POST["hora"];
        $motivo=$_POST["motivo"];
        $lugar=$_POST["lugar"];

        $update="UPDATE citas SET id='$idCita', id_cliente='$idCliente', fecha='$fecha',
                hora='$hora', motivo='$motivo', lugar='$lugar' WHERE id='$idCita'";
        mysqli_query($db, $update);

        header("Location: modificaCita.php?id=$idCita");
    }
    // AAAAAAAAAAAAAAAAAAAAAAA NO SE QUE HACER AAAAAAAAAAAAAAAA
?>