<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nombre = $_POST['nomemp'];
    $apellido_paterno = $_POST['apepemp'];
    $apellido_materno = $_POST['apememp'];
    $documento = $_POST['docemp'];

    $usuario = $_POST['usuemp'];
    $clave = $_POST['claemp'];
    $celular = $_POST['celemp'];
    $correo=$_POST['coremp'];
        
    $id = $_POST['id'];
    


    include('database.php');

    // Actualizar la tabla con los valores recibidos
    $sqlActualizar = "UPDATE empleado SET nomemp = ?, apepemp = ?, apememp = ?, docemp = ?  ,  usuemp=?, claemp=?, celemp=?, coremp=?   WHERE codemp = ?";
    $stmtActualizar = $xcon->prepare($sqlActualizar);
    $stmtActualizar->bind_param("ssssssssi", $nombre,$apellido_paterno,$apellido_materno, $documento, $usuario, $clave, $celular,$correo, $id);

    if ($stmtActualizar->execute()) {
        header("Location: empleados.php?success=1");
        exit;
    } else {
        header("Location: empleados.php?error=2");
        exit;
    }

    $stmtActualizar->close();
    $xcon->close();
} else {
    header("Location: empleados.php");
    exit;
}
?>