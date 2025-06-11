<?php
    session_start();
    include('includes/errorHandler.php');
    include('funciones.php');
    include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/baseDdatos.php');//me connecto a la base de datos

    $codiCcn3 = ['004', '008', '010', '012', '016', '020', '024', '028', '031', '032', '036', '040', '044', 
    '048', '050', '051', '052', '056', '060', '064', '068', '070', '072', '074', '076', '084', '086', '090', 
    '092', '096', '100', '104', '108', '112', '116', '120', '124', '132', '136', '140', '144', '148', '152', 
    '156', '158', '162', '166', '170', '174', '175', '178', '180', '184', '188', '191', '192', '196', '203', 
    '204', '208', '212', '214', '218', '222', '226', '231', '232', '233', '234', '238', '239', '242', '246', 
    '248', '250', '254', '258', '260', '262', '266', '268', '270', '275', '276', '288', '292', '296', '300', 
    '304', '308', '312', '316', '320', '324', '328', '332', '334', '336', '340', '344', '348', '352', '356', 
    '360', '364', '368', '372', '376', '380', '384', '388', '392', '398', '400', '404', '408', '410', '414', 
    '417', '418', '422', '426', '428', '430', '434', '438', '440', '442', '446', '450', '454', '458', '462', 
    '466', '470', '474', '478', '480', '484', '492', '496','498', '499', '500', '504', '508', '512', '516', 
    '520', '524', '528', '531', '533', '534', '535', '540', '548', '554', '558', '562', '566', '570', '574', 
    '578', '580', '581', '583', '584', '585', '586', '591', '598', '600', '604', '608'];

    $respuestas=url_Repo("all?fields=name");//obtengo todos los nombres de los paises
    $numPaises= count($respuestas);//obtengo la cantidad de países que hay en la API

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diversión con banderas</title>
</head>
<style>
    <?php include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/estilos/juegoEstilos.php');?>
</style>
<body>
    <?php include('includes/header.php');
    ?>
    

    <h1>Adivina el país</h1>
    <div id="container">
        <?php
    
            if($_SESSION['numPreguntas'] <11){
                
                $indice=array_rand($codiCcn3,1);
                $endPoint='alpha?codes='.$codiCcn3[$indice];
                $datos=url_Repo($endPoint);
                $array_repo=[];//guardo las respuestas
                
                if($datos){
                    $pais=$datos[0];//devuelve siempre un array aunque devuelva un solo país
                    $bandera= $pais['flags']['png'];
                    $respuestaCorrect=$pais['name']['common'];
                    
                    echo "<h2>Partida ". $_SESSION['numPartidas']."</h2>";
                    echo"<p>Preguntas acertadas: ".$_SESSION['preg_acertadas'] ." de 10 </p>";

                    //guardo las respuestas en el array
                    array_push($array_repo, $respuestaCorrect);//respuesta correcta
                    $respoRepetida=false;

                    for($i=0; $i<3; $i++){

                        do{
                            $indiceRespuestas= array_rand($respuestas,1); //obtengo un indice para el array que devuelve la API
                            $nomDelPais = $respuestas[$indiceRespuestas]['name']['common'];//obtengo un país
                            
                            if(!in_array($nomDelPais, $array_repo)){
                                array_push($array_repo,$nomDelPais);
                                $respoRepetida=false;
                            }else{
                                $respoRepetida=true;
                            }

                        }while($respoRepetida===true);
                            
                    }
                    
                    //formulario
                    echo"<form action='comprobarRespuesta.php' method='POST'>";
                    echo "<img src='$bandera' alt='bandera'/><br>";

                    $indice_repo_array=[];//guardo valor de indiceRepo para comprobar que no se repitan las respuestas y esten siempre en diferente orden
                    $indiceRepetido=false;
                    for($i=0; $i<4; $i++){

                      do{
                         $indiceRepo= array_rand($array_repo,1);//obtengo un número random dentro del rango del array arrayRepo
                         if(!in_array($indiceRepo, $indice_repo_array)){

                            $indiceRepetido=false;
                            array_push($indice_repo_array,$indiceRepo);
                            echo"<input type='submit' name='userRepo' value='".$array_repo[$indiceRepo]."' id='userRepo'>";
                        }else{
                            $indiceRepetido=true;
                        }
                      } while($indiceRepetido===true); 
                        
                    }
                    
                    echo "<input type='hidden' name='respuestaCorrect' value='".$pais['name']['common']."'>";
                    echo "</form>
                     </div>"; 
                }


            }else{

                echo"<div id='infoPartidaAct'>";
                echo "<p>Respuestas correctas de 10</p>";
                echo"<p><strong>".$_SESSION['preg_acertadas']."<strong></p>";
                echo "<a href='nuevaPartida.php' id='nueva_partida'>Jugar nueva partida</a>";

                if($_SESSION['user_nom'] != "no_user_regi"){
                    updateRanking($db);
                    echo "<a href='nuevaPartida.php' id='nueva_partida'>Jugar nueva partida</a>";
                    echo"<a href='ranking.php'>Ver ranking</a>";
                }
                echo"</div>";

                
               
        
            }
        ?>
</body>
</html>