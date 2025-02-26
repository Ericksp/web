<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}


include('database.php');

$id=$_GET['id'];
$sql = "SELECT 
r.reserva_id AS id, 

CASE r.servicio
    WHEN 1 THEN 'MISA'
    WHEN 2 THEN 'CATEQUESIS'
    WHEN 3 THEN 'DOCUMENTOS'
    ELSE 'Otro'
END AS servicio,   r.servicio as codigo_servicio,
ObtenerDescripcion(r.servicio, r.codigo_servicio) AS descripcion, 
r.razon_social, 
r.celular, r.correo, r.monto , r.destinatario,
DATE_FORMAT(r.fecha_reserva, '%d/%m/%Y') AS fecha, 
DATE_FORMAT(r.hora_reserva, '%H:%i') AS hora 
FROM 
reserva r where reserva_id=?";
$stmt = $xcon->prepare($sql);
$stmt->bind_param("i", $id); 
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 1) {
  
    $row = $result->fetch_assoc();
    

   
    $razon_social = $row['razon_social'];
    $servicio = $row['servicio'];
    $descripcion = $row['descripcion'];

    $precio = number_format($row['monto'],2);
    $correo = $row['correo'];

    $celular = $row['celular'];
    $destinatario = $row['destinatario'];
    
    $fecha = $row['fecha'];
    $hora = $row['hora'];

    $codigo_servicio = $row['codigo_servicio'];

  
} 


$stmt->close();
$xcon->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="../css/styledashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    
</head>
<body>
    <div class = "dashboardcontainer">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../img/paro49x70.png" alt="">
                    <h2>San Agustin <br> <center>Panel</center></h2>
                </div>
                
                <div class="close" id="close-btn">
                    <span class="material-icons">close</span>

                </div>
            </div>

            <div class="tabs">
                <div class="sidebar">
                  <?php include_once("nav/menu.php");?>
                </div>
            </div>
        </aside>
        <main>
            <div id="1" class="tabs-content">
              

          
            
            <div class="insights">
             
                
            </div>
                <!--tabla de pedidos-->
                <div class="recent-orders">
                    <h1>Consulta Recibida</h1>
                <section class="user-tab">
                    <form action="empleados-modificar.php" method="post">
                      
                        <p>Servicio: </p>
                        <input class="text-box" type="text" name="nomemp" id="nomemp" value="<?php echo $servicio; ?>" > 
                        <p>Descripción: </p>
                        <input class="text-box" type="text" name="apepemp" id="apepemp" value="<?php echo $descripcion; ?>" > 

                        <p>Precio: </p>
                        <input class="text-box" type="text" name="coremp" id="coremp" value="<?php echo $precio; ?>"> 


                        <p>Cliente: </p>
                        <input class="text-box" type="text" name="apememp" id="apememp" value="<?php echo $razon_social; ?>" >
                        
                        <p>Correo: </p>
                        <input class="text-box" type="text" name="docemp" id="docemp" value="<?php echo $correo; ?>" >


                        <p>Celular: </p>
                        <input class="text-box" type="text" name="usuemp" id="usuemp" value="<?php echo $celular; ?>" >

                        <?php if ($codigo_servicio==1) {?>
                        <p>Datos del Fallecido: </p>
                        <input class="text-box" type="text" name="claemp" id="claemp" value="<?php echo $destinatario; ?>" >

                       
                        <p>Fecha de Reserva: </p>
                        <input class="text-box" type="text" name="celemp" id="celemp" value="<?php echo $fecha; ?>" > 
                     
                        <p>Hora: </p>
                        <input class="text-box" type="text" name="coremp" id="coremp" value="<?php echo $hora; ?>"> 
                        
                        <?php } ?>

                        <br>
                       
                        
                        <a href="reservas.php" class="button"> Volver a Reservas</a>
                    </form>
                    
                </section>
                   
                </div>
            </div>

         

        
        </main>

        <!--Parte de la derecha-->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons">dark_mode</span>
                    <span class="material-icons active">light_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p> Hola, <b><?php echo $_SESSION['txtusuario']; ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../img/paro49x70.png">
                    </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>
   
</body>

</html>

