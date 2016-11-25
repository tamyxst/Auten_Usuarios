<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Se muestra el error si la contraseña no es correcta
        if ($_GET['error'] == 'si') {
            echo "Error!";
        }
        ?>
        <h3>>Programa de autenticación de usuarios (Session y Cookies).</h3>
        <p>Para acceder a la página principal el usuario debe tener el mismo
        nombre y contraseña (iguales). <br />
        Sólo se permiten 3 intentos. Al tercero el usuario será bloqueado.<br />
        Para desbloquear los usuarios se podrá acceder con admin admin.</p>
        
        <form action="comprueba.php" method="POST" enctype="multipart/form-data">
            Nombre <input type="text" name="nombre" value=""/><br/>
            Password <input type="text" name="pass" value=""/><br />
            <input type="submit" name="enviar" value="enviar"/>
        </form>
    </body>
</html>
