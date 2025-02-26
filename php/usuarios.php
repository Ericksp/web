
<?php
session_start();

$usuario = $_SESSION['txtusuario'];
$password = $_SESSION['contrasena'];

// Ahora puedes utilizar $usuario y $password según tus necesidades en este archivo
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
                    <a href="#">
                        <button class="tab-button" ><span class="material-icons">dashboard</span>
                            <h3>Dashboard</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button" ><span class="material-icons">account_circle</span>
                            <h3>Usuario</h3></button>
                    </a>

                    <a href="#">
                        <button class="tab-button" ><span class="material-icons">groups</span>
                            <h3>Ver usuarios</h3></button>
                    </a>

                    <a href="#">
                        <button class="tab-button" ><span class="material-icons">groups</span>
                            <h3>Editar Fecha</h3></button>
                    </a>
                    <a href="indexcuenta.php">
                        <button class="tab-button"><span class="material-icons">logout</span>
                            <h3>Cerrar sesión</h3></button>
                    </a>
                </div>
            </div>
        </aside>
        <main>
            <div id="1" class="tabs-content">
                <h1>Dashboard</h1>

            
          
                <!--tabla de pedidos-->
                <div class="recent-orders">
                    <h2>Mensajes</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Mensaje</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>Michael Johnson</td>
                            <td>5551234567</td>
                            <td>michaelj@example.com</td>
                            <td>Buenos días</td>
                            <td><button>Editar</button></td>
                        </tr>

                        
                        </tbody>
                    </table>
                    
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