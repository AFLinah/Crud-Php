<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php 

            //Verifier que le bouton ajouter a bien ete cliqué
            if(isset($_POST['button'])){
                //extraction des informations envoyé dans les variables par la methode POST
                extract($_POST);

                //verifier que tous les champs ont ete remplis
                if(!empty($nom) && !empty($prenom) && !empty($age)){
                    //connexion a la base de donnees
                    include_once "connexion.php";

                    //requete d'ajout
                    $req = "INSERT INTO Employes VALUES(NULL, '$nom', '$prenom', '$age')";
                    $result = $con->query($req);
                    if($result){
                        //si la requete a ete bien effectuee avec succes, on fait une redirection
                        header("location:index.php");
                    }else{
                        $message = "Employe non ajouter";
                    }

                }else{
                    //si non
                    $message = "Veuillez remplir tous les champs !";
                }
            }

        ?>

        <div class="form">
            <a href="index.php" class="back_btn"><img src="images/back.png">Retour</a>
            <h2>Ajouter un employe</h2>
            <p class="erreur_message">
                <?php 
                    //si la variable n'est pas vide, affichons son contenu
                    if(!empty($message)){
                        echo $message;
                    }
                
                ?>
            </p>

            <form action="" method="POST">
                <label>Nom</label>
                <input type="text" name="nom">
                <label>Prenom</label>
                <input type="text" name="prenom">
                <label>Age</label>
                <input type="number" name="age">
                <input type="submit" value="Ajouter" name="button">
            </form>
        </div>
    </body>
</html>