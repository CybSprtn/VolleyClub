<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire joueur</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php $page='formulairejoueur';
		require '../header/headerfull.php'; ?>
		<div class="container">
			<?php

			if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['num_licence']) && isset($_POST['date_naissance']) && isset($_POST['taille']) && isset($_POST['poids']) && isset($_POST['status']) && isset($_POST['poste_pref']) && isset($_POST['photo'])) {

				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$num_licence=$_POST['num_licence'];
				$date_naissance=$_POST['date_naissance'];
				$taille=$_POST['taille'];
				$poids=$_POST['poids'];
				$statut = "apte";
				$poste_pref=$_POST['poste_pref'];

				// Ouverture d'une connexion à la bdd contact
				$bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');

				if (!empty($_FILES['photo']['name'])) {
					$taillemax = 2097152; //2 mo max
					$extensionsvalides = array('jpg','jpeg','png');
					if($_FILES['photo']['size'] <= $taillemax) {
						$extensionupload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1)); //Vérifie l'extension de la piece jointe en enlvenant le "." et tout en minuscule
						if (in_array($extensionupload, $extensionsvalides)) {
							$photo = $_FILES['photo']['name'];
						} else {
							$msg = "La photo doit être au format png, jpg ou jpeg.";
						}
					} else {
						$msg = "La photo ne doit pas dépasser 2 mo.";
					}
				}

				if (isset($msg)) {
					echo $msg;
				}
				
				/*Vérifiez si les attributs sont déjà dans la base de données */
				$existe = "SELECT * FROM joueur WHERE num_licence = $num_licence";
				
				$count = $bdd->prepare($existe);
				$count->execute();
				$number = $count->rowCount();
				
				if ($number != 0 ) {
					
					echo "Le joueur existe déjà.";

				} else {
				
					$requete = "INSERT INTO joueur(num_licence, prenom, nom, date_naissance, taille, poids, photo, statut, poste_pref) VALUES ('$num_licence', '$prenom','$nom','$date_naissance','$taille','$poids', '$photo', '$statut', '$poste_pref')";

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

			} else {

				?>
				
				<div class="form-add-joueur">
				
					<form action="formulairejoueur.php" method="post" class="form-joueur" enctype="multipart/form-data">
					
						
					Nom : <input type="text" name="nom" /> <br> <br>
					Prénom : <input type="text" name="prenom" /> <br> <br>
					Photo : <input type="file" name="photo" /> <br> <br>
					Numéro de Licence : <input type="text" name="num_licence" /> <br> <br>
					Date de naissance : <input type="date" name="date_naissance" /> <br> <br>
					Taille : <input type="text" name="taille" /> <br> <br>
					Poids : <input type="text" name="poids" /> <br> <br>
					Poste préféré :
					<select name="poste_pref">
						<option value="arriere_centre">Arrière centre</option>
						<option value="arriere_gauche">Arrière gauche</option>
						<option value="arriere_droit">Arrière droit</option>
						<option value="avant_centre">Avant centre</option>
						<option value="avant_gauche">Avant gauche</option>
						<option value="avant_droit">Arrière droit</option>
						<option value="passeur">Passeur</option>
						<option value="libero"> Libéro</option>
					</select> <br> <br>	
					<input class="valider"type="submit" value="Valider"  />
					<input class="annuler"type="reset" value="Annuler"  />

					</form>
				</div>

			<?php } ?>
		
		</div>	
	</body>
	
</html>