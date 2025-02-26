<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}

$usuario = $_SESSION['txtusuario'];
$password = $_SESSION['contrasena'];


include('database.php');



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
                    <h1>Agregar Empleados</h1>
                <section class="user-tab">
                    <form action="empleados-guardar.php" method="post">
                      
                        <p>Nombres: </p>
                        <input class="text-box" type="text" name="nomemp" id="nomemp" value="" required> 
                        <p>Apellido Paterno: </p>
                        <input class="text-box" type="text" name="apepemp" id="apepemp" value="" required> 

                        <p>Apellido Materno: </p>
                        <input class="text-box" type="text" name="apememp" id="apememp" value="" required>
                        
                        <p>Documento: </p>
                        <input class="text-box" type="text" name="docemp" id="docemp" value="" required>


                        <p>Usuario: </p>
                        <input class="text-box" type="text" name="usuemp" id="usuemp" value="" required>

                        <p>clave: </p>
                        <input class="text-box" type="text" name="claemp" id="claemp" value="" required >

                        <p>Celular: </p>
                        <input class="text-box" type="text" name="celemp" id="celemp" value="" required> 
                        <p>Correo: </p>
                        <input class="text-box" type="text" name="coremp" id="coremp" value="" required> 
                        <br>
                       
                       
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

