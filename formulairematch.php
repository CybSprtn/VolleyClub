<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire match</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>VolleyBall Club</h1>
		
		<br/>

		<?php

		if (isset($_POST['date'])) {

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
			
				$requete = "INSERT INTO matchs(id_match, date, heure, adversaire, lieu, est_fini, score_domi, score_ext, domicile, contexte, id_set) VALUES ('$date', '$heure','$nom_adverse','$lieu_rencontre','$domi_ou_ext)";
					
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
		

		} else {

			?>
			
			<b> Formulaire Match : </b>

			<br>
			<br>
			<br>

			<form action="formulairematch.php" method="post" class="form-match" enctype="multipart/form-data">
			
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

			<br>

			<img src="img/banner.jpg">

		}
		
	</body>
	
</html>