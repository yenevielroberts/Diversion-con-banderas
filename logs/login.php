<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<style>
<?php 
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/estilos/loginEstilos.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
</style>
<body>
<header>
    <nav>
        <ul>
            <li><a href='/index.php' id='home_page'>Home</a></li>
        </ul>
    </nav>
</header>
    <div>
        <form action="login.proc.php" method="POST">

        <label for="user_nom"> Nombre de Usuario</label>
        <input type="text" name="user_nom" id="user_nom" required>

        <label for="user_password"> Contraseña</label>
        <input type="password" name="user_password" id="user_password" required>
        <input type="submit" name="submit_btn" value="Log in">
        <p>¿No tienes una cuenta?<a href="signup.php">Registrate</a></p>
        </form>

    </div>
</body>
</html>