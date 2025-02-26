<?php
// Captura los valores enviados por POST
$nombres = $_POST['nombres'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

// Incluye el archivo de conexión a la base de datos
include('../php/database.php');

// Consulta SQL para insertar los datos en la tabla
$insertSql = "INSERT INTO consulta (nombres_apellidos, celular, correo, mensaje) VALUES (?, ?, ?, ?)";
$insertStmt = $xcon->prepare($insertSql);
$insertStmt->bind_param("ssss", $nombres, $celular, $correo, $descripcion);
$insertStmt->execute();
$insertStmt->close();

// Redirige a indexservicio.php
header("Location: indexservicio.php?success=1");
exit; // Asegura que el script se detenga después de la redirección
?>
