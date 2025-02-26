<?php
session_start();

if (!isset($_SESSION['txtusuario']) || !isset($_SESSION['contrasena'])) {
    header("Location: indexcuenta.php"); 
    exit(); 
}

$usuario = $_SESSION['txtusuario'];
$password = $_SESSION['contrasena'];




include('database.php');

$sql = "

SELECT 
    hm.id, 
    m.desmisa AS misa, 
    CASE 
        WHEN hm.estado = 0 THEN 'libre'
        WHEN hm.estado = 1 THEN 'ocupado'
        ELSE '--'  
    END AS estado,
    DATE_FORMAT(hm.fecha, '%d/%m/%Y') AS fecha, 
    hm.hora 
FROM 
    horario_misa hm  
INNER JOIN 
    misa m ON m.codmisa = hm.misa;


";
$stmt = $xcon->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


$sql2="select * from misa order by desmisa asc";
$stmt2 = $xcon->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();

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
    <style>
  .modal {
    display: none; /* Ocultar el modal por defecto */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.form-group {
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="date"],
select {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>

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
                <h1>Horarios</h1>

                <div class="add-reservation">
                <a href="#" id="btn-agregar-reserva" class="add-btn"><i class="fas fa-plus"></i> Agregar Horario</a>

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
                        text: 'Ocurrio un error al realizar la inserción.'
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
                    <h2>Lista</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Servicio</th>
                              
                               
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th> Opciones </th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['misa'] . "</td>";
  
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['hora'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo '<td><a href="#" onclick="confirmDelete(' . $row['id'] . ')" class="delete-btn"><i class="fas fa-trash-alt"></i> Borrar</a></td>';
        echo "</tr>";
    }
    ?>
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




    <div id="modal-agregar-reserva" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Agregar Reserva</h2>
        <form id="form-agregar-reserva" method="post" action="horarios-guardar.php">
            <div class="form-group">
                <label for="tipo-servicio">Tipo de Servicio:</label>
                <select id="tipo-servicio" name="tipo-servicio">
                <?php
    while ($row2 = $result2->fetch_assoc()) { ?>
                    <option value="<?php echo $row2['codmisa']; ?>"><?php echo $row2['desmisa']; ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <select id="hora" name="hora">
                    <option value="">Seleccione</option>
                <?php
                for ($hour = 8; $hour <= 22; $hour++) {
                    $hourFormatted = str_pad($hour, 2, '0', STR_PAD_LEFT); // Formato de dos dígitos con cero a la izquierda si es necesario
                    echo '<option value="' . $hourFormatted . ':00">' . $hourFormatted . ':00</option>';
                }
                ?>
            </select>

            </div>
            <div class="form-group">
                <input type="submit" value="Agregar">
            </div>
        </form>
    </div>
</div>

   
</body>




</html>





<script>

function openModal() {
    console.log('Abriendo modal...');
    document.getElementById('modal-agregar-reserva').style.display = 'block';
}


function closeModal() {
    document.getElementById('modal-agregar-reserva').style.display = 'none';
}

document.querySelector('.modal-content .close').addEventListener('click', function() {
    document.getElementById('modal-agregar-reserva').style.display = 'none';
});


document.getElementById('btn-agregar-reserva').addEventListener('click', openModal);


document.querySelector('.close').addEventListener('click', closeModal);


document.getElementById('form-agregar-reserva').addEventListener('submit', function(e) {
        e.preventDefault();
        
     
        var fecha = document.getElementById('fecha').value;
        var hora = document.getElementById('hora').value;
        
        if (fecha.trim() === '' || hora.trim() === '') {
     
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, seleccione una fecha y una hora.'
        });
        return;
    }
        
       
        this.submit();
    });





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
                window.location.href = 'horarios-borrar.php?id=' + id;
            }
        });
    }



    

</script>