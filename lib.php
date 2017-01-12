<?php 
	$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
	$brut = json_decode($string, true);
	$top = $brut["feed"]["entry"];

	
 ?>