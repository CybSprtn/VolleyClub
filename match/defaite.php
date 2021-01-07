<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php $page='match';
		$souspage='defaite';
		require_once '../header/sidebarmatch.php'; 
		require_once '../header/headerfull.php';
		?>
		<div class="container">
			<div class="liste-match">
				
				<?php
				// Ouverture d'une connexion à la bdd contact
				 $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
						
					?>
						<div class="caption">
							<caption> - Liste des matchs - </caption>
						</div>
						<div class="match">
					
							<!-- //On affiche chaque entrée une à une -->
							
							<table>
								<tr>
									<th>id</th>
									<th>Adversaire</th>
									<th>Lieu</th>
									<th>Date</th>
									<th>Heure</th>
									<th>Score Karasuno</th>
									<th>Score Extérieur</th>
									<th>Contexte</th>
									
								</tr>
								<?php 
									
									$requete = $bdd->query('SELECT * FROM matchs WHERE score_domi < score_ext ORDER BY (date)');
			
									// On affiche chaque entrée une à une
									while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

										?> <tr>
										<td class = "loose"><?php echo $donnees['id_match']?></td>
										<td class = "loose"><?php echo $donnees['adversaire']?></td>
										<td class = "loose"><?php echo $donnees['lieu']?></td>
										<td class = "loose"><?php echo $donnees['date']?></td>
										<td class = "loose"><?php echo $donnees['heure']?></td>
										<td class = "loose"><?php echo $donnees['score_domi']?></td>
										<td class = "loose"><?php echo $donnees['score_ext']?></td>
										<td class = "loose"><?php echo $donnees['contexte']?></td>
										<form action="modif-match.php" method="post">
											<td class = "loose"><input class="modifier" type="submit" value="Modifier" /></td>
											<input name="modif" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
										<form action="suppr-match.php" method="post">
											<td class = "loose"><input class="supprimer" type="submit" value="Supprimer" /></td>
											<input name="suppr" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
								</tr>

							<?php	} ?>

							</table>
							
							<br>
							<a href="formulairematch.php"> <button class="ajouter" type="button">+ Ajouter un match</button></a>

					<?php	$requete->closeCursor();
							$bdd = null; ?>
								
						</div>
			
			</div>
		
		</div>	

	</body>
	
</html>