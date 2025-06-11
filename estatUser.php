<?php
session_start();
include('includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');

$user_nom= $_SESSION['user_nom'];

$usuario= $db->prepare("SELECT * from partidas e join users u on u.user_id = e.user_id and u.user_nom=:user_nom ");
$usuario->bindValue(":user_nom",$user_nom,SQLITE3_TEXT);
$datos=$usuario->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/estilos/estatUserEstilos.php');
        include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
        ?>
    </style>
</head>
<body>
<?php
  include('includes/header.php');
  echo"<h1>Estadistica de usuario</h1>";

    if($datos){
        echo"<a href='ranking.php'>Ver ranking</a>";
        $contador=0;
        while($resultado=$datos->fetchArray(SQLITE3_ASSOC)){
            echo"<div id='infoPartidas'>";

            if(!$resultado['par_partida']){
                echo "<p>No hay información que mostrar aún. </p>";
                break;
            }
            echo "<p>Partida número: </p><br>";
            echo"<p><strong>".$resultado['par_partida']."<strong></p>";

            echo "<p>Respuestas correctas: </p>";
            echo"<p><strong>".$resultado['par_preg_acertadas']."<strong></p>";
           
            echo"</div>";
        }
        
        
    }else{

        $_SESSION['error']="Error al acceder a los datos";
        header('Location: /includes/pageError.php');
    }

?>   
</body>
</html>

<?php
    $db->close();
?>

