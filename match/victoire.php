<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <?php
        $page='match'; 
		$souspage='victoire';
		require '../header/sidebarmatch.php';
		require '../header/headerfull.php'; ?>
		<div class="container">
			<div class="liste-match">
			<?php
				// Ouverture d'une connexion à la bdd contact
				// $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
					// $requete = "SELECT * FROM matchs WHERE est_fini=true";
					// $listematchs=$bdd->exec($requete);	
					// $reponse = $bdd->query('SELECT * FROM joueur');
					// On affiche chaque entrée une à une
					// while ($donnees = $reponse->fetch()) { ?>

						<div class="caption">
							<caption> - Liste des matchs - </caption>
						</div>
						<div class="match">
							
							<table>
								<tr>
									<th>Adversaire</th>
									<th>Lieu</th>
									<th>Date & Heure</th>
									<th>Score Karasuno</th>
									<th>Score extérieur</th>
									<th>Contexte</th>
									
								</tr>
						
								<tr>
									<td>Nekoma</td>	<!-- $donnees['adversaire'] -->
									<td>gymnase de Tokyo</td>	<!-- $donnees['lieu'] -->
									<td>12/01/2019 17:50</td>
									<td>2</td>		<!-- $donnees['score_domi'] -->
									<td>1</td>		<!-- $donnees['score_ext'] -->
									<td>Coupe Régionale</td>
								</tr>
							</table>
							<?php //echo $donnees['adversaire'] . $donnees['lieu'] . $donnees['score_domi'] . $donnees['score_ext'] . $donnees['contexte']?>
						</div>
					 
					<?php //} ?>
						
					<?php //$reponse->closeCursor();?> 
						
				<?php //} ?>
					
				<?php //$count->closeCursor(); ?>
					
				<?php// $bdd = null; ?>	
													
			</div>

			
			
		
		</div>	
	</body>
	
</html>