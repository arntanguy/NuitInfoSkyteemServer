<?php
require_once 'lib/xmlparser.php';

function similar($name) {
    // construire l'url
    $url = "http://www.tastekid.com/ask/ws?q=";

    $url.= urlencode($name); 
    // id and password
    $url.="&f=easygi8501&k=y2rjzjdmyta5";

    $result = file_get_contents($url);

    $movies = new SimpleXMLElement($result);

    $similar = array();
    foreach ($movies->xpath("//resource") as $content) {
        echo $content->name;
        array_push($similar, (string)$content->name);
    }
    return $similar;
}
?>

</body>
