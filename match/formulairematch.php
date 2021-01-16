<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
		<div class="container">
				<?php 
				$page='form-match';
				require '../header/headerfull.php'; ?>
				<?php

				// 	Ouverture d'une connexion à la bdd contact
				try{
					$bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
				} catch (PDOException $e) {
					echo 'Connexion échouée :' . $e->getMessage();
				}

				if (isset($_POST['adversaire'])) {

					$datem=$_POST['datem'];
					$heure=$_POST['heure'];
					$adversaire=$_POST['adversaire'];
					$lieu=$_POST['lieu'];
					$est_fini= 0;
					$score_domi = 0;
					$score_ext = 0;
					$domicile = 0;
					$contexte=$_POST['contexte'];
		
					// 	Vérifier si les attributs sont déjà dans la base de données*/
						$existe = 'SELECT * FROM matchs WHERE datem=:datem AND heure=:heure';
						
						$count = $bdd->prepare($existe);

						$count->execute(array(':datem' => $datem, ':heure' => $heure));					

						if ($count->rowCount()!=0) {
							
							echo "Le match existe déjà.";
							
						} else {

							try{

								if(count($_POST['titulaire'])<6){
									$msg = "Il n'y a pas assez de joueurs titulaires attribués";
								} else {
									$requete = $bdd->prepare('INSERT INTO Matchs(date, heure, adversaire, lieu, est_fini, score_domi, score_ext, domicile, contexte) VALUES (:date, :heure, :adversaire, :lieu, :est_fini, :score_domi, :score_ext, :domicile, :contexte)');
									$requete->execute(array(
										'date' => $datem,
										'heure' => $heure,
										'adversaire' => $adversaire,
										'lieu' => $lieu,
										'est_fini' => $est_fini,
										'score_domi' => $score_domi,
										'score_ext' => $score_ext,
										'domicile' => $domicile,
										'contexte' => $contexte
									));

									$id_match = $bdd->lastInsertId();

									echo "Match ajouté ! <br/> <br/> Voici les matchs existants : <br/> <br/>";

									$reponse = $bdd->query('SELECT * FROM matchs');
			
									// On affiche chaque entrée une à une
									while ($donnees = $reponse->fetch()) {

										echo "Adversaire : " . $donnees['adversaire'] . " | Date : " . $donnees['date'] . " | Heure : " . $donnees['heure'] . "<br/>";
						
									}
								}
								
							} catch(Exception $e){
								die('Erreur :'.$e->getMessage());
							}

							if (isset($msg)) {
								echo $msg;
							}

							$num_licence=$_POST['selec'];
							$titulaire = "titulaire";
							$remplacant = "remplacant";

							if(isset($_POST['titulaire']) ) { 
								if(count($_POST['titulaire'])>=6) {

									$requete_compte_rendu = $bdd->prepare('INSERT INTO compte_rendu(num_licence,id_match,role) VALUES (:num_licence,:id_match,:role)');

									$requete_compte_rendu->execute(array(
										'num_licence' => 123456789123456,
										'id_match' => 10,
										'role' => $titulaire
									));


									foreach($_POST['titulaire'] as $t){
										if(in_array($t,$_POST['titulaire'])) {
											$requete_compte_rendu->execute(array(
												'num_licence' => $t,
												'id_match' => $id_match,
												'role' => $titulaire
											));
										} else {
											$requete_compte_rendu->execute(array(
												'num_licence' => $t,
												'id_match' => $id_match,
												'role' => $remplacant
											));
										}
									}
								}
							}
					
						}

				} else {

					?>
					<div class="form-add-match">				

						<form action="formulairematch.php" method="post" class="form-match" enctype="multipart/form-data">
						
							Date <input type="date" name="datem" /> <br> <br>
							Heure   <input type="time" name="heure" /> <br> <br>
							Adversaire <input type="text" name="adversaire" /> <br> <br>
							Lieu de rencontre  <input type="text" name="lieu" /> <br> <br>
							Contexte
							<select name="contexte">

								<option value="championnat">Championnat</option>
								<option value="coupe-departementale">Coupe Départementale</option>
								<option value="coupe-nationale">Coupe Nationale</option>
								<option value="coupe-regionale">Coupe Régionale</option>
								
							</select> 		<br> <br>		
							
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
									<th>Titulaire</th>
									<th>Remplaçant</th>
									
								</tr>
								<?php 
									
									$requetejoueur = $bdd->query('SELECT * FROM joueur WHERE statut = "actif" ORDER BY nom');
			
									// On affiche chaque entrée une à une
									while ($donnees = $requetejoueur->fetch(PDO::FETCH_ASSOC)) {

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

										<td> <input type='checkbox' name='titulaire[]' value='<?php echo $donnees['num_licence'] ?>'></td><br>
										<input name="selec" type="hidden" value="<?php echo $donnees['num_licence'];?>" />
										<td> <input type='checkbox' name='remplacant[]' value='<?php echo $donnees['num_licence'] ?>'></td><br>
										<input name="selec" type="hidden" value="<?php echo $donnees['num_licence'];?>" />

								</tr>

							<?php	} ?>

							</table>

							<input name ="envoi" class="valider" type="submit" value="Valider"  />
							<input class="annuler" type="reset" value="Annuler"  />
							
						</form>	

					</div>	
			<?php	} ?>

		</div>	
				
	</body>
	
</html>