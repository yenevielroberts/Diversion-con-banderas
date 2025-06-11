<?php 
session_start();

    $_SESSION['numPreguntas']=1; //es el número de preguntas
    $_SESSION['numPartidas']+=1;//es el número de partidas
    $_SESSION['preg_acertadas']=0;//numero de respuestas correctas de la partida actual

    header('Location: juego.php');
?>