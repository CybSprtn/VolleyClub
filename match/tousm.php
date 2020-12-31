<!DOCTYPE html>
<html>
    <head>
        <title>Match</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href=" ./css/style.css">
    </head>
    
    <body>
        <?php 
        $page='match'; 
		$souspage='tousm';
		require '../header/sidebarmatch.php';		
		require '../header/headerfull.php'; ?>
		<div class="container">
			<div class="liste-match">
				
			<?php
					// Ouverture d'une connexion à la bdd contact
					// $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');

						// $requete = "SELECT * FROM matchs WHERE est_fini=true";

						// $listematchs=$bdd->exec($requete);
						
							
						// $reponse = $bdd->query('SELECT * FROM joueur');
				
						// On affiche chaque entrée une à une
						// while ($donnees = $reponse->fetch()) { ?>

							<!-- <div class="match"> -->
								<?php //echo $donnees['adversaire'] . $donnees['lieu'] . $donnees['score_domi'] . $donnees['score_ext'] . $donnees['contexte']?>
							<!-- </div>
						 -->
						<?php //} ?>
						
						<?php //$reponse->closeCursor();?> 
						
					<?php //} ?>
					
					<?php //$count->closeCursor(); ?>
					
					<?php// $bdd = null; ?>	
													
				</div>

				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas aperiam nostrum impedit odit, ab accusamus aliquam ut similique laborum nesciunt incidunt molestias quia culpa suscipit perspiciatis! Accusantium explicabo magnam ut.
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum eum mollitia quas minus unde placeat obcaecati perferendis repellendus eos ipsam, corrupti corporis quisquam modi cupiditate expedita sapiente magni laudantium fuga?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam dolorem ut molestiae! Fuga earum accusantium doloribus quos tempore, repellendus recusandae. Aperiam quae obcaecati delectus assumenda voluptatem, nihil recusandae officiis?
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit debitis sequi alias voluptatum sunt iste pariatur necessitatibus molestias voluptatibus deserunt eaque ex, dignissimos in facere qui veniam architecto culpa possimus.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat non excepturi distinctio maxime labore et ab voluptas optio sunt. Quia dolore ad, praesentium distinctio repellendus voluptatum reiciendis esse dolorum odit.
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, eius incidunt non reiciendis perferendis facere blanditiis veniam officiis nostrum nulla tenetur nisi nam ipsam architecto. Delectus voluptate corporis dolorem assumenda?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eaque modi perferendis, repudiandae eveniet et magni asperiores deserunt sunt quibusdam, accusamus at molestias officia, hic fugit pariatur eum labore voluptatum.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laborum excepturi dicta. Magnam mollitia optio sequi autem fugit aspernatur reprehenderit illo nihil. Repellendus aliquam voluptatibus nostrum laudantium doloremque veritatis cum?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius molestiae modi impedit delectus similique. Cumque, amet sint eaque est recusandae rem vitae esse, ut harum perspiciatis possimus corporis ad officia.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, est sit commodi sint ut corrupti. Accusantium soluta vitae dicta facere suscipit, obcaecati possimus quia molestias, recusandae in nostrum facilis dolore!
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam nulla maxime libero quis facilis est officiis cumque dolore suscipit eius nesciunt, modi repellendus eaque vel incidunt labore fuga quia accusantium?
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatem esse autem ut, quo id quasi placeat ad provident aliquid perspiciatis, dolorem inventore modi reprehenderit consequuntur. Reiciendis animi nam odio.
				</p>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas aperiam nostrum impedit odit, ab accusamus aliquam ut similique laborum nesciunt incidunt molestias quia culpa suscipit perspiciatis! Accusantium explicabo magnam ut.
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum eum mollitia quas minus unde placeat obcaecati perferendis repellendus eos ipsam, corrupti corporis quisquam modi cupiditate expedita sapiente magni laudantium fuga?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam dolorem ut molestiae! Fuga earum accusantium doloribus quos tempore, repellendus recusandae. Aperiam quae obcaecati delectus assumenda voluptatem, nihil recusandae officiis?
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit debitis sequi alias voluptatum sunt iste pariatur necessitatibus molestias voluptatibus deserunt eaque ex, dignissimos in facere qui veniam architecto culpa possimus.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat non excepturi distinctio maxime labore et ab voluptas optio sunt. Quia dolore ad, praesentium distinctio repellendus voluptatum reiciendis esse dolorum odit.
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, eius incidunt non reiciendis perferendis facere blanditiis veniam officiis nostrum nulla tenetur nisi nam ipsam architecto. Delectus voluptate corporis dolorem assumenda?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eaque modi perferendis, repudiandae eveniet et magni asperiores deserunt sunt quibusdam, accusamus at molestias officia, hic fugit pariatur eum labore voluptatum.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laborum excepturi dicta. Magnam mollitia optio sequi autem fugit aspernatur reprehenderit illo nihil. Repellendus aliquam voluptatibus nostrum laudantium doloremque veritatis cum?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius molestiae modi impedit delectus similique. Cumque, amet sint eaque est recusandae rem vitae esse, ut harum perspiciatis possimus corporis ad officia.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, est sit commodi sint ut corrupti. Accusantium soluta vitae dicta facere suscipit, obcaecati possimus quia molestias, recusandae in nostrum facilis dolore!
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam nulla maxime libero quis facilis est officiis cumque dolore suscipit eius nesciunt, modi repellendus eaque vel incidunt labore fuga quia accusantium?
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatem esse autem ut, quo id quasi placeat ad provident aliquid perspiciatis, dolorem inventore modi reprehenderit consequuntur. Reiciendis animi nam odio.
				</p>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas aperiam nostrum impedit odit, ab accusamus aliquam ut similique laborum nesciunt incidunt molestias quia culpa suscipit perspiciatis! Accusantium explicabo magnam ut.
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum eum mollitia quas minus unde placeat obcaecati perferendis repellendus eos ipsam, corrupti corporis quisquam modi cupiditate expedita sapiente magni laudantium fuga?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam dolorem ut molestiae! Fuga earum accusantium doloribus quos tempore, repellendus recusandae. Aperiam quae obcaecati delectus assumenda voluptatem, nihil recusandae officiis?
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit debitis sequi alias voluptatum sunt iste pariatur necessitatibus molestias voluptatibus deserunt eaque ex, dignissimos in facere qui veniam architecto culpa possimus.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat non excepturi distinctio maxime labore et ab voluptas optio sunt. Quia dolore ad, praesentium distinctio repellendus voluptatum reiciendis esse dolorum odit.
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, eius incidunt non reiciendis perferendis facere blanditiis veniam officiis nostrum nulla tenetur nisi nam ipsam architecto. Delectus voluptate corporis dolorem assumenda?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eaque modi perferendis, repudiandae eveniet et magni asperiores deserunt sunt quibusdam, accusamus at molestias officia, hic fugit pariatur eum labore voluptatum.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laborum excepturi dicta. Magnam mollitia optio sequi autem fugit aspernatur reprehenderit illo nihil. Repellendus aliquam voluptatibus nostrum laudantium doloremque veritatis cum?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius molestiae modi impedit delectus similique. Cumque, amet sint eaque est recusandae rem vitae esse, ut harum perspiciatis possimus corporis ad officia.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, est sit commodi sint ut corrupti. Accusantium soluta vitae dicta facere suscipit, obcaecati possimus quia molestias, recusandae in nostrum facilis dolore!
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam nulla maxime libero quis facilis est officiis cumque dolore suscipit eius nesciunt, modi repellendus eaque vel incidunt labore fuga quia accusantium?
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatem esse autem ut, quo id quasi placeat ad provident aliquid perspiciatis, dolorem inventore modi reprehenderit consequuntur. Reiciendis animi nam odio.
				</p>

			
		
		</div>	
	</body>
	
</html>