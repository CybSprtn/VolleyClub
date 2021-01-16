<!DOCTYPE html>
<html>
    <head>
        <title>Equipe</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <?php 
        $page='equipe';
        $souspage='blesse';
        require_once '../header/sidebarequipe.php';
		require '../header/headerfull.php'; ?>
		<div class="container">
			<div class="liste-joueur">
				
				<?php
    			    // 	Ouverture d'une connexion à la bdd volleyclub
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                    echo 'Connexion échouée :' . $e->getMessage();
                }  ?>
                
						<div class="caption">
							<caption> - Liste des joueurs - </caption>
						</div>
						<div class="joueur">
					
							<!-- //On affiche chaque entrée une à une -->
							
							<table>
								<tr>
									<th>Photo</th>
									<th>N°Licence</th>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Poste</th>
									<th>Statut</th>
									<th>Taille</th>
									<th>Poids</th>
									<th>Date de naissance</th>
									
									
									
								</tr>
								<?php 
									
									$requete = $bdd->query('SELECT * FROM joueur WHERE statut="blessé" ORDER BY nom');
			
									// On affiche chaque entrée une à une
									while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

										?> <tr>
										<td><img src="../photos-m3104/<?= $donnees['photo']?>" alt="photo du joueur"></td>
										<td><?php echo $donnees['num_licence']?></td>
										<td><?php echo $donnees['prenom']?></td>
										<td><?php echo $donnees['nom']?></td>
										<td><?php echo $donnees['poste_pref']?></td>
										<td><?php echo $donnees['statut']?></td>
										<td><?php echo $donnees['taille']?></td>
										<td><?php echo $donnees['poids']?></td>
										<td><?php echo $donnees['date_naissance']?></td>
										<form action="modif-joueur.php" method="post">
											<td><input class="modifier" type="submit" value="Modifier" /></td>
											<input name="modif" type="hidden" value="<?php echo $donnees['num_licence'];?>" />
										</form>
										<form action="suppr-joueur.php" method="post">
											<td><input class="supprimer" type="submit" value="Supprimer" /></td>
											<input name="suppr" type="hidden" value="<?php echo $donnees['num_licence'];?>" />
										</form>
								</tr>

							<?php	} ?>

							</table>
							
							<br>
							<a href="formulairejoueur.php"> <button class="ajouter" type="button">+ Ajouter un joueur</button></a>

					<?php	$requete->closeCursor();
							$bdd = null; ?>
								
						</div>
			
			</div>
		
		</div>	

	</body>
	
</html>