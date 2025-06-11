<?php
    $db = new SQLite3('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/flags.db');

    if(!$db){
        die("Error al conectarse con la base datos ");
        $_SESSION['error']="Error al conectarse con la base datos";
        header('Location: pageError.php');
    }

?>