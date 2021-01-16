<!DOCTYPE html>
<html>
    <head>
        <title>Joueur</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php 
        // require '../fonctions/auth.php';
		// if(!est_connecte()){
		// 	header('Location: ../login/wall.php');
		// }
		
		$page='joueur';
		$souspage='tousm';
		require_once '../header/sidebarmatch.php'; 
		require_once '../header/headerfull.php';
		?>
		<div class="container">
			<div class="detail-joueur">
				
				<?php

                $num_licence=$_POST['voir'];

    			    // 	Ouverture d'une connexion à la bdd volleyclub
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                    echo ' échouée :' . $e->getMessage();
                }  

                $requeteJ = $bdd->prepare('SELECT * FROM joueur WHERE num_licence=:num_licence');
                $requeteJ->execute(array('num_licence' => $num_licence));			
                $donneesJ = $requeteJ->fetch(PDO::FETCH_ASSOC);
                
                $requeteCR = $bdd->prepare('SELECT AVG(note) FROM compte_rendu WHERE num_licence=:num_licence');
                $requeteCR->execute(array('num_licence' => $num_licence));			
                $donneesCR = $requeteCR->fetch(PDO::FETCH_ASSOC);

                
                ?>
                
						<div class="caption">
							<caption> - Détail du joueur <?= $donneesJ['prenom'] . ' ' . $donneesJ['nom']; ?> - </caption>
						</div>
						<div class="joueur-detail joueur">
					
							<table>
								<tr>
									<th>Photo</th>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Poste</th>
									<th>Statut</th>
									<th>Taille</th>
									<th>Poids</th>
                                    <th>Date de naissance</th>
                                    <th>Avis du coach</th>
                                    <th>Note /5</th>
                                    
								</tr>
								<?php 

										?> <tr>
										<td><img src="../photos-m3104/<?= $donneesJ['photo']?>" alt="photo du joueur"></td>
										<td><?php echo $donneesJ['prenom']?></td>
										<td><?php echo $donneesJ['nom']?></td>
										<td><?php echo $donneesJ['poste_pref']?></td>
										<td><?php echo $donneesJ['statut']?></td>
										<td><?php echo $donneesJ['taille']?></td>
										<td><?php echo $donneesJ['poids']?></td>
                                        <td><?php echo $donneesJ['date_naissance']?></td>
                                        <td><?php echo "Bon Joueur";//$donneesJ['avis']?></td>
										<td><?php echo 3.5;//$donneesCR[0]?></td>
										<form action="modif-joueur.php" method="post">
											<td><input class="modifier" type="submit" value="Modifier" /></td>
											<input name="modif" type="hidden" value="<?php echo $donneesJ['num_licence'];?>" />
										</form>
                                        <form action="suppr-joueur.php" method="post">
											<td><input class="supprimer" type="submit" value="Supprimer" /></td>
											<input name="suppr" type="hidden" value="<?php echo $donneesJ['num_licence'];?>" />
										</form>
								</tr>

                    </table>

                            <?php	
                                $bdd = null;
                            ?>
								
						</div>
                      
             
                   
			
			</div>
		
		</div>	

	</body>
	
</html>