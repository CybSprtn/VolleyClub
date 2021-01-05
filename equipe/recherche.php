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
			$rech = ($_GET['rechjoueur']);
			$reqrechjoueur = $bdd->query('SELECT * FROM joueur WHERE prenom LIKE "%'.$rech.'%" OR nom LIKE "%'.$rech.'%" ORDER BY nom');
		}

		if (isset($_GET['rechmatch']) AND !empty($_GET['rechmatch'])) {
			$rech = ($_GET['rechmatch']);
			$reqrechmatch = $bdd->query('SELECT * FROM matchs WHERE adversaire LIKE "%'.$rech.'%" ORDER BY nom_adverse');
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
		
		if (isset($reqrechjoueur)) {
			?>
				<table class="table_joueur">
				 <caption><b>Joueurs de votre recherche</b></caption>
				 <thead>
				  <tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Photo</th>
					<th>Numéro de Licence</th>
					<th>Date de naissance</th>
					<th>Taille</th>
					<th>Poids</th>
					<th>Poste préféré</th>
				  </tr>
					</thead>
					<tbody>

			<?php	foreach ($reqrechjoueur as $donnees):  ?>

					<tr>
					<td><?= $donnees['nom']; ?> </td>
					<td><?= $donnees['prenom']; ?> </td>
					<td><?= $donnees['photo']; ?> </td>
					<td><?= $donnees['num_licence']; ?> </td>
					<td><?= $donnees['date_naissance']; ?> </td>
					<td><?= $donnees['taille']; ?> </td>
					<td><?= $donnees['poids']; ?> </td>
					<td><?= $donnees['poste_pref']; ?> </td>
				</tr>
			
			<?php endforeach ?>
					</tbody>
				</table>
		
	<?php	}  ?>

		<!-- Recherche de Match -->

		<form method="GET">
				
			Rechercher un match : <input type="search" name="rechmatch" placeholder="Recherche..." />
				
		</form>

		<input type="submit" value="Valider"  />
				
		<br/>
		<br/>
				
		<?php
				
		if (isset($reqrechmatch)) {
			?>
				<table class="table_match">
					<caption><b>Matchs de votre recherche</b></caption>
					<thead>
					<tr>
					<th>Date</th>
					<th>Heure</th>
					<th>Nom de l'équipe adverse</th>
					<th>Lieu de rencontre</th>
					<th>Domicile ou extérieur</th>
					</tr>
					</thead>
					<tbody>

			<?php	foreach ($reqrechmatch as $donnees):  ?>

					<tr>
					<td><?= $donnees['date']; ?> </td>
					<td><?= $donnees['heure']; ?> </td>
					<td><?= $donnees['nom_adverse']; ?> </td>
					<td><?= $donnees['lieu_rencontre']; ?> </td>
					<td><?= $donnees['domi_ou_ext']; ?> </td>
				</tr>
			
			<?php endforeach ?>
					</tbody>
				</table>
		
	<?php	}  ?>
		
    </body>
	
</html>