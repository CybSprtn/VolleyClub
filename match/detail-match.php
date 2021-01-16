<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php 
        // require '../fonctions/auth.php';
		// if(!est_connecte()){
		// 	header('Location: ../login/wall.php');
		// }
		
		$page='match';
		$souspage='detail';
		require_once '../header/sidebarmatch.php'; 
		require_once '../header/headerfull.php';
		?>
		<div class="container">
			<div class="detail-match">
				
				<?php

                $id_match=$_POST['voir'];


    			    // 	Ouverture d'une connexion à la bdd volleyclub
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                    echo ' échouée :' . $e->getMessage();
                }  
                
                $requetematch = $bdd->prepare('SELECT * FROM matchs WHERE id_match = :id_match');
                $requetematch->execute(array(
                    'id_match' => $id_match
                     ));
                $donnees = $requetematch->fetchAll(PDO::FETCH_ASSOC);

                ?>
                
                
						<div class="caption">
							<caption> - Détail du match - </caption>
						</div>
						<div class="match-detail match">							
							<table>
								<tr>
									<th>id</th>
									<th>Adversaire</th>
									<th>Lieu</th>
									<th>Date</th>
									<th>Heure</th>
									<th>Score Karasuno</th>
									<th>Score extérieur</th>
									<th>Contexte</th>
									
								</tr>
								<?php 

			
									// On affiche chaque entrée une à une
									while ($donnees = $requetematch->fetch(PDO::FETCH_ASSOC)) {

										?> <tr>
										<td><?php echo $donnees['id_match']?></td>
										<td><?php echo $donnees['adversaire']?></td>
										<td><?php echo $donnees['lieu']?></td>
										<td><?php echo $donnees['date']?></td>
										<td><?php echo $donnees['heure']?></td>
										<td><?php echo $donnees['score_domi']?></td>
										<td><?php echo $donnees['score_ext']?></td>
										<td><?php echo $donnees['contexte']?></td>
										<form action="modif-match.php" method="post">
											<td><input class="modifier" type="submit" value="Modifier" /></td>
											<input name="modif" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
										<form action="suppr-match.php" method="post">
											<td><input class="supprimer" type="submit" value="Supprimer" /></td>
											<input name="suppr" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
								</tr>

							<?php	} ?>

                            </table>
                        </div>
                      
                    
                    <div class="participants">
                        <?php 
                            $requetejoueur= $bdd->prepare('SELECT * FROM joueur,compte_rendu,match WHERE joueur.num_licence= compte_rendu.num_licence AND compte_rendu.id_match = matchs.id_match AND matchs.id_match =:id_match');
                            $requetejoueur->execute(array( 'id_match' => $id_match));
                        ?>
                          <div class="joueur-match joueur">
                                        
                                        <table>
                                        <tr>
                                            <th>Photo</th>
                                            <th>N°Licence</th>
                                            <th>Prénom</th>
                                            <th>Nom</th>
                                            <th>Poste</th>
                                            <th>Statut</th>
                                            <th>Rôle</th>
                                            <th>Commentaire</th>
                                            <th>Note</th>
                                        
                                        </tr>
                                    <?php 
                                        
                                        $requete = $bdd->query('SELECT * FROM joueur ORDER BY nom');
                                        $requete1 = $bdd->query('SELECT * FROM compte_rendu WHERE id_match = "$id_match"');
                                        

                                        // On affiche chaque entrée une à une
                                        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

                                            ?> <tr>
                                            <td><img src="../photos-m3104/<?= $donnees['photo']?>" alt="photo du joueur"></td>
                                            <td><?php echo $donnees['num_licence']?></td>
                                            <td><?php echo $donnees['prenom']?></td>
                                            <td><?php echo $donnees['nom']?></td>
                                            <td><?php echo $donnees['poste_pref']?></td>
                                            <td><?php echo $donnees['statut']?></td>
                                <?php   } 
                                 while ($donnees1 = $requete1->fetch(PDO::FETCH_ASSOC)) {
                                     ?>

                                            <td><?php echo $donnees1['role']?></td>
                                            <td><?php echo $donnees1['commentaire']?></td>
                                            <td><?php echo $donnees1['note']?></td>
                                            <form action="modif-joueur.php" method="post">
                                                <td><input class="modifier" type="submit" value="Modifier" /></td>
                                                <input name="modif" type="hidden" value="<?php echo $donnees['num_licence'];?>" />
                                            </form>
                                            <form action="suppr-joueur.php" method="post">
                                                <td><input class="supprimer" type="submit" value="Supprimer" /></td>
                                                <input name="suppr" type="hidden" value="<?php echo $donnees['num_licence'];?>" />
                                            </form>
                                        </tr>

                                  <?php	}
                                 ?>

                                    </table>						
                                </div>
                    </div>
			
			</div>
		
		</div>	

	</body>
	
</html>