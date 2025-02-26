
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
                <img src="../img/logos2.png" alt="">
                    <h2>THE BLADE ROOM</h2>
                </div>
                
                <div class="close" id="close-btn">
                    <span class="material-icons">close</span>

                </div>
            </div>

            <div class="tabs">
                <div class="sidebar">
                    <a href="#">
                        <button class="tab-button" onclick="tabsetup(event, '1')" id="DefaultOpen"><span class="material-icons">dashboard</span>
                            <h3>Dashboard</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button" onclick="tabsetup(event, '2')" id="TabUsuario"><span class="material-icons">account_circle</span>
                            <h3>Usuario</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button" onclick="tabsetup(event, '3')" id="TabProductos"><span class="material-icons">add</span>
                            <h3>Agregar producto</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button" onclick="tabsetup(event, '4')" id="TabReclamos"><span class="material-icons">transcribe</span>
                            <h3>Ver reclamos</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button" onclick="tabsetup(event, '5')" id="TabListausuarios"><span class="material-icons">groups</span>
                            <h3>Ver usuarios</h3></button>
                    </a>
                    <a href="#">
                        <button class="tab-button"><span class="material-icons">logout</span>
                            <h3>Cerrar sesión</h3></button>
                    </href=>
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
                <!----------GRAFICA DE VENTAS DIARIAS------------>
                <div class="sales">
                    <span class="material-icons">analytics</span>
                    <div class="middle">
                         <div class="left">
                            <h3>Ventas totales</h3>
                            <h1>S/.256</h1>
                         </div>
                         <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                         </div>
                    </div>
                    <small class="text-muted">Último día</small>
                </div>
                
                <!----------GRAFICA DE GASTOS DIARIOS------------>
                <div class="expenses">
                    <span class="material-icons">stacked_line_chart</span>
                    <div class="middle">
                         <div class="left">
                            <h3>Ventas totales</h3>
                            <h1>S/.256</h1>
                         </div>
                         <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                         </div>
                    </div>
                    <small class="text-muted">Último día</small>
                </div>

                <!----------GRAFICA DE GANANCIA DIARIA------------>
                <div class="income">
                    <span class="material-icons">paid</span>
                    <div class="middle">
                         <div class="left">
                            <h3>Ventas totales</h3>
                            <h1>S/.256</h1>
                         </div>
                         <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                         </div>
                    </div>
                    <small class="text-muted">Último día</small>
                </div>
            </div>
                <!--tabla de pedidos-->
                <div class="recent-orders">
                    <h2>Pedidos recientes</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Número</th>
                                <th>Costo</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a href="#">Mostrar todo</a>
                </div>
            </div>

            <div id="2" class="tabs-content">
                <h1>Usuario</h1>
                <section class="user-tab">
                    <form action="actualizarAdmin.php" method="post">
                        <h2>Tipo de usuario: Administrador </h2>
                        <p>Nombres: </p>
                        <input class="text-box" type="text" name="nombresAdmin" id="nombresAdmin" value="<?php echo $_SESSION['txtusuario'];?>"> 
                        <p>Correo electrónico: </p>
                        <input class="text-box" type="email" name="correoAdmin" id="correoAdmin" value="<?php echo $_SESSION['email'];?>"> 
                        <p>Teléfono: </p>
                        <input class="text-box" type="text" name="telefonoAdmin" id="telefonoAdmin" value="<?php echo $_SESSION['telefono'];?>"> 
                        <p>Contraseña: </p>
                        <input class="text-box" type="password" name="contrasenaAdmin" id="contrasenaAdmin"> 
                        <br>
                        <input class="button" type="submit" value="Guardar cambios" name="guardar">
                    </form>
                    
                </section>
            </div>
            <div id="3" class="tabs-content">
                <h1>Agregar Producto</h1>
                <section class="product-tab">
                    <p>Nombres del producto: </p>
                    <form action="registroproductos.php" method="post">
                        <input class="text-box" type="text" name="txtnombre">
                        <p>Precio: </p>
                        <input class="text-box" type="text" name="txtprecio">
                        <p>Descripcion: </p>
                        <input class="text-box" type="text" name="txtdescripcion">
                        <br>
                        <p>Imagen: </p>
                        <input class="text-box" type="text" name="txtimagen">
                        <br>
                        <input class="button" type="submit" value="Agregar producto" name="guardar">
                    </form>
                </section>
            </div>
            <div id="4" class="tabs-content">
                <section>
                    <div class="claims">
                        <h2>Lista de quejas y reclamos</h2>
                        
                        <table>  
                            <thead>
                            
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Queja</th>
                                    <th>Descripción</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php
                                    require 'Connection.php'; 
                                    
                                    $sql = "SELECT * FROM quejas";
                                    $result = mysqli_query($conn,$sql);

                                    while($mostrar=mysqli_fetch_array($result)){
                                    ?>  
                                    
                                
                                <tr>
                                    <td><?php echo $mostrar['id']?></td>
                                    <td><?php echo $mostrar['nombres']?></td>
                                    <td><?php echo $mostrar['dni']?></td>
                                    <td><?php echo $mostrar['numero']?></td>
                                    <td><?php echo $mostrar['queja']?></td>
                                    <td><?php echo $mostrar['descripcion']?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div id="5" class="tabs-content">
                <section>
                    <div class="claims">
                        <h2>Lista de clientes registrados</h2>
                        
                        <table>  
                            <thead>
                            
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>E-mail</th>
                                    <th>Contraseña</th>
                                    <th>Número telefónico</th>
                                    <th>Tipo</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php
                                    require 'Connection.php'; 
                                    
                                    $sql = "SELECT * FROM usuarios";
                                    $result = mysqli_query($conn,$sql);

                                    while($mostrar=mysqli_fetch_array($result)){
                                    ?>  
                                    
                                
                                <tr>
                                    <td><?php echo $mostrar['id']?></td>
                                    <td><?php echo $mostrar['usuario']?></td>
                                    <td><?php echo $mostrar['email']?></td>
                                    <td><?php echo $mostrar['contrasena']?></td>
                                    <td><?php echo $mostrar['numero']?></td>
                                    <td><?php echo $mostrar['tipo']?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
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
                        <img src="/Web Barberia/img/IconoAdmin.png">
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Actualizaciones recientes</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/Web Barberia/img/IconoAdmin.png">
                        </div>
                        <div class="message">
                            <p><b>Giusseppee</b> ha ordenado un corte de cabello.</p>
                            <small class="text-muted">Hace 2 minuto(s)</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/Web Barberia/img/IconoAdmin.png">
                        </div>
                        <div class="message">
                            <p><b>Piero</b> ha ordenado un tratamiento facial.</p>
                            <small class="text-muted">Hace 18 minuto(s)</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/Web Barberia/img/IconoAdmin.png">
                        </div>
                        <div class="message">
                            <p><b>Richard</b> ha ordenado un arreglo de barba.</p>
                            <small class="text-muted">Hace 49 minuto(s)</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sales-analytics">
                <h2>Estadísticas</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>PEDIDOS ONLINE</h3>
                            <small class="text-muted">Último día</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>3849</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons">local_mall</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>PEDIDOS PRESENCIALES</h3>
                            <small class="text-muted">Último día</small>
                        </div>
                        <h5 class="success">-17%</h5>
                        <h3>1100</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>CLIENTES NUEVOS</h3>
                            <small class="text-muted">Último día</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>85</h3>
                    </div>
                </div>
                <div class="item add-product">
                    <div>
                        <span class="material-icons">add</span>
                        <h3>Agregar producto</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Web Barberia/JavaScript/pedidos.js"></script>
    <script src="/Web Barberia/JavaScript/dashboard.js"></script>
    <script src="/Web Barberia/JavaScript/tabs.js"></script>
</body>
</html>