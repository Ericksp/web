<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $tipoServicio = $_POST['tipo-servicio'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];


    if (empty($tipoServicio) || empty($fecha) || empty($hora)) {
      
        echo "Por favor, completa todos los campos.";
        exit;
    }

 
    include('database.php');

   
    $sqlVerificar = "SELECT COUNT(*) AS total FROM horario_misa WHERE misa = ? AND fecha = ? AND hora = ?";
    $stmtVerificar = $xcon->prepare($sqlVerificar);
    $stmtVerificar->bind_param("iss", $tipoServicio, $fecha, $hora);
    $stmtVerificar->execute();
    $resultVerificar = $stmtVerificar->get_result();
    $rowVerificar = $resultVerificar->fetch_assoc();

    if ($rowVerificar['total'] > 0) {
      
        header("Location: horarios.php?error=1");
        exit;
    }

   
    $sqlInsertar = "INSERT INTO horario_misa (misa, fecha, hora) VALUES (?, ?, ?)";
    $stmtInsertar = $xcon->prepare($sqlInsertar);
    $stmtInsertar->bind_param("iss", $tipoServicio, $fecha, $hora);

   
    if ($stmtInsertar->execute()) {
       
        header("Location: horarios.php?success=1");
        exit;
    } else {
       
        header("Location: horarios.php?error=2");
        exit;
    }

    
    $stmtVerificar->close();
    $stmtInsertar->close();
    $xcon->close();
} else {
    
    header("Location: horarios.php?error=3");
    exit;
}
?>
