<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nombres_apellidos = $_POST['nombres_apellidos'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $id = $_POST['id'];
    
    include('database.php');

    // Actualizar la tabla con los valores recibidos
    $sqlActualizar = "UPDATE consulta SET nombres_apellidos = ?, celular = ?, correo = ?, mensaje = ? WHERE id = ?";
    $stmtActualizar = $xcon->prepare($sqlActualizar);
    $stmtActualizar->bind_param("ssssi", $nombres_apellidos, $celular, $correo, $mensaje, $id);

    if ($stmtActualizar->execute()) {
        header("Location: dashboard.php?success=1");
        exit;
    } else {
        header("Location: dashboard.php?error=2");
        exit;
    }

    $stmtActualizar->close();
    $xcon->close();
} else {
    header("Location: dashboard.php");
    exit;
}
?>