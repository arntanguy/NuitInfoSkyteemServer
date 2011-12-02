<?php

function afficherAmis($tabamis)	{
	$data = $tabamis['data'];
	
	foreach ($data as $ami)	{
		// Récupérer l'image de profil
		?>
		<li>
		<img src="https://graph.facebook.com/<?php echo $ami['id']; ?>/picture"> <h3><?php echo $ami['name']; ?></h3>
		</li>
		<?php 
		
		 
	}
}

?>
