<?php
session_start();
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');//me connecto a la base de datos
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/funciones.php');


 if(isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['user_password2']) ){
    echo "w";
    
    if(($_POST['user_password']) == ($_POST['user_password2'])){

        $user_name=$_POST['user_name'];
        $user_password= md5(trim($_POST['user_password']));
        $user_type= $_POST['user_type'];

        //compruebo si ya existe el usuario
        $stm= $db->prepare("SELECT * from users where user_nom =:user_name");
        $stm->bindValue(":user_name", $user_name, SQLITE3_TEXT);
        $resultado= $stm->execute();

        $user =$resultado ->fetchArray(SQLITE3_ASSOC);
        if($user){
            $_SESSION['error']="Usuario existente";
            header('Location: /includes/pageError.php');
        }else{

            $insert= $db->prepare("INSERT into users (user_nom, user_password, user_type) VALUES (:user_name, :user_password, :user_type)");
            $insert->bindValue(":user_name",$user_name,SQLITE3_TEXT);
            $insert->bindValue(":user_password",$user_password,SQLITE3_TEXT);
            $insert->bindValue(":user_type",$user_type,SQLITE3_TEXT);
            $insertResult=$insert->execute();

            if($insertResult){
                //agrego el id de usuario en la tabla partidas
                $stmUser = $db->prepare("SELECT user_id from users where user_nom=:user_nom");
                $stmUser->bindValue(":user_nom",$user_name,SQLITE3_TEXT);
                $resultadoUserId= $stmUser->execute();

                if($resultadoUserId){
                    $resultadoId= $resultadoUserId->fetchArray(SQLITE3_ASSOC);
                    //insertsPartida(0, $resultadoId['user_id'],$db,0);
                    insertsRanking($db, 0,0,$resultadoId['user_id']);
                }
                
               $_SESSION['user_nom']=$user_name;
               $_SESSION['user_type']=$user_type;
                header('Location: /juego.php');
                
            }else{
                $_SESSION['error']="Error al hacer el insert";
                header('Location: /includes/pageError.php');
            }

        }
    }else{
        $_SESSION['error']= "Error. La contraseña no coincide";
        header('Location: /includes/pageError.php');
       
    }
 }

 $db->close();
?>