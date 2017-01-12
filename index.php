<?php 
	$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
	$dico = explode("\n", $string);

	function charNumber($array){
		foreach($array as $value){
			if (strlen($value) === 15){
				$count++;
			}
		}
		return $count;
	}

	function ifLetter($array, $string){
		foreach ($array as $value) {
			if(strpos($value, $string)){
				$count++;
			}
		}
		return $count;
	}

	function ifLastLetter($array, $string){
		foreach ($array as  $value) {
			$lastLetter = substr($value, -1);
			if($lastLetter === $string){
				var_dump($value);
				$count++;
			}
		}
		return $count;
	}
 ?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Php Crunchings</title>
 </head>
 <body>

 	<h1>Exercices Dictionnaire</h1>
 	<div>Ce dictionnaire contient <?= count($dico)?> mots</div>
 	<div>Il y a <?= charNumber($dico) ?> mots qui font 15 caractères</div>
 	<div>Il y a <?= ifLetter($dico, 'w') ?> mots qui contiennent la lettre w</div>
 	<div>Il y a <?= ifLastLetter($dico, 'q') ?> mots qui se terminent par la lettre q</div>

 	
 </body>
 </html>