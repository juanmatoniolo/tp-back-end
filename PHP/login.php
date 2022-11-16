<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    

</head>

<body>
    <?php

    //Vinculamos el loing con php 
    $usuario =  $_POST["usuario"];
    $pass  = $_POST["pass"];

    //Creamos las variables para validar usuario y contraseña 

    $ckusuario = "usuario";
    $ckpass = "pass";

    //Creamos un IF para validacion de datos: 
    if ($usuario == $ckusuario && $pass == $ckpass) {
    
        header("location:../index.html");
    } else { 
       header("location:../pestañas/logi.html") ;
  
    }
    

    ?>
   
</body>

</html>