<!doctype html>
<html >
  <head>
    <title>test</title>

  </head>

<body>
<?php

// construire l'url
$url = "http://www.tastekid.com/ask/ws?q=";

$artist = "300";

$url.= urlencode($artist); 

$url.= "&format=JSON";

//$json = file_get_contents($url);


//$result = json_decode($json);

$result = file_get_contents('testjson.html');

var_dump($result);

var_dump($result->Similar);
?>



</body>