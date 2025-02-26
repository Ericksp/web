<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}

$usuario = $_SESSION['txtusuario'];
$password = $_SESSION['contrasena'];


include('database.php');

$sql = "SELECT id, nombres_apellidos, celular,correo,mensaje FROM consulta order by id";
$stmt = $xcon->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

            <div class="date">
                <input type="date">
            </div>
            
            <div class="insights">
            <?php 
                
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La operación se realizo correctamente.'
                    });</script>";
                } elseif (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ya existe un registro en el sistema.'
                    });</script>";
                }
                
                
                elseif (isset($_GET['error']) && $_GET['error'] == 2) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrio un error al realizar la operación.'
                    });</script>";
                }
                
                elseif (isset($_GET['error']) && $_GET['error'] == 3) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Contactar a soporte.'
                    });</script>";
                }

                ?>
                
            </div>
                <!--tabla de pedidos-->
                <div class="recent-orders">
                    <h2>Mensajes</h2>
                   
                   
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


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'mensajes-borrar.php?id=' + id;
            }
        });
    }
</script>