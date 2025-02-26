<?php
include('database.php');
//include('../html/indexadm.html');

$usuario = $_POST["txtusuario"];
$password = $_POST["contrasena"];

session_start();

// Consulta SQL para buscar el usuario y la contraseña en la base de datos
$sql = "SELECT * FROM empleado WHERE usuemp=? AND claemp=?";
$stmt = $xcon->prepare($sql);
$stmt->bind_param("ss", $usuario, $password); // 'ss' indica que ambos parámetros son de tipo string
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró un usuario con la contraseña proporcionada
if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    // Almacenar el nombre de usuario en la sesión
    $_SESSION['txtusuario'] = $row['usuemp'];
    $_SESSION['contrasena'] = $row['claemp'];

    // Verificar si el usuario tiene el rol de administrador
    $comprobacion = "SELECT codrol FROM empleado WHERE usuemp=? AND codrol='1'";
    $stmt = $xcon->prepare($comprobacion);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultComprobacion = $stmt->get_result();
    
    // Redirigir si el usuario es administrador
    if ($resultComprobacion->num_rows == 1) {
        header("location: dashboard.php");
        exit();
    } else {
        header("location: dashboard.php");
        exit;
    }
} else {
    header("location: indexcuenta.php?error=1");
    exit();
}

$stmt->close();
$xcon->close();
?>
