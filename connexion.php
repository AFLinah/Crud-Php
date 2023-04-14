<?php 
  //Connexion a la base de donnees
  $con = new mysqli("localhost", "root", "", "Entreprise");
  if($con->connect_error){
    die("Vous n'etes pas connecté à la base de données".$con->connect_error);
  }
//   else{
//     echo "Connexion reussi !";
//   }
?>