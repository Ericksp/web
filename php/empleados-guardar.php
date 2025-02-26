<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nomemp'];
    $apellido_paterno = $_POST['apepemp'];
    $apellido_materno = $_POST['apememp'];
    $documento = $_POST['docemp'];
    $usuario = $_POST['usuemp'];
    $clave = $_POST['claemp'];
    $celular = $_POST['celemp'];
    $correo = $_POST['coremp'];

    include('database.php');

    // Insertar un nuevo registro en la tabla empleado
    $sqlInsertar = "INSERT INTO empleado (nomemp, apepemp, apememp, docemp, usuemp, claemp, celemp, coremp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsertar = $xcon->prepare($sqlInsertar);
    $stmtInsertar->bind_param("ssssssss", $nombre, $apellido_paterno, $apellido_materno, $documento, $usuario, $clave, $celular, $correo);

    if ($stmtInsertar->execute()) {
        header("Location: empleados.php?success=1");
        exit;
    } else {
        header("Location: empleados.php?error=2");
        exit;
    }

    $stmtInsertar->close();
    $xcon->close();
} else {
    header("Location: empleados.php");
    exit;
}

?>