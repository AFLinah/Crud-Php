<?php
    //connexion a la base de donnees
    include_once "connexion.php";

    //recuperation de l'id dans le lien
    $id = $_GET['id'];

    //requette de suppression
    $req = "DELETE FROM Employes WHERE id = $id";
    $result = $con->query($req);

    //redirection vers la page index.php
    header("Location:index.php");
?>