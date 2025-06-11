<?php
session_start();

include('includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');

if(!empty($_POST['user_id'])){

    $user_id= $_POST['user_id'];
}

if(isset($_POST['btnEliminar'])){

   

    $delete=$db->exec("DELETE from ranking where user_id=$user_id");
    //$deleteReult=$delete->execute();

    if($delete){
        Echo "Borrado con exito";
    }else{

        $_SESSION['error']="Error al hacer el DELETE";
        header('Location: pageError.php');
    }

    header('Location: gestionarRanking.php');

}else if(isset($_POST['partidasCero'])){
    $update=$db->exec("UPDATE ranking set total_partidas=0, total_preg_acertadas=0  where user_id=$user_id");
    $deletePartidas=$db->exec("DELETE from partidas where user_id=$user_id");
    //$updateResult= $update->execute();

    if($update && $deletePartidas){
        Echo "Actualizado con exito";
    }else{

        $_SESSION['error']="Error al hacer el UPDATE";
        header('Location: pageError.php');
    }

    header('Location: gestionarRanking.php');

}else if(isset($_POST['acertadasCero'])){
    $update=$db->exec("UPDATE ranking set total_preg_acertadas=0 where user_id=$user_id");
    $updatePartidas=$db->exec("UPDATE partidas set par_preg_acertadas=0 where user_id=$user_id");
    //$updateResult= $update->execute();

    if($update && $updatePartidas){
        Echo "Actualizado con exito";
    }else{

        $_SESSION['error']="Error al hacer el UPDATE";
        header('Location: pageError.php');
    }
    header('Location: gestionarRanking.php');
}

?>