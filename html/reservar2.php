<?php


include('../php/database.php');
$sql = "SELECT * from catequesis order by nomcat asc ";
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
    <title>Parroquia Santo Toribio - Chosica </title>
    <link rel="stylesheet" href="../css/stylenosotros.css">
    <link rel="stylesheet" href="../css/styleservicios.css">
    <link rel="stylesheet" href="../css/stylecontacto.css">
    <link rel="stylesheet" href="../css/calendar.css">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <script src="https://kit.fontawesome.com/92d9c1ec7c.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../img/cropped-icono-agustinos-32x32.png" sizes="32x32" type="image/ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="../js/siguiente_reservar2.js"></script>
    <script src="../js/atras.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Incluir el idioma español -->

   
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a class="logo"><img src="../img/logos2.png" alt=""></a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="/Web Barberia/img/menu.png" class="menu-icon" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="../html/indexservicio.html">Servicios</a></li>
                    <li><a href="">Contacto</a></li>
                    <li><a href="/Web Barberia/PHP/indexcuenta.php">Mi Cuenta</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <p></p>
            <h1><img src="../img/LOGOCHOSICA.png" alt=""></h1>
    </div>
    </header>
    <form  action="reservado.php" method="post"  id="form" name="form">
    <div class="general">
        <div class="text">
            <section class="form-register" id="servicioForm">
            
                <h2>Registre sus datos : </h2>
                <p>Llene el formulario para poder adquirir el servicio:</p>
                    <label for="nombre">Nombre(s):</label><br>
                    <input class="txtbox" type="text" id="nombre" name="nombre" required placeholder="Esriba su(s) nombres(s)" ><br>
                    
                    <label for="nombre">Apellidos</label><br>
                    <input class="txtbox" type="text" id="apellidos" name="apellidos" required placeholder="Esriba su(s) apellido(s)"><br>

                    <label for="email">Correo electrónico:</label><br>
                    <input class="txtbox" type="email" id="email" name="email"  required placeholder="Esriba su correo electrónico"><br>

                    <label for="email"> Número de Celular:</label><br>
                    <input class="txtbox" type="text" id="cel" name="cel" required placeholder="Esriba su número celular"><br>
                
                  
                   
                    <button type="button" onclick="siguiente()" class="btn-1">Siguiente</button>
               

            </section>
            <section class="form-register" id="segundoPaso" style="display: none;">
             
                    <h2>Registre sus datos : </h2>
                <p>Llene el formulario para poder adquirir el servicio:</p>
                <label for="nombre2">¿ Que Tipo de catequesis desea ? :</label><br>
                    <label  for="opciones">Selecciona una opción:</label>
                    <select class="txtbox" id="opciones" name="opciones">
                    <option value="">Seleccione</option>

                    <?php
                            while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codcat']; ?>" data-precio="<?php echo $row['precat']; ?>"><?php echo $row['nomcat'] .' -  S./'.  $row['precat'] ; ?></option>

                        <?php } ?>
                        
            </section>
                    </select> <br>
                   
                    <input type="hidden" id="precio" name="precio" value="">
                    <input type="hidden" name="tipo" value="2">
                <button type="button" onclick="atras()" class="btn-1">Atras</button>
                <button type="submit" class="btn-1" id="btnPagar" >Pagar</button>
        </div>
    </div>
     </form>

    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a>
                        <img src="../img/logos2.png" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos una comunidad que busca tener una sola alma y un solo corazón hacia Dios (San Agustín, Regla 3).</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/Agustinosperu/" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/agustinosperu/" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://www.youtube.com/channel/UC5NzbsiOL805u9Dx7TlUnjQ" target="_blank" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2024 <b>Parroquia Santo Toribio - Chosica</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>

</body>
</html>


<script>


$(document).ready(function () {
        $("#opciones").change(function () {
            var precio = $(this).find(":selected").data("precio");
            $("#precio").val(precio);
          
           
           
        });


        $("#btnPagar").click(function(e) {
        e.preventDefault(); // Prevenir el envío del formulario por defecto

        // Obtener el valor seleccionado en el select 'opciones'
        var opciones = $("#opciones").val();

        console.log(opciones);

        // Verificar que se haya seleccionado una opción en el select 'opciones'
        if (opciones === '') {
            // Mostrar una alerta con SweetAlert si no se ha seleccionado ninguna opción en el select
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione una opción".',
            });
            return; // Detener la ejecución de la función si no se ha seleccionado ninguna opción
        }

        // Si se ha seleccionado una opción en el select, continuar con el envío del formulario
       
        $("#form").submit(); // Envío del formulario
    });
    });



</script>

