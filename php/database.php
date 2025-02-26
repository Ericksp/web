<?php
// esto es un comentario
//creamos una variable para el servidor
$host='localhost';
//creamos una variable para el nombre de la base de datos
$dbname= 'iglesia';
//creamos una variable para el usuario de la bd
$username='root';
//creamos una variable para la clave de la bd
$password= 'root';
//creamos una variable para la conexion
$xcon=new mysqli($host,$username,$password,$dbname);
if(!$xcon){
    die('Error de conexion: '. mysqli_connect_error());
}
//establecer el conjunto de caracteres utf8
$xcon->set_charset('utf8mb4');
?>