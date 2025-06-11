<?php
session_start();
include('includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');//me connecto a la base de datos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <style>
        <?php 
        include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/estilos/rankingEstilos.php');
        include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');
        ?>
    </style>
</head>
<body>
    <?php include('includes/header.php')?>
    <div id='rankingInfo'>
    <h2>Ranking</h2>
<?php
    $raking= $db->query("SELECT user_nom, total_partidas, total_preg_acertadas from ranking r join users u on u.user_id = r.user_id order by total_preg_acertadas desc");
    $contador=0;
    while($fila = $raking->fetchArray(SQLITE3_ASSOC)){
        $contador+=1;
        echo"<ol><p>$contador. ".$fila['user_nom']."</p>
        <p>Número de preguntas acertadas ".$fila['total_preg_acertadas']."</p>
         <p>Número de partidas ".$fila['total_partidas']."</p></ol> "; 
          
    }

echo"</div>";

?>
</body>
</html>


