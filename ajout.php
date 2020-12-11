<!DOCTYPE html>
<html>
    <head>
        <title>Recherche de Joueur / Match</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>Recherche de Joueur / Match</h1>
		
		<?php
		
		$bdd = new PDO('mysql:host=localhost;dbname=volleyball;charset=utf8', 'root', '');
		
		$rech =NULL;
		
		if (isset($_GET['rechjoueur']) AND !empty($_GET['rechjoueur'])) {
			$rech = htmlspecialchars($_GET['rechjoueur']);
			$reqrech = $bdd->query('SELECT * FROM joueur WHERE prenom LIKE "%'.$rech.'%" OR nom LIKE "%'.$rech.'%" ORDER BY nom');
		}

		if (isset($_GET['rechmatch']) AND !empty($_GET['rechmatch'])) {
			$rech = htmlspecialchars($_GET['rechmatch']);
			$reqrech = $bdd->query('SELECT * FROM match WHERE nom_adverse LIKE "%'.$rech.'%" ORDER BY nom_adverse');
		}
			
		
		?>

		<!-- Recherche de Joueur -->
		
		<form method="GET">
		
			Rechercher un joueur : <input type="search" name="rechjoueur" placeholder="Recherche..." />
		
		</form>

		<input type="submit" value="Valider"  />
		
		<br/>
		<br/>
		
		<?php
		
		if (isset($reqrech)) {
		?>
				<table>
				 <caption><b> Joueurs :</b></caption>
				  <tr>

					<td>Nom</td>
					<td>Prénom</td>
					<td>Photo</td>
					<td>Numéro de licence</td>
					<td>Date de naissance</td>
					<td>Taille</td>
					<td>Poids</td>
					<td>Poste préféré</td>
				  </tr>
					
					<?php
			
			while ($donnees = $reqrech->fetch()) {
				
			?>	
				<tr>
				<td><? echo $donnees['nom']; ?> </td>
				<td><? echo $donnees['prenom']; ?> </td>
				<td><? echo $donnees['photo']; ?> </td>
				<td><? echo $donnees['num_licence']; ?> </td>
				<td><? echo $donnees['date_naissance']; ?> </td>
				<td><? echo $donnees['taille']; ?> </td>
				<td><? echo $donnees['poids']; ?> </td>
				<td><? echo $donnees['poste_pref']; ?> </td>
				</tr>

				</table>
			
			<?php
			
			}
			$reqrech->closeCursor();  
		}
		
			?>


		<!-- Recherche de Match -->

		<form method="GET">
				
			Rechercher un match : <input type="search" name="rechmatch" placeholder="Recherche..." />
				
		</form>

		<input type="submit" value="Valider"  />
				
		<br/>
		<br/>
				
		<?php
				
		if (isset($reqrech)) {
		?>
			<table>
			<caption><b> Matchs :</b></caption>
			<tr>

				<td>Date</td>
				<td>Heure</td>
				<td>Nom de l'équipe adverse</td>
				<td>Lieu de rencontre</td>
				<td>Domicile ou extérieur</td>

			</tr>
				
			<?php
		
			while ($donnees = $reqrech->fetch()) {
			?>	

				<tr>
				<td><? echo $donnees['nom']; ?> </td>
				<td><? echo $donnees['prenom']; ?> </td>
				<td><? echo $donnees['photo']; ?> </td>
				<td><? echo $donnees['num_licence']; ?> </td>
				<td><? echo $donnees['date_naissance']; ?> </td>
				<td><? echo $donnees['taille']; ?> </td>
				<td><? echo $donnees['poids']; ?> </td>
				<td><? echo $donnees['poste_pref']; ?> </td>
				</tr>

			</table>
		
			<?php
		
			}

			$reqrech->closeCursor();  
		}
	
			?>
		
		
			
    </body>
	
</html>