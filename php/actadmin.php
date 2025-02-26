<?php
include('database.php');

$nombre= $_POST['nombresAdmin'];
$email = $_POST['correoAdmin'];
$pass = $_POST['contrasenaAdmin'];

$id = $_SESSION['codemp'];

if($xcon->connect_error){
    die('Connection failed: '.$coxconnn->connect_error);

}else { 
    $insertar = "UPDATE empleado SET usuemp = '$usuario', coremp='$email', claemp = '$pass', WHERE codemp=$id";
    $query = mysqli_query($xcon,$insertar);
    if($query){
        header('location: dashboard.php');
        echo '<script>document.getElementById("TabQuejas").click();</script>';
    }
}

?>