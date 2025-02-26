<?php
// Captura los valores enviados por AJAX
$fecha = $_POST['fecha'];
$idCombo = $_POST['idCombo'];

// Aquí va tu código de conexión y consulta SQL para obtener las horas disponibles según la fecha y el ID del combo
include('../php/database.php');
$sql = "SELECT * FROM horario_misa WHERE fecha = ? AND misa = ? AND estado = 0";
$stmt = $xcon->prepare($sql);
$stmt->bind_param("ss", $fecha, $idCombo);
$stmt->execute();
$result = $stmt->get_result();


$horasDisponibles = '<select class="txtbox" id="hora" name="hora">';

if ($result->num_rows > 0) {
    // Recorre los resultados y agrega las opciones al combo
    while ($row = $result->fetch_assoc()) {
        $horasDisponibles .= '<option value="' . $row['id'] . '">' . $row['hora'] . '</option>';
    }
} else {
    // En caso de no haber resultados, agrega un mensaje indicando que no hay horas disponibles
    $horasDisponibles .= '<option value="0">No hay horas disponibles</option>';
}

$horasDisponibles .= '</select>';

// Devuelve las horas disponibles
echo $horasDisponibles;
?>
