<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}

include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la eliminación del registro en la base de datos
    $sql = "DELETE FROM horario_misa WHERE id = ?";
    $stmt = $xcon->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redirigir a horarios.php con mensaje de éxito
        header("Location: horarios.php?success=1");
        exit();
    } else {
        // Redirigir a horarios.php con mensaje de error
        header("Location: horarios.php?error=2");
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a horarios.php con mensaje de error
    header("Location: horarios.php?error=3");
    exit();
}
?>
