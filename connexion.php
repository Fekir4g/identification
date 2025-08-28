<?php
  $hote = "localhost";
  $user = "root";
  $pass = "";
  $base = "identification";
  
  $cle = new mysqli($hote,$user,$pass,$base);
  $cle->set_charset("utf8");

  if ($cle->connect_error) {
      die(" Erreur de Connexion : ".$cle->connect_error);
  } 
?>