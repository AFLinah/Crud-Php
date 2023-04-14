<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <?php 

        //connexion a la base de donnees
        include_once "connexion.php";

        //on recupere le id dans le lien
        $id = $_GET['id'];

        //requete pour afficher les infos d'un employe
        $req = "SELECT * FROM Employes WHERE id = $id";
        $result = $con->query($req);
        $row = $result->fetch_assoc();

        //Verifier que le bouton modifier a bien ete cliqué
        if(isset($_POST['button'])){
            //extraction des informations envoyé dans les variables par la methode POST
            extract($_POST);

            //verifier que tous les champs ont ete remplis
            if(!empty($nom) && !empty($prenom) && !empty($age)){

                //requete de modification
                $sql = "UPDATE Employes SET nom = '$nom', prenom = '$prenom', age = '$age' WHERE id = $id";
                $resultat = $con->query($sql); 
                
                if($resultat){
                    //si la requete a ete bien effectuee avec succes, on fait une redirection
                    header("location:index.php");
                }
                else{
                    $message = "Employe non modifier";
                }

            }else{
                //si non
                $message = "Veuillez remplir tous les champs !";
            }
        }

        ?>

        <div class="form">
            <a href="index.php" class="back_btn"><img src="images/back.png">Retour</a>
            <h2>Modifier l'employe : </h2>
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
                <input type="text" name="nom" value="<?= $row['nom'] ?>">
                <label>Prenom</label>
                <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
                <label>Age</label>
                <input type="number" name="age" value="<?= $row['age'] ?>">
                <input type="submit" value="Modifier" name="button">
            </form>
        </div>
    </body>
</html>