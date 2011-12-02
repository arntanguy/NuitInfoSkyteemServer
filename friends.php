<?php
	include('includes/includes.php');

	// Create our Application instance (replace this with your appId and secret).
	$facebook = new Facebook(array(
		'appId'  => $api_key,
		'secret' => $secret,
	));

	// Get User ID
	$user = $facebook->getUser();

	// We may or may not have this data based on whether the user is logged in.
	//
	// If we have a $user id here, it means we know the user is logged into
	// Facebook, but we don't know if the access token is valid. An access
	// token is invalid if the user logged out of Facebook.

	if ($user) {
		try {
		  // Proceed knowing you have a logged in user who's authenticated.
		  $user_profile = $facebook->api('/me');
		} catch (FacebookApiException $e) {
		  error_log($e);
		  $user = null;
		}
	}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>EasyGift - Friends</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="phonegap.js"></script>      
    <script type="text/javascript" charset="utf-8" src="phoneapp.js"></script>      

 </head>

 <body onload="onLoad();">
<div data-role="page" id="page">

    <div data-role="header" id="header">
        <h1>EasyGift - Friends</h1>
        <img src="/images/icones/quit.png" alt="quit" class="quit" onClick="redirect('index.html')">
        <img src="/images/icones/back.png" alt="back" class="back" onClick="redirect('index.html')">
  </div>
	<div data-role="content" id="content">	
        <div id="offer_to">
            <p>Choisisser un ami</p>
        </div>
        <ul data-role="listview" data-inset="true" data-filter="true">
						<?php
						// Récupérer la liste d'amis
						$friends = $facebook->api('/me/friends');
						// Afficher la liste d'amis
						$data = $friends['data'];
	
						foreach ($data as $ami)	{
						?>
							<li style="min-height:50px;padding:0px;padding-left:70px;">
								<img src="https://graph.facebook.com/<?php echo $ami['id']; ?>/picture"> <h3><?php echo $ami['name']; ?></h3>
							</li>
						<?php
						}
						?>
        </ul>
	</div>

</div>

 </body>
</html>
