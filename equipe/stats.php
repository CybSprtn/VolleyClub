<!DOCTYPE html>
<html>
    <head>
        <title>Stats</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<?php 

		// if(!est_connecte()){
		// 	header('Location: ../login/wall.php');
		// }
		
		$page='stats';
		$souspage='tousm';
		require_once '../header/sidebarmatch.php'; 
		require_once '../header/headerfull.php';
		?>
		<div class="container">
            <?php
         // 	Ouverture d'une connexion à la bdd volleyclub
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                     echo ' échouée :' . $e->getMessage();
                 }  ?>
            <div class="nombre"> 
                <div class="nb-victoire">
                    <div class="caption">
                        <caption> - Total Victoire - </caption>
                    </div>
                    <?php 
                        $requete=$bdd->query('SELECT COUNT(id_match) FROM match WHERE score_domi > score_ext');
                        
                        $donnees=$requete->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="highlight"><?= $donnees?></div>
                </div>
                <div class="nb-défaite">
                    <div class="caption">
                        <caption> - Total Défaite - </caption>
                    </div>
                   
                    <div class="highlight"><?= $donneesT-$donnees?></div>
                </div>
                <?php $requete->closeCursor(); ?>
            </div>  

            <div class="pourcent">
                <div class="pourcentage-victoire">
                    <div class="caption">
                        <caption> - Pourcentage Victoire - </caption>
                    </div>
                    <?php 
                        $requetetot=$bdd->prepare("SELECT COUNT(id_match) FROM match");
                        $requetetot=$bdd->execute();
                        $donneesT=$requete->fetch(PDO::FETCH_ASSOC);

                        $requetecount=$bdd->prepare("SELECT COUNT(id_match) FROM match WHERE score_domi > score_ext");
                        $requetecount=$bdd->execute();
                        $donneesC=$requete->fetch(PDO::FETCH_ASSOC);

                        $pourcentage=($donneesC/($donneesT-$donneesC))*100;
                    ?>
                    <div class="highlight"><?= $pourcentage?></div>
                </div>

                <div class="pourcentage-defaite">
                    <div class="caption">
                        <caption> - Pourcentage Défaite - </caption>
                    </div>
                    
                    <div class="highlight"><?= 100-$pourcentage?></div>
                </div>
                <?php $requete->closeCursor(); ?>
                </div>
            </div>


            <div class="stats-joueur">
                <div class="caption">
					<caption> - Liste des joueurs - </caption>
				</div>
					<div class="joueur">
						<table>
								<tr>
									<th>Photo</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Statut</th>
									<th>Poste</th>
									<th>NB Titularisation</th>
									<th>NB Remplacement</th>
									<th>Note moyenne</th>
									<th>Date de naissance</th>
								
								</tr>
								<?php 
									
                                    $requeteJoueur=$bdd->prepare('SELECT * FROM joueur ORDER BY (poste)');
                                    $requeteJoueur=$bdd->execute();
                                    $numlic=$requeteJoueur['num_licence'];
                                    
                                    $requeteTituSelec=$bdd->prepare('SELECT COUNT(role) FROM compte_rendu WHERE role="titulaire" AND joueur.num_licence = :numLic AND joueur.num_licence = compte_rendu.num_licence AND compte_rendu.id_match=matchs.id_match ORDER BY (poste)');
                                    $requeteTituSelec=$bdd->execute(array('numLic'=>$numLic));
                                    $donneesTitu-> $requeteTituSelec->fetch(PDO::FETCH_ASSOC);


                                    $requeteRempSelec=$bdd->prepare('SELECT COUNT(role) FROM compte_rendu WHERE role="remplaçant" AND joueur.num_licence = :numLic AND joueur.num_licence = compte_rendu.num_licence AND compte_rendu.id_match=matchs.id_match ORDER BY (poste)');
                                    $requeteRempSelec=$bdd->execute(array('numLic'=>$numLic));
                                    $donneesRemp-> $requeteRempSelec->fetch(PDO::FETCH_ASSOC);

                                    $requeteMoyNote=$bdd->prepare('SELECT AVG(note) FROM compte_rendu WHERE joueur.num_licence = :numLic AND joueur.num_licence = compte_rendu.num_licence AND compte_rendu.id_match=matchs.id_match ORDER BY (poste)');
                                    $requeteMoyNote=$bdd->execute(array('numLic'=>$numLic));
                                    $donneesMoy-> $requeteMoyNote->fetch(PDO::FETCH_ASSOC);


                                    
			
									// On affiche chaque entrée une à une
									while ($listejoueur = $requeteJoueur->fetch(PDO::FETCH_ASSOC)) {

										?> <tr>
										<td><img src="../photo-m3104/<?= $donnees['photo']?>" alt="photo du joueur"></td>
										<td><?php echo $listejoueur['nom']?></td>
										<td><?php echo $listejoueur['prenom']?></td>
										<td><?php echo $listejoueur['statut']?></td>
										<td><?php echo $listejoueur['poste_pref']?></td>
										<td><?php echo $donneesTitu?></td>
										<td><?php echo $donneesRemp?></td>
										<td><?php echo $donneesMoy?></td>
										<td><?php echo $donnees['daten']?></td>
										<form action="modif-joueur.php" method="post">
											<td><input class="modifier" type="submit" value="Modifier" /></td>
											<input name="modif" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
										<form action="suppr-joueur.php" method="post">
											<td><input class="supprimer" type="submit" value="Supprimer" /></td>
											<input name="suppr" type="hidden" value="<?php echo $donnees['id_match'];?>" />
										</form>
								</tr>

							<?php	} ?>

							</table>

            </div>
        </div>
