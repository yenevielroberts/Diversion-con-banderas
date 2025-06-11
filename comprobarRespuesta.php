<?php
/*arreglar el problema con el número de las preguntas */
    session_start();

    include('includes/errorHandler.php');
    include('includes/baseDdatos.php');//me connecto a la base de datos
    include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/funciones.php');

    $respuestaCorrect ="";
    $userRepo="";

    if(isset($_POST['respuestaCorrect']) && isset($_POST['userRepo'])){
      
      // $_SESSION['numPreguntas']=  $_SESSION['numPreguntas'] +  1;
        $respuestaCorrect = $_POST['respuestaCorrect'];
        $userRepo= $_POST['userRepo'];
        
        if($respuestaCorrect==$userRepo){
            $_SESSION['preg_acertadas']=$_SESSION['preg_acertadas'] + 1;
            $_SESSION['numPreguntas']=  $_SESSION['numPreguntas'] +  1;
            
        }else{

            $_SESSION['numPreguntas']=  $_SESSION['numPreguntas'] +  1;
        }

        if($_SESSION['user_nom'] != "no_user_regi"){

             if($_SESSION['numPreguntas']===10){

            $user_name=$_SESSION['user_nom'];
            updatePartidasTable($user_name,$db);
            }
        }
       
    }

header('Location: juego.php');

?>

