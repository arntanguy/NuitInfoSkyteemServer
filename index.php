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
    <title>EasyGift</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <link rel="stylesheet" href="style.css" />
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
    <script type="text/javascript" charset="utf-8">
      // This is your app's init method. Here's an example of how to use it
      function onLoad() {
        document.addEventListener("deviceready", onDR, false);
      }

      function onDR(){
        // add event listener when the backbutton is pressed
        document.addEventListener("backbutton", backKeyDown, true);
      }

      // Handles how the application is deleted:
      function backKeyDown() {
        //TODO
        //alert('go back!');
        navigator.app.exitApp()
      }
    </script>
  </head>
  <body onload="onLoad();">
    <!-- page -->
    <div data-role="page" id="page">
      <!-- header -->
      <div data-role="header" id="header">
        <h1>EasyGift - <?php echo $user_profile ?></h1>
        <img src="images/icones/quit.png" alt="quit" class="quit">
      </div>
			<?php echo $_SERVER["REQUEST_URI"] ?>
      <!-- content -->
      <div data-role="content" id="content">
        <img src="images/logo.png" alt="Logo" class="logo">
        <?php if ($user): ?>
					<a href="<?php echo $logoutUrl; ?>" data-role="button" data-icon="delete">Logout</a>
				<?php else: ?>
					<a href="<?php echo $loginUrl; ?>" data-role="button" data-icon="check" >Connect with Facebook</a>
				<?php endif ?>
      </div>
    </div>
  </body>
</html>
