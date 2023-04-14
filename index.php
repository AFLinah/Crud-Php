<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Employes</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <a href="ajouter.php" class="Btn_add"><img src="images/plus.png">Ajouter</a>

            <table>
                <tr id="items">
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Age</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>

                <?php 
                    //inclure la page de connexion
                    include_once "connexion.php"; 

                    //recuperation des donnees
                    $req = "SELECT * FROM Employes";
                    $result = $con->query($req);

                    //Affichage des donnees dans une table HTML
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row["nom"] . "</td>";
                            echo "<td>" . $row["prenom"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td><a href='modifier.php?id=" . $row["id"] . "'><img src='images/pen.jpg'></a></td>";
                            echo "<td><a href='supprimer.php?id=" . $row["id"] . "'><img src='images/trash.png'></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "il n'y a pas d'employe ajouter";
                    }

                    $con->close();
                ?>
            </table>
        </div>
    </body>
</html>

