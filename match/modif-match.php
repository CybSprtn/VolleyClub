+<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <div class="container">
        <?php 
				$page='form-modif-match';
				require '../header/headerfull.php'; ?>
			

				<?php

				if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

                        $datem=$_POST['datem'];
                        $heure=$_POST['heure'];
                        $adversaire=$_POST['adversaire'];
                        $lieu=$_POST['lieu'];
                        $contexte=$_POST['contexte'];
                        

                    // 	Ouverture d'une connexion à la bdd contact
                    try{
                        $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                    } catch (PDOException $e) {
                        echo 'Connexion échouée :' . $e->getMessage();
                    }
                        

                    $requete = "UPDATE matchs SET date = '$datem', heure = '$heure', adversaire = '$adversaire', lieu = '$lieu', contexte = '$contexte'";
                   
                    $bdd->exec($requete);

                    echo "Le match a été modifié avec succès."
                   ?> <h2><a href="match.php">Voir la liste des matchs</a></h2>

         <?php } else { ?>
                            
                     <form action="modif-match.php" method="post" class="form-match" enctype="multipart/form-data">
						
                        Date <input type="date" name="datem" /> <br> <br>
                        Heure   <input type="time" name="heure" /> <br> <br>
                        Adversaire <input type="text" name="adversaire" /> <br> <br>
                        Lieu de rencontre  <input type="text" name="lieu" /> <br> <br>
                        <h4>Contexte</h4>
                        <select name="contexte">

                            <option value="championnat">Championnat</option>
                            <option value="coupe-departementale">Coupe Départementale</option>
                            <option value="coupe-nationale">Coupe Nationale</option>
                            <option value="coupe-regionale">Coupe Régionale</option>
                            
                        </select> 						
                        <input class="btn" type="reset" value="Annuler"  />
                        <input class="btn" type="submit" value="Valider"  />
                        
                    </form>	
            <?php    } ?>
            </div>

    </body>
	
</html>