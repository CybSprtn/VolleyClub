<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <div class="container">
        <?php 
				$page='form-suppr-match';
				require '../header/headerfull.php'; ?>
			

				<?php

				if (isset($_POST['validation'])) {

                    if ($_POST['validation'] == "Non") {

                        header('Location: match.php');

                    } else {

                        $id=$_POST['modif'];

                        // 	Ouverture d'une connexion à la bdd volleyclub
                        try{
                            $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                        } catch (PDOException $e) {
                            echo 'Connexion échouée :' . $e->getMessage();
                        }
                            

                        $requete = "DELETE FROM matchs WHERE id_match = '$id'";
                    
                        $bdd->exec($requete);

                        echo "Le match a été supprimé avec succès."

                    ?> <h2><a href="match.php">Voir la liste des matchs</a></h2>

           <?php   } ?>

         <?php } else { ?>
                            
                     <form action="suppr-match.php" method="post" enctype="multipart/form-data">
						
                        Etes vous sûr de vouloir supprimer ce match ?						
                        <input type="submit" value="Non" name="validation" />
                        <input type="submit" value="Oui" name="validation" />
                        <input name="modif" type="hidden" value="<?php echo $_POST['suppr'];?>">
                        
                    </form>	
            <?php    } ?>
            </div>

    </body>
	
</html>