<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <?php 
        $page='equipe';
        $souspage='tousj';
        
        require_once '../header/sidebarequipe.php';
		require '../header/headerfull.php'; ?>
		<div class="container">
        <div class="liste-joueur">
				<?php
					// Ouverture d'une connexion à la bdd contact
					//$bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');

			
					
				
					
						//$requete = "SELECT * FROM matchs WHERE est_fini=true";

						//$listematchs=$bdd->exec($requete);
						
							
						//$reponse = $bdd->query('SELECT * FROM joueur');
				
						// On affiche chaque entrée une à une
						//while ($donnees = $reponse->fetch()) { ?>

							<div class="match">
								<?php //echo $donnees['adversaire'] . $donnees['lieu'] . $donnees['score_domi'] . $donnees['score_ext'] . $donnees['contexte']?>
							</div>
						
                            <?php //} ?>
                            
                            <?php //$reponse->closeCursor(); ?>
                                
                            <?php//} ?>
                            
                            <?php// $count->closeCursor(); ?>
                            
                            <?php //$bdd = null; ?>

                        
					
					
					
						
						
				</div>
			
		
		</div>	
	</body>
	
</html>