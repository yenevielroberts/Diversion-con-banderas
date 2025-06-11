<?php
session_start();
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/errorHandler.php');
if($_SESSION){

    echo "<img src='/imgError.png' alt='imagen de error'><br>";
    echo"".$_SESSION['error']."<br>";

    if($_SESSION['error']=="Error. La contraseña no coincide"){
        echo "<a href='/logs/signup.php'> Sign up</a>";
    }else{
        echo "<a href='/logs/login.php'> Log in</a>";
    }
    
    
}

?>