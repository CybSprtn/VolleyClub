<!DOCTYPE html>
<html>
    <head>
        <title>Joueur</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <div class="container">
        <?php 
				$page='form-modif-joueur';
				require '../header/headerfull.php'; ?>
			

                <?php
                
                 // 	Ouverture d'une connexion à la bdd contact
                 try{
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
                } catch (PDOException $e) {
                    echo 'Connexion échouée :' . $e->getMessage();
                }

				if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['taille']) && isset($_POST['poids']) && isset($_POST['statut']) && isset($_POST['poste_pref'])) {

                    $nom=$_POST['nom'];
                    $prenom=$_POST['prenom'];
                    $date_naissance=$_POST['date_naissance'];
                    $taille=$_POST['taille'];
                    $poids=$_POST['poids'];
                    $statut =$_POST['statut'];
                    $poste_pref=$_POST['poste_pref'];
                    $num_licence=$_POST['modif'];
    
    
                    // Ouverture d'une connexion à la bdd contact
                    $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
    
                    if (!empty($_FILES['photo']['name'])) {
                        $taillemax = 2097152; //2 mo max
                        $extensionsvalides = array('jpg','jpeg','png');
                        if($_FILES['photo']['size'] <= $taillemax) {
                            $extensionupload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1)); //Vérifie l'extension de la piece jointe en enlvenant le "." et tout en minuscule
                            if (in_array($extensionupload, $extensionsvalides)) {
                                $photo = $_FILES['photo']['name'];
                                $uniquename = md5(uniqid(rand(),true));
                                $fileext = "." . $extensionupload;
                                $photo = "../photos-m3104/" . $photo;
                                $temp=$_FILES['photo']['tmp_name'];
                                $result =move_uploaded_file ($temp, $photo);
                                $photo = $_FILES['photo']['name'];
                            } else {
                                $msg = "La photo doit être au format png, jpg ou jpeg.";
                            }
                        } else {
                            $msg = "La photo ne doit pas dépasser 2 mo.";
                        }
                    }
    
                    if (isset($msg)) {
                        echo $msg;
                    }

                    $requete = $bdd->prepare('UPDATE joueur SET prenom = :prenom, nom = :nom, date_naissance = :date_naissance, taille=:taille, poids=:poids, photo=:photo, statut=:statut, poste_pref=:poste_pref WHERE num_licence=:num_licence');
                    $requete->execute(array(
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'date_naissance' => $date_naissance,
                        'taille' => $taille,
                        'poids' => $poids,
                        'photo'=> $photo,
                        'poids' => $poids,
                        'photo' => $photo,
                        'statut' => $statut,
                        'poste_pref' => $poste_pref,
                        'num_licence' => $num_licence
                        ));

                    echo "Le joueur a été modifié avec succès.";


                   ?> <h2><a href="equipe.php">Voir la liste des joueur</a></h2>

         <?php } else {

                    $requetejoueur = $bdd->query('SELECT * FROM joueur ORDER BY nom');

                    $donnees = $requetejoueur->fetchAll();  

                    ?>
         
                    <div class="form-add-joueur">
                    
                    <form action="modif-joueur.php" method="post" class="form-joueur" enctype="multipart/form-data">
                    
                        
                    Nom : <input type="text" name="nom" /> <br> <br>
                    Prénom : <input type="text" name="prenom" /> <br> <br>
                    Photo : <input type="file" name="photo" /> <br> <br>
                    Date de naissance : <input type="date" name="date_naissance" /> <br> <br>
                    Taille : <input type="text" name="taille" /> <br> <br>
                    Poids : <input type="text" name="poids" /> <br> <br>
                    Statut : 
                    <select name="statut">
                        <option value="actif">Actif</option>
                        <option value="bléssé">Bléssé</option>
                        <option value="suspendu">Suspendu</option>
                        <option value="absent">Absent</option>
                    </select> <br> <br>	
                    Poste préféré :
                    <select name="poste_pref">
                        <option value="arriere_centre">Arrière centre</option>
                        <option value="arriere_gauche">Arrière gauche</option>
                        <option value="arriere_droit">Arrière droit</option>
                        <option value="avant_centre">Avant centre</option>
                        <option value="avant_gauche">Avant gauche</option>
                        <option value="avant_droit">Arrière droit</option>
                        <option value="passeur">Passeur</option>
                        <option value="libero"> Libéro</option>
                    </select> <br> <br>	
                    <input class="valider"type="submit" value="Valider"  />
                    <input class="annuler"type="reset" value="Annuler"  />
                    <input name="modif" type="hidden" value="<?php echo $_POST['modif'];?>">

                    </form>
                </div>

            <?php    } ?>
            </div>

    </body>
	
</html>