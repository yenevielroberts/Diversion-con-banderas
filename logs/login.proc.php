<?php
 session_start();

 include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/errorHandler.php');
 include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');//me connecto a la base de datos

 $user_nom="";
 $user_password="";

 if(empty($_POST['user_nom']) || empty($_POST['user_password'])){
    echo "Falta datos de usuario";
 }else{
    $user_nom=$_POST['user_nom'];
    $user_password= md5(trim($_POST['user_password']));
 }

 $stm= $db->prepare("SELECT * from users where user_nom= :user_nom and user_password = :user_password");

 //verifico si la consulta se preparó correctamente
 if(!$stm){
      echo "Error al preparar la consulta.";
      $_SESSION['error']="Error al preparar la consulta.";
      header('Location: /includes/pageError.php');
      
  
 }

 $stm ->bindValue(":user_nom", $user_nom, SQLITE3_TEXT);
 $stm ->bindValue(":user_password", $user_password, SQLITE3_TEXT);
 $resultado= $stm->execute();

 if (!$resultado){
      //echo "Error al ejecutar la consulta";
      $_SESSION['error']="Error al ejecutar la consulta";
      header('Location: /includes/pageError.php');

 }else{

    $datos= $resultado ->fetchArray(SQLITE3_ASSOC);

    if($datos){
         $_SESSION['user_nom']= $user_nom;
         $_SESSION['user_type']=$datos['user_type'];
        //echo"session iniciada";
        header('Location: /juego.php');
    }else{
         $_SESSION['error']="Nombre de usuario y/o contraseña incorrectos";
         header('Location: /includes/pageError.php');
         echo "Nombre de usuario y/o contraseña incorrectos";
        
    }
 }

 $db->close();
?>