<?php
	creatURL('/music/artist', "The Police", "");
	
	function creatURL($type, $name, $album){
        if(empty($album)) $album = "[]";

		$guill = "%22";
		$space = "%20";
		
		$url = 'https://www.googleapis.com/freebase/v1/mqlread?query=';
		
		$arr = array("type"=>$type,"name"=>$name,"album"=>$album);
		$urlsuite = json_encode($arr);
		
		$url = $url.$urlsuite;
		echo "\n".$url;
        // XXX HACK : fix json_encode return value to make it work
		$url = str_replace(':"[]"', ':[]', $url);
        $url = str_replace('"', $guill, $url);
        $url = str_replace(' ', $space, $url);
        $url = str_replace('\\', '', $url);
		
		echo "\n".$url;
		getObjJSON($url);
		
		$url = 'https://www.googleapis.com/freebase/v1/mqlread?query={%22type%22:%22/music/artist%22,%22name%22:%22The%20Police%22,%22album%22:[]}';
                https://www.googleapis.com/freebase/v1/mqlread?query={%22type%22:%22/music/artiste%22,%22name%22:%22The%20Police%22,%22album%22:[]}
	}
	
	function getObjJSON($url){
		$code_html=file_get_contents($url);
		$obj = json_decode($code_html);
		var_dump($obj);
	}
?>
