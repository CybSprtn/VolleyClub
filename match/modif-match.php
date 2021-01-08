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
                
                 // 	Ouverture d'une connexion à la bdd contact
                 try{
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                    echo 'Connexion échouée :' . $e->getMessage();
                }

				if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

                        $datem=$_POST['datem'];
                        $heure=$_POST['heure'];
                        $adversaire=$_POST['adversaire'];
                        $lieu=$_POST['lieu'];
                        $score_domi = $_POST['score_domi'];
                        $score_ext = $_POST['score_ext'];
                        $contexte=$_POST['contexte'];
                        $id=$_POST['modif'];


                    $requete = "UPDATE matchs SET date = '$datem', heure = '$heure', adversaire = '$adversaire', lieu = '$lieu', score_domi = '$score_domi', score_ext = '$score_ext', contexte = '$contexte' WHERE id_match = '$id'";
                    
                    $bdd->exec($requete);

                    echo "Le match a été modifié avec succès."

                   ?> <h2><a href="match.php">Voir la liste des matchs</a></h2>

         <?php } else {

                    $requetejoueur = $bdd->query('SELECT * FROM joueur ORDER BY nom');

                    $donnees = $requetejoueur->fetchAll();  

                    // Compter le nb de lignes
                    //$nb_lignes = substr_count($resultat, "<br/>");
                    //echo $nb_lignes;
                    ?>
         
                    <div class="form-add-match">

                        <form action="modif-match.php" method="post" class="form-match" enctype="multipart/form-data">
                            
                            Date <input type="date" name="datem" /> <br> <br>
                            Heure   <input type="time" name="heure" /> <br> <br>
                            Adversaire <input type="text" name="adversaire" /> <br> <br>
                            Lieu de rencontre  <input type="text" name="lieu" /> <br> <br>
                            Score Karasuno
                            <select class="select_right" name="score_domi">

                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                
                            </select>  <br> <br>
                            Score Extérieur
                            <select class="select_right" name="score_ext">

                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                
                            </select>  <br> <br>
                            Contexte
                            <select class="select_right" name="contexte">

                                <option value="Championnat">Championnat</option>
                                <option value="Coupe Départementale">Coupe Départementale</option>
                                <option value="Coupe Nationale">Coupe Nationale</option>
                                <option value="Coupe Regionale">Coupe Régionale</option>
                                
                            </select> 	<br> <br>	

                            <h3 class=inserer_joueur>  - Insérer les joueurs - </h3> <br>

                            <div class="select_titu">

                                <h4 class=select_joueur> Titulaires </h4> <br>

                                <select required class="titulaire" name="titu1">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>

                                </select> 	<br> <br>


                                <select required class="titulaire" name="titu2">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select required class="titulaire" name="titu3">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select required class="titulaire" name="titu4">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select required class="titulaire" name="titu5">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select required class="titulaire" name="titu6">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>

                            </div>

                            <div class="select_remp">

                                <h4  class=select_joueur> Remplaçants </h4>

                                <br>

                                <select class="remplacant" name="remp1">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select class="remplacant" name="remp2">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select class="remplacant" name="remp3">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select class="remplacant" name="remp4">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select class="remplacant" name="remp5">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>


                                <select class="remplacant" name="remp6">
                                <option value="">-- Selectionner un joueur --</option>
                                <?php
                                foreach ($donnees as $d) { ?>
                                    <option value="<?php echo $d['nom'] . ' ' . $d['prenom'] ;?>"><?php echo $d['nom'] . ' ' . $d['prenom'];?></option>
                                <?php
                                } ?>
                                    
                                </select> 	<br> <br>

                                <?php $requetejoueur->closeCursor(); ?>

                            </div>
                                
                            <?php
                            $nbjoueurs = 0;

                            ?>
                            Vous avez sélectionnez joueurs.

                            <input class="valider" type="submit" value="Valider"  />
                            <input class="annuler" type="reset" value="Annuler"  />
                            <input name="modif" type="hidden" value="<?php echo $_POST['modif'];?>">
                            
                        </form>

            <?php    } ?>
            </div>

    </body>
	
</html>