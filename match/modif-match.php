<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <div class="container">
        <?php 
				$page='form-modif-match';
				require '../header/headerfull.php'; ?>
			

				<?php

				if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

                        $datem=$_POST['datem'];
                        $heure=$_POST['heure'];
                        $adversaire=$_POST['adversaire'];
                        $lieu=$_POST['lieu'];
                        $score_domi = $_POST['score_domi'];
                        $score_ext = $_POST['score_ext'];
                        $contexte=$_POST['contexte'];
                        $id=$_POST['modif'];

                    // 	Ouverture d'une connexion à la bdd contact
                    try{
                        $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                    } catch (PDOException $e) {
                        echo 'Connexion échouée :' . $e->getMessage();
                    }
                        

                    $requete = "UPDATE matchs SET date = '$datem', heure = '$heure', adversaire = '$adversaire', lieu = '$lieu', score_domi = '$score_domi', score_ext = '$score_ext', contexte = '$contexte' WHERE id_match = '$id'";
                   
                    $bdd->exec($requete);

                    echo "Le match a été modifié avec succès."

                   ?> <h2><a href="match.php">Voir la liste des matchs</a></h2>

         <?php } else { ?>
         
                            
            <div class="form-add-match">

                     <form action="modif-match.php" method="post" class="form-match" enctype="multipart/form-data">
						
                        Date <input type="date" name="datem" /> <br> <br>
                        Heure   <input type="time" name="heure" /> <br> <br>
                        Adversaire <input type="text" name="adversaire" /> <br> <br>
                        Lieu de rencontre  <input type="text" name="lieu" /> <br> <br>
                        Score Karasuno
                        <select name="score_domi">

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            
                        </select>  <br> <br>
                        Score Extérieur
                        <select name="score_ext">

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            
                        </select>  <br> <br>
                        Contexte
                        <select name="contexte">

                            <option value="Championnat">Championnat</option>
                            <option value="Coupe Départementale">Coupe Départementale</option>
                            <option value="Coupe Nationale">Coupe Nationale</option>
                            <option value="Coupe Regionale">Coupe Régionale</option>
                            
                        </select> 	<br> <br>			
                        <input class="valider" type="submit" value="Valider"  />
                        <input class="annuler" type="reset" value="Annuler"  />
                        <input name="modif" type="hidden" value="<?php echo $_POST['modif'];?>">
                        
                    </form>	
            </div>	

            <?php    } ?>
            </div>

    </body>
	
</html>