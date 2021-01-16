<!DOCTYPE html>
<html>
    <head>
        <title>Joueur</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <div class="container">
        <?php 
				$page='form-suppr-joueur';
				require '../header/headerfull.php'; ?>
			

				<?php

				if (isset($_POST['validation'])) {

                    if ($_POST['validation'] == "Non") {

                        header('Location: equipe.php');

                    } else {

                        $num_licence=$_POST['suppr'];

                        // 	Ouverture d'une connexion à la bdd volleyclub
                        try{
                            $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                        } catch (PDOException $e) {
                            echo 'Connexion échouée :' . $e->getMessage();
                        }
                            
                        $requete= $bdd->prepare('DELETE FROM joueur WHERE num_licence =:num_licence');

                        $requete->execute(array(
 
                            'num_licence' => $num_licence
                      
                            ));

                        echo "Le joueur a été supprimé avec succès."

                    ?> <h2><a href="equipe.php">Voir la liste des joueur</a></h2>

           <?php   } ?>

         <?php } else { ?>
                            
                     <form action="suppr-joueur.php" method="post" enctype="multipart/form-data">
						
                        Etes vous sûr de vouloir supprimer ce joueur ?						
                        <input type="submit" value="Non" name="validation" />
                        <input type="submit" value="Oui" name="validation" />
                        <input name="suppr" type="hidden" value="<?php echo $_POST['suppr'];?>">
                        
                    </form>	
            <?php    } ?>
            </div>

    </body>
	
</html>