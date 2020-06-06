<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$bd = 'facturacion';

$conection = @mysqli_connect($host,$user,$password,$bd);

if (!$conection) {
    echo "Error en la conexion";
}
else {
    echo " Conexion Exitosaaaaaa";
}




?>