<?php
session_start();
  $_SESSION['user_nom']="no_user_regi";
  $_SESSION['user_type']="common_user";
  $_SESSION['numPreguntas']=1;//es el número de preguntas
  $_SESSION['numPartidas']=1;//es el número de partidas
  $_SESSION['preg_acertadas']=0;//numero de respuestas correctas de la partida actual
include('includes/errorHandler.php');
include('funciones.php');

$datos=url_Repo("all");//obtengo todos los paises

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

$diaDelAño = date("z"); // 0 a 365

$numPaises= count($datos);

$indice = $diaDelAño % $numPaises; //obtengo un indice dentro del rango del array con todos los países

$aleatoriCcn3 = $codiCcn3[$indice];
//echo "$aleatoriCcn3";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <title>Diversión con banderas</title>
    <style>
    <?php 
    include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/estilos/indexEstilo.php');
    include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
  </style>
    
</head>
<body>
    <?php include('includes/header.php')?>
    <h1>Diversión con banderas</h1>
  <?php

  $endPoint='alpha?codes='.$aleatoriCcn3;
   $pais= url_Repo($endPoint);

    if($pais){
        $paisInfo = $pais[0];
        $name= $paisInfo['name']['common'];

        echo"<h2>País del día:</h2>
        <p><strong>País</strong> ".$name."</p>";

        $capital=$paisInfo['capital'];
        echo"<p><strong>Capital:</strong> ".$capital[0]."</p>";  

        $bandera = $paisInfo['flags'];
        echo "<img src='".$bandera['png']."' alt='Bandera de".$name."'><br>";

        $mapa=$paisInfo['maps']['googleMaps'];
        echo "<a href='$mapa' _target='_blank'> Mapa</a>";
       
    } 
  ?>

    <a href='juego.php' id='home'>Iniciar Juego</a>
</body>
</html>

