<?php
    setcookie("acceso", date('j-m-Y,H:i:s'), time()+(60*60*24), "/");
    header("location:index.php");
?>

