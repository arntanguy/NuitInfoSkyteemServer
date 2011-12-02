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
    <div data-role="page">

    <div data-role="header" id="header">
        <h1>EasyGift - Filter</h1>
        <img src="images/icones/quit.png" alt="quit" class="quit" onClick="redirect('index.html')">
        <img src="images/icones/back.png" alt="back" class="back" onClick="redirect('gifts.html')">
  </div>
        <div data-role="content">	
            <h1>Filter searches</h1>

            <ul data-role="listview" data-inset="true" data-filter="true">
                <li><a href="#" ui-li-icon="image/icones/sortie-icone.png">Cadeau de Geek</a></li>
                <li><a href="#">Autre cadeau</a></li>
            </ul>
        </div>
    </div>

 </body>
</html>

