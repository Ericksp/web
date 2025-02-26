<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link rel="icon" href="../img/cropped-icono-agustinos-32x32.png" sizes="32x32" type="image/ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="main">
        <div class="signup">

        <?php 
                
               if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El usuario o clave es incorrecto.'
                    });</script>";
                }
                
                
              

                ?>
        <a href="../html/indexservicio.html"><button>Ir a Web</button></a>
        <form action="login.php" method="post">
                <label for="chk" aria-hidden="true">Ingresar</label>
                <input type="text" name="txtusuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button>Ingresar</button>
        </div>
       
        
        
    </div>
</body>
</html>