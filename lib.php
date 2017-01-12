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
		$count = 0;
		foreach ($array as $value) {
			$releaseYear = substr($value['im:releaseDate']['label'], 0, 4);
			if($releaseYear < $year){
				$count++;
			}
		}
		return $count;
	}

	function mostRecentMovie($array){
		$mostRecentDate = 0;
		foreach ($array as $value) {
			$releaseDate = substr($value['im:releaseDate']['label'], 0, 10);
			$releaseDate = str_replace('-', '', $releaseDate); 
			if($releaseDate > $mostRecentDate){
				$mostRecentDate = $releaseDate;
				$mostRecent = $value['im:name']['label'];
			}
		}
		return $mostRecent;
	}

	function olderMovie($array){
		$olderDate = 30000101;
		foreach ($array as $value) {
			$releaseDate = substr($value['im:releaseDate']['label'], 0, 10);
			$releaseDate = str_replace('-', '', $releaseDate); 
			if($releaseDate < $olderDate){
				$olderDate = $releaseDate;
				$older = $value['im:name']['label'];
			}
		}
		return $older;
	}

	function biggestCategory($array){
		$categories = [];
		foreach ($array as $value) {
			$currentCategory = $value['category']['attributes']['label'];
			if($categories[$currentCategory]){
				$categories[$currentCategory]++;
			} else {
				$categories[$currentCategory] = 1;
			}
		}
		$biggestCategory;
		$biggestCategoryValue = 0;
		foreach ($categories as $key => $value) {
			if($value > $biggestCategoryValue){
				$biggestCategoryValue = $value;
				$biggestCategory = $key;
			}
		}
		return $biggestCategory;
	}
 ?>