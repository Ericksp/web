<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}


include('database.php');

$id=$_GET['id'];
$sql = "SELECT * FROM empleado WHERE codemp=?";
$stmt = $xcon->prepare($sql);
$stmt->bind_param("i", $id); 
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 1) {
  
    $row = $result->fetch_assoc();
    

    $id = $row['codemp'];
    $nombres = $row['nomemp'];
    $apellido_paterno = $row['apepemp'];
    $apellido_materno = $row['apememp'];
    
    $documento = $row['docemp'];

    $celular = $row['celemp'];
    $correo = $row['coremp'];

    $usuario = $row['usuemp'];

    $clave = $row['claemp'];

  
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
                      
                        <p>Nombres: </p>
                        <input class="text-box" type="text" name="nomemp" id="nomemp" value="<?php echo $nombres; ?>" > 
                        <p>Apellido Paterno: </p>
                        <input class="text-box" type="text" name="apepemp" id="apepemp" value="<?php echo $apellido_paterno; ?>" > 

                        <p>Apellido Materno: </p>
                        <input class="text-box" type="text" name="apememp" id="apememp" value="<?php echo $apellido_materno; ?>" >
                        
                        <p>Documento: </p>
                        <input class="text-box" type="text" name="docemp" id="docemp" value="<?php echo $documento; ?>" >


                        <p>Usuario: </p>
                        <input class="text-box" type="text" name="usuemp" id="usuemp" value="<?php echo $usuario; ?>" >

                        <p>clave: </p>
                        <input class="text-box" type="text" name="claemp" id="claemp" value="<?php echo $clave; ?>" >

                        <p>Celular: </p>
                        <input class="text-box" type="text" name="celemp" id="celemp" value="<?php echo $celular; ?>" > 
                        <p>Correo: </p>
                        <input class="text-box" type="text" name="coremp" id="coremp" value="<?php echo $correo; ?>"> 
                        <br>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input class="button" type="submit" value="Guardar cambios" name="guardar">
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

