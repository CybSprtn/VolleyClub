<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <?php 
        $page='suppr';
        require '../header/headerfull.php'; ?>
        <?php

            if (isset($_POST['datem']) && !empty($_POST['heure']) && ($_POST['adversaire']) && ($_POST['lieu'])) {

                $datem=$_POST['datem'];
                $heure=$_POST['heure'];
                $adversaire=$_POST['adversaire'];
                $lieu=$_POST['lieu'];
            }
            // 	Ouverture d'une connexion à la bdd contact
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
            } catch (PDOException $e) {
                echo 'Connexion échouée :' . $e->getMessage();
            }
              
            // 	Vérifier si les attributs sont déjà dans la base de données*/
                $existe = 'SELECT * FROM matchs WHERE datem=:datem AND heure=:heure AND adversaire=:adversaire AND lieu=:lieu';
                
                $count = $bdd->prepare($existe);
                $count->execute(array(':datem' => $datem, ':heure' => $heure, ':adversaire' => $adversaire, ':lieu' => $lieu));

                if ($count->rowCount()!=0) {
                    
                    echo "Le match existe déjà.";
                    
                } //else { ?>

    </body>
	
    </html>
