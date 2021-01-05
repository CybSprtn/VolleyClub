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
				$page='form-modif-match';
				require '../header/headerfull.php'; ?>
			

				<?php

				if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

					$datem=$_POST['datem'];
					$heure=$_POST['heure'];
					$adversaire=$_POST['adversaire'];
					$lieu=$_POST['lieu'];
					

				}
				// 	Ouverture d'une connexion à la bdd contact
				try{
					$bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
				} catch (PDOException $e) {
                    echo 'Connexion échouée :' . $e->getMessage();
                }
					
				
					
				// 	Vérifier si les attributs sont déjà dans la base de données*/
				 	$existe = 'SELECT * FROM matchs WHERE datem=:datem AND heure=:heure AND adversaire=:adversaire AND lieu=:lieu';
					
				 	$count = $bdd->prepare($existe);
				 	$count->execute(array(':datem' => $datem, ':heure' => $heure, ':adversaire' => $adversaire, ':lieu' => $lieu));
				
					
				
				 	if ($count->rowCount()!=0) {
						
				 		echo "Le match existe déjà.";
						
				 	} else {
                
                //     $requete = "INSERT INTO matchs(id_match, date, heure, adversaire, lieu, est_fini, score_domi, score_ext, domicile, contexte, id_set) VALUES ('$date', '$heure','$nom_adverse','$lieu_rencontre','$domi_ou_ext)";
                        
                //     $bdd->exec($requete); 
                    
                //     $count->closeCursor(); // Termine le traitement de la requête
                
                //     $bdd = null;
                // }?>
                <form action="" method="post" class="form-match" enctype="multipart/form-data">
                
                    Date : <input type="date" name="date" /> <br> <br>
                    Heure  : <input type="time" name="heure" /> <br> <br>
                    Nom de l'équipe adverse : <input type="text" name="nom_adverse" /> <br> <br>
                    Lieu de rencontre : <input type="text" name="lieu_rencontre" /> <br> <br>
                    Domicile ou exterieur ?
                    <select name="domi_ou_ext">
                        <option value="domicile">Domicile</option>
                        <option value="exterieur">Extérieur</option>
                    </select> <br> <br>
                    
                    <input type="reset" value="Annuler"  />
                    <input type="submit" value="Valider"  />
                    
                </form>
            </div>

    </body>
	
</html>