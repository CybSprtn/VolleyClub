<!DOCTYPE html>
<html>
    <head>
        <title>Ajout de joueur</title>
        <meta charset="utf-8">
    </head>
    
    <body>
	
        <h1>Ajout de joueur</h1>
		
		<br/>
		
		<?php

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$photo=$_POST['photo'];
		$num_licence=$_POST['num_licence'];
		$date_naissance=$_POST['date_naissance'];
        $taille=$_POST['taille'];
        $poids=$_POST['poids'];
        $poste_pref=$_POST['poste_pref'];
		
		// Ouverture d'une connexion à la bdd contact
		$bdd = new PDO('mysql:host=localhost;dbname=voleyball;charset=utf8', 'root', '');
		
		/*Vérifiez si les attributs sont déjà dans la base de données*/
		$existe = "SELECT * FROM joueur WHERE nom='$nom' AND prenom='$prenom' AND photo='$photo' AND num_licence='$num_licence' AND date_naissance='$date_naissance' AND taille='$taille' AND poids='$poids' AND poste_pref='$poste_pref'";
		
		$count = $bdd->prepare($existe);
		$count->execute();
		$number = $count->rowCount();
		
		
		if ($number!=0) {
			
			echo "Le joueur existe déjà.";
			
		} else {
		
			$requete = "INSERT INTO joueur(nom, prenom, photo, num_licence, date_naissance, taille, poids, poste_pref) VALUES ('$nom', '$prenom','$photo','$num_licence','$date_naissance','$taille', '$poids', '$poste_pref')";
				
			$bdd->exec($requete);
			
			echo "Joueur ajouté ! <br/> <br/> Voici les joueurs existants : <br/> <br/>";
				
			$reponse = $bdd->query('SELECT * FROM joueur');
	
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch()) {

				echo $donnees['nom'] . " " . $donnees['prenom'] . "<br/>";
			
			}
			
			$reponse->closeCursor(); // Termine le traitement de la requête
			
		}
		
		$count->closeCursor(); // Termine le traitement de la requête
		
		$bdd = null;

		?>
		
	</body>
	
</html>