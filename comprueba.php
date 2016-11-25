<?php

//Recogemos los datos
$nombre = filter_input(INPUT_POST, 'nombre');
$pass = filter_input(INPUT_POST, 'pass');


session_start();
if (!isset($_SESSION['visitas']))
    $_SESSION['visitas'] = 0;

    //Para evitar que si los datos son correctos no entre en la pagina wellcome.
    if (isset($_COOKIE[$nombre])&&($_COOKIE[$nombre] === "bloqueado")){
        //En este caso el usuario esta bloqueado.    
        header('Location: error.php?error=bloqueado');
}
else {
    if ($nombre == $pass) {
        //Si los datos son correctos el usuario va a la página principal.
        header("Location: principal.php?nombre=$nombre");
    } else {
        //Solo se permiten 3 intentos        
        if ($_SESSION['aciertos'] != 2) {
            header('Location: index.php?error=si');
            $_SESSION['aciertos'] ++;
        } else {
            header('Location: error.php');
            //Se almacena una cookie del usuario bloqueado. 1 día.
            setcookie($nombre, "bloqueado", time() + 3600 * 24); 
        }
    }
}
?>