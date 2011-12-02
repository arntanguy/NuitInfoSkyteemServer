<?php
  include('includes/includes.php');
  include('similar.php');
  $ami_Id = $_GET["id"];
  $name = $_GET["name"];
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>EasyGift - Gifts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <link rel="stylesheet" href="/style.css" type="text/css"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="phonegap.js"></script>
    <script type="text/javascript" charset="utf-8" src="phoneapp.js"></script>
  </head>

  <body onload="onLoad();">
    <div data-role="page">
      <div data-role="header" id="header">
        <h1>EasyGift - Gifts</h1>
        <img src="images/icones/quit.png" alt="quit" class="quit" onClick="redirect('index.php')">
        <img src="images/icones/back.png" alt="back" class="back" onClick="redirect('friends.php')">
      </div>
      <div data-role="content">
        <div id="offer_to">
        	
          <p>: <?php echo $name; ?></p>
        </div>
        <ul data-role="listview" data-inset="true" data-filter="true">
          <?php 
          // Chercher un film 
          $movies = $facebook->api("/$ami_Id/movies");
          
          
          // Récupérer le premier film
          //
          $films = $movies["data"];

          if (!empty($films))	{
          	$titre = $films[0]["name"];

		//	echo $titre;
          	
          	// Chercher films en rapport
          	$similarid = similar($titre);
          	
          	// Prendre les deux premiers
          	for($i = 0 ; i < 2 ; $i++)	{
          		 ?>
          		 <li><a href="#" ui-li-icon="image/icones/sortie-icone.png"><?php echo $similarid[$i]; ?></a></li>
          		 <?php 
          	}

          }
          else	{
          	     ?>
          		 <li><a href="#" ui-li-icon="image/icones/sortie-icone.png"><?php echo "rien trouvé"; ?></a></li>
          		 <?php 
          }

/*
          // Chercher un groupe
          $musics = $facebook->api("/$ami_Id/music");
          
          // Récupérer le premier film
          //
          if (!empty($musics["data"]))	{
          
          $band = $musics["data"];
          $titre = $band[0]["name"]; 
          
         // echo $titre;
          
          // Chercher groupe en rapport
          	$similarid = similar($titre);
          	
          	// Prendre les deux premiers
          	for($i = 0 ; i < 2 ; $i++)	{
          		 ?>
          		 <li><a href="#" ui-li-icon="image/icones/sortie-icone.png"><?php echo $similarid[$i]; ?></a></li>
          		 <?php
          	}
          }
          */
          ?>
        </ul>
      </div>
    </div>
  </body>
</html>

