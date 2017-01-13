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

	function biggestCategory($array){ //A refactoriser
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

	function mostFrequentDirector($array){ //A refactoriser
		$directors = [];
		foreach ($array as $value) {
			$currentDirector = $value['im:artist']['label'];
			if($directors[$currentDirector]){
				$directors[$currentDirector]++;
			} else {
				$directors[$currentDirector] = 1;
			}
		}
		$mostFrequentDirector;
		$mostFrequentDirectorValue = 0;
		foreach ($directors as $key => $value) {
			if($value > $mostFrequentDirectorValue){
				$mostFrequentDirectorValue = $value;
				$mostFrequentDirector = $key;
			}
		}
		return $mostFrequentDirector;
	}

	function buyingPriceSum($array){
		$total = 0;
		for($i = 0 ; $i < 10 ; $i++){
			$buyingPrice = $array[$i]['im:price']['attributes']['amount'];
			$total += $buyingPrice;
		}
		return $total;
	}

	function rentalPriceSum($array){
		$total = 0;
		for($i = 0 ; $i < 10 ; $i++){
			$rentalPrice = $array[$i]['im:rentalPrice']['attributes']['amount'];
			$total += $rentalPrice;
		}
		return $total;
	}

	function mostMoviesMonth($array){
		$months = [];
		foreach ($array as $value) {
			$currentMonth = substr($value['im:releaseDate']['label'], 5, 2);
			if($months[$currentMonth]){
				$months[$currentMonth]++;
			} else {
				$months[$currentMonth] = 1;
			}
		}
		$mostFrequentMonth;
		$mostFrequentMonthValue = 0;
		foreach ($months as $key => $value) {
			if($value > $mostFrequentMonthValue){
				$mostFrequentMonthValue = $value;
				$mostFrequentMonth = $key;
			}
		}
		return $mostFrequentMonth;
	}

	function helpSort($a, $b){
		if($a['price'] === $b['price']){
			return ($a['position'] < $b['position']) ? -1 : 1;
		} else {
			return ($a['price'] < $b['price']) ? -1 : 1;
		}
	}

	function replaceMostExpensive($array, $elementName, $elementPrice, $elementPos){
		if($elementPrice < end($array)['price']){
			return true;
		} 
		else if($elementPrice === end($array)['price'] && $elementPos < end($array)['position']){
			return true;
		}
		return false;
	}

	function cheaperMovies($array){
		$topCheapest = [];
		foreach ($array as $key => $value) {
			$name = $array[$key]['im:name']['label'];
			$price = floatval($value['im:price']['attributes']['amount']);
			$position = $key;

			if(count($topCheapest) < 10){
				$topCheapest[$name] = array('price' => $price, 'position' => $position);
			} else {
				uasort($topCheapest, 'helpSort');
				if (replaceMostExpensive($topCheapest, $name, $price, $position)){
					array_pop($topCheapest);
					$topCheapest[$name] = array('price' => $price, 'position' => $position);
				}
			}
		}
		foreach($topCheapest as $key => $value) { 
			echo '<li>'. $key .'</li>';
		}
	}

 ?>