<?php
include('../php/database.php');



$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['email'];
$servicio = $_POST['tipo'];
$codigo_servicio = $_POST['opciones'];
$celular = $_POST['cel'];


$razon_social = $nombre . ' ' . $apellidos;

$precio = $_POST['precio'];


$destinatario;

if ($servicio == 1) {
    $fecha_reserva = $_POST['fecha'];
    $hora_codigo = $_POST['hora'];
   
    $nombre2 = $_POST['nombre2'];
    $apellido2 = $_POST['apellido2'];
    $destinatario=$nombre2.' '.$apellido2;
    $hora_format = $_POST['hora_format'];
    




    $sql = "INSERT INTO reserva (servicio, codigo_servicio, razon_social, correo, celular, destinatario, fecha_reserva, hora_reserva,monto) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $xcon->prepare($sql);
    $stmt->bind_param('iisssssss', $servicio, $codigo_servicio, $razon_social, $correo, $celular, $destinatario, $fecha_reserva, $hora_format,$precio);

    // Actualización del campo estado en la tabla horario_misa
    $estado = 1; // Valor que deseas asignar al campo estado
    $sql_update = "UPDATE horario_misa SET estado = ? WHERE id = ?";
    $stmt_update = $xcon->prepare($sql_update);
    $stmt_update->bind_param('ii', $estado, $hora_codigo);
    $stmt_update->execute();


    } 
    
    else {
            $sql = "INSERT INTO reserva (servicio, codigo_servicio, razon_social, correo, celular,monto) 
                    VALUES (?, ?, ?, ?, ?,?)";
            $stmt = $xcon->prepare($sql);
            $stmt->bind_param('iissss', $servicio, $codigo_servicio, $razon_social, $correo, $celular,$precio);  
    }

$stmt->execute();
$stmt->close();


header("Location: pasarela.php?precio=".$precio);
exit();

?>


