<?php

    $alert = "";
    session_start();
    if (!empty($_SESSION['active'])){
        header("location: sistema/");
    }
    else {
        if (!empty($_POST)) {
            if (empty($_POST['usuario'])|| empty($_POST['clave'])) {
                $alert = "Ingrese sus datos por favor";
            } else {
                include "conexion.php";

                $user = $_POST['usuario'];
                $pass = $_POST['clave'];

                $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$user' and clave = '$pass' ");

                $result = mysqli_num_rows($query);

                if ($result >0)
                {
                    $data = mysqli_fetch_array($query);
                   
                    $_SESSION['active'] =true;
                    $_SESSION['idUser'] = $data['idusuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['user'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];

                    header("location: sistema/");
                } else {
                    $alert = "El Usuario o la Clave son Incorrectos";
                    session_destroy(); 
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section id="container">

        <form action="" method="POST">

            <h3>Inicio de Seción</h3>
            <img src="img/login.png" alt="login">

            <input type="text" name="usuario" id="" placeholder="Usuario">
        
            <input type="password" name="clave" id="clave" placeholder="Contraseña">
            <div class="alert">
                <?php echo isset($alert) ? $alert :'' ; ?> 
            
            </div>

            <input type="submit" value="INGRESAR">
        
        
        </form>


    </section>
    
</body>
</html>