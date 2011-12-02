<?php
		include('includes/includes.php');

		// Login or logout url will be needed depending on current user state.
		if ($user) {
			$logoutUrl = $facebook->getLogoutUrl();
		} else {
			$loginUrl = $facebook->getLoginUrl(array('scope' => 'read_friendlists'));
		}

		
	?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyGift</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <link rel="stylesheet" href="style.css" type="text/css"/>
		<script type="text/javascript" charset="utf-8">
			<?php
				if(!empty($_GET['state'])) {
			?>
					window.location = 'http://easygift.druil.net/friends.php/';
			<?php
				}
			?>
		</script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="phonegap.js"></script>
		<script type="text/javascript" charset="utf-8" src="phoneapp.js"></script>
  </head>
  <body onload="onLoad();">
    <!-- page -->
    <div data-role="page" id="page">
      <!-- header -->
      <div data-role="header" id="header">
        <h1>EasyGift <?php 
						if($user) {
							echo(" - ".$user_profile['name']);
						} ?></h1>
        <img src="images/icones/quit.png" alt="quit" class="quit">
      </div>
      <!-- content -->
      <div data-role="content" id="content">
        <img src="images/logo.png" alt="Logo" class="logo">
        <?php if ($user): ?>
					<a href="<?php echo $logoutUrl; ?>" data-role="button" data-icon="delete">Logout</a>
					<a href="friends.php" data-role="button" data-icon="arrow-r" data-iconpos="right">Mes amis</a>
				<?php else: ?>
					<a href="<?php echo $loginUrl; ?>" data-role="button" data-icon="check" >Connect with Facebook</a>
				<?php endif ?>
      </div>
    </div>
  </body>
</html>
