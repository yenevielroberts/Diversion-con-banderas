<?php

include('includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');//me connecto a la base de datos

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            /* Estilos base */
    body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    text-align: center;
    }

    /* Contenedor de ranking */
    #rankingInfo {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: left;
    }

    /* Título */
    #rankingInfo h2 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
    }

    /* Cada jugador */
    #rankingInfo p {
    font-size: 1rem;
    margin: 0.3rem 0;
    color: #34495e;
    }

    /* Estilo de los botones de acción */
    input[type="submit"] {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 0.7rem 1.5rem;
    margin: 0.5rem 0;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    width: 100%;
    max-width: 200px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }

    input[type="submit"]:hover {
    background-color: #c0392b;
    }

    /* Botones de acción para resetear o eliminar */
    input[name="partidasCero"] {
    background-color: #f39c12;
    }

    input[name="partidasCero"]:hover {
    background-color: #e67e22;
    }

    input[name="acertadasCero"] {
    background-color: #3498db;
    }

    input[name="acertadasCero"]:hover {
    background-color: #2980b9;
    }

   <?php include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
</style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href='/logs/signup.php'>Nuevo usuario</a></li>
            <li><a href='juego.php'>Home</a></li>
        </ul>
    </nav>
</header>
<?php

    echo"<div id='rankingInfo'>";
    echo "<h2>Ranking</h2>";

    echo "<form action='gestionarRanking.proc.php' method='POST'>";
    $raking= $db->query("SELECT user_nom, total_partidas, total_preg_acertadas,u.user_id from ranking r join users u on u.user_id = r.user_id order by total_preg_acertadas desc");

        
        while($fila = $raking->fetchArray(SQLITE3_ASSOC)){

            echo"<p>Nombre: ".$fila['user_nom']."</p>
            <p>Número de preguntas acertadas ".$fila['total_preg_acertadas']."</p>
            <p>Número de partidas ".$fila['total_partidas']."</p>
            <input type='submit' name='btnEliminar' value='Eliminar'>
            <input type='submit' name='partidasCero' value='Restablecer Partidas'>
            <input type='submit' name='acertadasCero' value='Restablercer preguntas acertadas'>
            <input type='hidden' name='user_id' value='".$fila['user_id']."'>"; 
            
            
        }
    echo "</form>";
    echo"</div>";

?>
    
</body>
</html>
<?php

$db->close();

?>