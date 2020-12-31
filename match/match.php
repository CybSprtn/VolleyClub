<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php $page='match';
		$souspage='tousm';
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
						<h2><a href="formulairematch.php">Ajouter un match</a></h2>
						<div class="match">
					
							<!-- //On affiche chaque entrée une à une -->
							
							<table>
								<tr>
									<th>Adversaire</th>
									<th>Lieu</th>
									<th>Date & Heure</th>
									<th>Score Karasuno</th>
									<th>Score extérieur</th>
									<th>Contexte</th>
									
								</tr>
								<?php 
									$requete ="SELECT * FROM matchs ORDER BY (datem)";
									if($resultat=$bdd->exec($requete)){
										$listematchs = $requete->fetch(PDO::FETCH_ASSOC);
									}else {
										var_dump($bdd->errorInfo());
										die;
									}
									?>
								
								<?php while (!empty($listematchs)) :
								?>
								<tr>
									<td><?php echo $listematchs['adversaire']?></td>	<!-- $donnees['adversaire'] -->
									<td><?php echo $listematchs['lieu']?></td>	<!-- $donnees['lieu'] -->
									<td>12/01/2019 17:50</td>
									<td>2</td>		<!-- $donnees['score_domi'] -->
									<td>1</td>		<!-- $donnees['score_ext'] -->
									<td>Coupe Régionale</td>
									<td id="modif"><a href="modif-match.php?id_match=<?php //echo $listematchs['id_match'] ?>"><input type="submit" value="Modifier"/></a></td>
									<td id="suppr"><a href="suppr-match.php?id_match=<?php //echo $listematchs['id_match'] ?>"><input class="suppr" type="submit" value="Supprimer"/></a></td>
									
									 
									
								</tr>
							</table>
									<?php endwhile; ?>
								
							<?php //echo $donnees['adversaire'] . $donnees['lieu'] . $donnees['score_domi'] . $donnees['score_ext'] . $donnees['contexte']?>
						</div>
					 
					<?php //} ?>
						
					<?php //$resultat->closeCursor();
					// $listematchs->closeCursor();?> 
						
				<?php //} ?>
					
				<?php //$requete->closeCursor(); ?>
					
				<?php $bdd = null; ?>	
													
			</div>

				
		
		</div>	
	</body>
	
</html>