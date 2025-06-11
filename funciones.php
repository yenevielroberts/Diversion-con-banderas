<?php
  include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');

  //función que duvuelve segun que datos dependiendo del endPoint que se le pase por parametro
  function url_Repo($endPoint){
  
    $url= 'https://restcountries.com/v3.1/'.$endPoint;
    
    try{
      $response = file_get_contents($url);

      if(!$response){
        throw new Exception("No se pudo acceder a la API: $url");
      }

      $datos=json_decode($response, true);

      return $datos;

     } catch (Exception $e) {
      // Puedes loguear el error o devolver algo vacío
      error_log($e->getMessage());
      return [];
  }
    
  }


  //hace el primer insert en la tabla partidas
  function insertsPartida($preg_acertadas, $user_id,$db){
    
    if($_SESSION['numPartidas']===1){
      $num_partida=1;
    }else{
      $select= $db->query("SELECT count(*) partidas from partidas where user_id=$user_id");
      $resultadoSelect= $select->fetchArray(SQLITE3_ASSOC);
      $num_partida=$resultadoSelect['partidas']+1;
    }
    
    $insert=$db->prepare("INSERT into partidas (par_preg_acertadas, par_partida, user_id) VALUES (:par_preg_acertadas,:par_partida,:user_id)");
    $insert->bindValue(":par_preg_acertadas",$preg_acertadas,SQLITE3_INTEGER);
    $insert->bindValue(":par_partida",$num_partida,SQLITE3_INTEGER);
    $insert->bindValue(":user_id",$user_id,SQLITE3_INTEGER);
    $insertResult = $insert->execute();

    if(!$insertResult){
        $_SESSION['error']="Error al hacer el insert";
        header('Location: /includes/pageError.php');
    }
  }

  //función que hace inserts en la tabla de ranking
  function insertsRanking($db, $total_partidas,$total_preg_acertadas,$user_id){

      $insert=$db->prepare("INSERT into ranking (total_partidas, total_preg_acertadas, user_id) VALUES (:total_partidas,:total_preg_acertadas,:user_id)");
      $insert->bindValue(":total_partidas",$total_partidas,SQLITE3_INTEGER);
      $insert->bindValue(":total_preg_acertadas",$total_preg_acertadas,SQLITE3_INTEGER);
      $insert->bindValue(":user_id",$user_id,SQLITE3_INTEGER);
      $insertResult = $insert->execute();

      if(!$insertResult){
          $_SESSION['error']="Error al hacer el insert";
          header('Location: /includes/pageError.php');
      }
    
  }

  function updateRanking($db){

    //obtengo el total de partidas y de preguntas acertadas
    $stmTotal=$db->prepare("SELECT count(*) total_partida, sum(par_preg_acertadas)total_preg_acertadas, u.user_id from partidas p join users u on u.user_id = p.user_id and u.user_nom=:user_nom group by u.user_id");
    $stmTotal->bindValue(":user_nom",$_SESSION['user_nom'],SQLITE3_TEXT);
    $total= $stmTotal->execute();

    if($total){

      $total_result=$total->fetchArray(SQLITE3_ASSOC);
      $insert=$db->prepare("UPDATE ranking set total_partidas=:total_partidas, total_preg_acertadas=:total_preg_acertadas where user_id=:user_id");
      $insert->bindValue(":total_partidas",$total_result['total_partida'],SQLITE3_INTEGER);
      $insert->bindValue(":total_preg_acertadas",$total_result['total_preg_acertadas'],SQLITE3_INTEGER);
      $insert->bindValue(":user_id",$total_result['user_id'],SQLITE3_INTEGER);
      $insertResult = $insert->execute();

      if(!$insertResult){
          $_SESSION['error']="Error al hacer el update";
          header('Location: /includes/pageError.php');
      }
    }else{
      $_SESSION['error']="Error al hacer el insert";
      header('Location: /includes/pageError.php');
    }

  }

//función que modifica los datos de la tabla partidas
  function updatesPartidas($par_preg_acertadas, $user_id,$db ){


    $insert=$db->prepare("UPDATE partidas set par_preg_acertadas= :par_preg_acertadas where user_id= :user_id");
    $insert->bindValue(":par_preg_acertadas",$par_preg_acertadas,SQLITE3_INTEGER);
    $insert->bindValue(":user_id",$user_id,SQLITE3_INTEGER);
    $insertResult = $insert->execute();

    if(!$insertResult){
        $_SESSION['error']="Error al hacer el update";
        header('Location: /includes/pageError.php');
    }
  }


  //modifica la info de un usuario en concreto
  function updatePartidasTable($user_nom, $db){

   // $user_nom=$_SESSION['user_nom'];
    $user_id=0;

    $stm = $db->prepare("SELECT * from users where user_nom=:user_nom");
    $stm->bindValue(":user_nom",$user_nom, SQLITE3_TEXT);
    $respuestaUser = $stm->execute();

    if($respuestaUser){
        $userDatos= $respuestaUser->fetchArray(SQLITE3_ASSOC);//obtengo el id del usuario
        $user_id= $userDatos['user_id'];
        
        $stm = $db->prepare("SELECT * from partidas where user_id=:user_id");
        $stm->bindValue(":user_id",$user_id, SQLITE3_TEXT);
        $respuestaEsta = $stm->execute();

        if($respuestaEsta){
    
        $estaDatos=$respuestaEsta->fetchArray(SQLITE3_ASSOC);
        
        $preg_acertadas=$_SESSION['preg_acertadas'] +1;
        insertsPartida($preg_acertadas, $user_id,$db);
        }

    }else{
        $_SESSION['error'] = "Error";
        header("Location: /includes/pageError.php");
    }
  }
  
?>  