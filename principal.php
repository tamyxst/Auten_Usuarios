<?php
//Recogemos los datos
$nombre = filter_input(INPUT_POST, 'nombre');
if (isset($_POST['enviar'])) {
    //Eliminamos el bloqueo del usuario.
    setcookie("nombre", time(), time() + 3600);
}
?>
<html>
    <head></head>
    <body style="background-color:paleturquoise">Bienvenidos a la página principal <br /><?php $_GET['nombre']; ?></body>

    <form action="principal.php" method="POST">    
    <?php
    $nombre = $_GET['nombre'];
    if(isset($_COOKIE[$nombre])){
        //Se muestra el ultimo acceso.
        echo "<h5>Tu ultimo acceso fue ".date("d-m-y", $_COOKIE[$nombre])."</h5>";
    }else{
        //Si el usuario accede por primera vez se crea la cookie.
        echo "<h5>Es este tu primer acceso</h5>";
        setcookie($nombre, time(), time() + 3600);
    }
    
    //Si el usuario es admin se muestra la lista para desbloquear usuarios. 
    if ($_GET['nombre'] == "admin") {
        foreach ($_COOKIE as $nombre=>$valor) {
            if($valor=="bloqueado"){
                echo "<input type=checkbox name=name[] value='$nombre'/>$nombre<br />\n";
            }  
        }
        echo "<br />";
        echo "<input type=submit name=enviar value=enviar />";
    }
    ?>
</form>
</html>
