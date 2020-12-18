<!DOCTYPE html>
<html>
    <head>
        <title>Ajout de Matchs</title>
        <meta charset="utf-8">
    </head>
    
    <body>
	
        <h1>Ajout de Matchs</h1>
		
		<br/>
		
		<?php

		$date=$_POST['date'];
		$heure=$_POST['heure'];
		$nom_adverse=$_POST['nom_adverse'];
		$lieu_rencontre=$_POST['lieu_rencontre'];
		$domi_ou_ext=$_POST['domi_ou_ext'];

		
		// Ouverture d'une connexion à la bdd contact
		$bdd = new PDO('mysql:host=localhost;dbname=volleyball;charset=utf8', 'root', '');
		
		/*Vérifiez si les attributs sont déjà dans la base de données*/
		$existe = "SELECT * FROM matchs WHERE date='$date' AND heure='$heure' AND adversaire='$nom_adverse' AND lieu='$lieu_rencontre' AND domicile='$domi_ou_ext'";
		
		$count = $bdd->prepare($existe);
		$count->execute();
		$number = $count->rowCount();
		
		
		if ($number!=0) {
			
			echo "Le match existe déjà.";
			
		} else {
		
			$requete = "INSERT INTO matchs(date, heure, adversaire, lieu, domicile) VALUES ('$date', '$heure','$nom_adverse','$lieu_rencontre','$domi_ou_ext)";
				
			$bdd->exec($requete);
			
			echo "Match ajouté ! <br/> <br/> Voici les joueurs existants : <br/> <br/>";
				
			$reponse = $bdd->query('SELECT * FROM matchs');
	
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