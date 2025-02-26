<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parroquia Santo Toribio - Chosica </title>
    <link rel="stylesheet" href="../css/styleservicios.css">
    <link rel="stylesheet" href="../css/stylecontacto.css">
    
  
    <script src="https://kit.fontawesome.com/92d9c1ec7c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="../img/cropped-icono-agustinos-32x32.png" sizes="32x32" type="image/ico">
</head>
<body>

<script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('success');
            if (successParam === '1') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Formulario enviado!',
                    text: 'Tu formulario ha sido enviado correctamente.',
                    confirmButtonText: 'Aceptar'
                });
            }
        };
    </script>

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
                <li><a href="../php/indexcuenta.php">Intranet</a></li>
            </ul>
        </nav>
    </div>
    <div class="header-content container">
            <p></p>
            <h1><img src="../img/LOGOCHOSICA.png" alt=""></h1>
            <br>
            <br>
    </div>

</header>
    <section class="services">
        <h2>Nuestros servicios</h2>
        <div class="services-container">
          
          <div class="service">
            <img src="../img/misa.jpg" alt="Misas">
            <h3>Misas</h3>
            <p>Módulo de Misas y Velatorios</p>
            <a href="../html/modmisa.php" class="btn-1">Más información</a>
          </div>

          <div class="service2">
            <img src="../img/pastoral.jpeg" alt="Misas">
            <h3>Pastoral</h3>
            <p>Módulo Pastoral Parroquial</p>
            <a href="../html/modpastoral.html" class="btn-1">Más información</a>
          </div>


          <div class="service">
            <img src="../img/catequesis.jpg" alt="Misas">
            <h3>Catequesis</h3>
            <p>Módulo de Catequesis</p>
            <a href="../html/modcatequesis.html" class="btn-1">Más información</a>
          </div>


          <div class="service">
            <img src="../img/misa.jpg" alt="Misas">
            <h3>Documentos</h3>
            <p>Módulo Emisión de Documentos Eclesiástico</p>
            <a href="../html/moddoc.html" class="btn-1">Más información</a>
          </div>

        </div>

<div class="general">
    <br>
    <div class="text-2">
      <a class="logo"><img src="../img/logo.png" alt=""></a>
      <br>
        <h3><a href="#"><i class="fa fa-phone">
        </i></a>(511)3600064</h3>
        <br>
        <br>
        <h3><a href="#"><i class="fa fa-whatsapp">
        </i></a>975265793</h3>
        <br>
        <br>
        <h3><a href="#"><i class="fa fa-envelope">
        </i> </a>parroquiasantotoribio@gmail.com</h3>
        <br>
        <br>
        <h3><a href="#"><i class="fa fa-map-marked">
        </i></a>Jr. Trujillo Sur nº 550, Lurigancho Chosica 
        <br> Lima -Perú</h3>
        <br>
        <br>
        <br>
          <h2>Horario de Atención </h2>
        <h3>Lunes a Viernes:</h3>
          <i class="fa fa-clock"></i> 10:00 am - 13:00 pm <br> 
          <i class="fa fa-clock"></i> 14:00 am - 19:00 pm <br> s
            <br>
            <h3>Sábados: </h3>
        <i class="fa fa-clock"></i> 10:00 am - 13:00 pm
        <br>
    </div>
    
    <br>

    <div class="text">
        <section class="form-register">
          
            <h2>Escribenos : </h2>
            <br>
            <h3>Apellido y Nombre :</h3> <br>
            <form method="post" action="guardar-form.php">
            <input class="txtbox" type="text" name="nombres" id="nombres" placeholder="Ingrese sus nombres" required> <br>
            <h3>Celular : </h3><br>
            <input class="txtbox" type="text" name="celular" id="nombres" placeholder="Ingrese su número de contacto" required><br>
            <h3>Correo electrónico :  </h3><br>
            <input class="txtbox" type="text" name="correo" id="correo" placeholder="Ingrese su correo electrónico" required><br>
            <h3>Mensaje: </h3><br>
            <input class="lrgbox" type="text" name="descripcion" id="descripcion" placeholder="Escriba su mensaje o reclamo" required><br>
            <br>
            <input class="btnreg" type="submit" name="regbtn" id="regbtn" value="Enviar">  <br> 
          </form>
        </section>
        
    </div>
</div>



<div id="mapa">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1951.771660729588!2d-76.69771900000002!3d-11.936837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ef7d4061af4f%3A0xee04c19c5b08465e!2sJr.%20Trujillo%20Sur%20590%2C%20Lurigancho-Chosica%2015468%2C%20Per%C3%BA!5e0!3m2!1ses-419!2sus!4v1710009925515!5m2!1ses-419!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
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
          <p>Evangelizamos testimoniando la vida de interioridad y el don de la fraternidad y lo vivimos en nuestras diversas obras apostólicas</p>
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