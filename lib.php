<?php 
	$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
	$brut = json_decode($string, true);
	$top = $brut["feed"]["entry"];

	function topTen($array){
		for($i = 0 ; $i < 10 ; $i++) {
			echo '<li>'. $array[$i]['im:name']['label'] .'</li>';
		}
	}

	function searchPosition($array, $title){
		for($i = 0 ; $i < count($array) ; $i++){
			if($array[$i]['im:name']['label'] === $title){
				return $i + 1; //Index commençant à 0
			}
		}
	}

	function getDirector($array, $title){
		foreach ($array as $value) {
			if($value['im:name']['label'] === $title){
				return $value['im:artist']['label'];
			}
		}
	}

	function filmsBeforeDate($array, $year){
		foreach ($array as $value) {
			$releaseYear = substr($value['im:releaseDate']['label'], 0, 4);
			if($releaseYear < $year){
				$count++;
			}
		}
		return $count;
	}

	// function mostRecentMovie($array){
	// 	$mostRecentYear = 0;
	// 	foreach ($array as $value) {
	// 		$releaseYear = substr($value['im:release']['label'], 0, 4);
	// 		var_dump($releaseYear);
	// 		if($releaseYear > $mostRecentYear){
	// 			$mostRecent = $value['im:name']['label'];
	// 		}
	// 	}
	// 	return $mostRecent;
	// }
 ?>