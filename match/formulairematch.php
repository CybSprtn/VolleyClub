+<!DOCTYPE html>
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

				
				if (isset($_POST['adversaire'])) {

					if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

						$datem=$_POST['datem'];
						$heure=$_POST['heure'];
						$adversaire=$_POST['adversaire'];
						$lieu=$_POST['lieu'];
						$est_fini= 0;
						$score_domi = 0;
						$score_ext = 0;
						$domicile = 0;
						$contexte=$_POST['contexte'];
						$idset=1;
						
					}

					// 	Ouverture d'une connexion à la bdd contact
					try{
						$bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
					} catch (PDOException $e) {
						echo 'Connexion échouée :' . $e->getMessage();
					}
							
					// 	Vérifier si les attributs sont déjà dans la base de données*/
						$existe = 'SELECT * FROM matchs WHERE datem=:datem AND heure=:heure';
						
						$count = $bdd->prepare($existe);
						$count->execute(array(':datem' => $datem, ':heure' => $heure));					
						//   print_r($count);
						if ($count->rowCount()!=0) {
							
							echo "Le match existe déjà.";
							
						} else {
						
							$requete = "INSERT INTO matchs(date, heure, adversaire, lieu, est_fini, score_domi, score_ext, domicile, contexte, id_set) VALUES ('$datem','$heure','$adversaire','$lieu','$est_fini','$score_domi','$score_ext','$domicile','$contexte','$idset')";
							//var_dump($requete);	
							$bdd->exec($requete);
							
							echo "Match ajouté ! <br/> <br/> Voici les matchs existants : <br/> <br/>";
						
							$reponse = $bdd->query('SELECT * FROM matchs');
			
							// On affiche chaque entrée une à une
							while ($donnees = $reponse->fetch()) {

								echo "Adversaire : " . $donnees['adversaire'] . " | Date : " . $donnees['date'] . " | Heure : " . $donnees['heure'] . "<br/>";
						
							}
							
							$count->closeCursor(); // Termine le traitement de la requête
							
							$bdd = null;
					
						}

				} else {

					?>
					<div class="form-add-match">				

						<form action="formulairematch.php" method="post" class="form-match" enctype="multipart/form-data">
						
							Date <input type="date" name="datem" /> <br> <br>
							Heure   <input type="time" name="heure" /> <br> <br>
							Adversaire <input type="text" name="adversaire" /> <br> <br>
							Lieu de rencontre  <input type="text" name="lieu" /> <br> <br>
							<h4>Contexte</h4>
							<select name="contexte">

								<option value="championnat">Championnat</option>
								<option value="coupe-departementale">Coupe Départementale</option>
								<option value="coupe-nationale">Coupe Nationale</option>
								<option value="coupe-regionale">Coupe Régionale</option>
								
							</select> 						
							<input class="btn" type="reset" value="Annuler"  />
							<input class="btn" type="submit" value="Valider"  />
							
						</form>	

					</div>	
			<?php	} ?>

		</div>	
				
	</body>
	
</html>

<div class="produits">
					<?php 
					if(!empty($resultatRecherche)){
						foreach($resultatRecherche as $prod): ?>
					<div class="produit">
						<a class="lien_produit" href="produit.php?ID_Produit=<?=$prod['ID_Produit']?>">
							<img src="<?=$prod['photo']?>" width="200" height="200" alt="<?=$prod['denomination']?>">
						</a>
						<div class="specs_produits">
							<a class="lien_produit" href="produit.php?ID_Produit=<?=$prod['ID_Produit']?>">
           	    				<div class="name"><?=$prod['denomination']?></div>
           	    			</a>
							<div class="price"><?=$prod['prix_unitaire']?>€
								<div class="price_per_kilo"> (soit <?=$prod['prix_unitaire']?>€/kg)</div>
								<!--penser à rajouter un attribut "prix au kilo" dans la bdd-->
							</div>
							<div class="desc"><?=$prod['description']?></div>
						</div>
					</div>
				<?php
						?>
				</tr>
				<?php endforeach; 
				} ?>