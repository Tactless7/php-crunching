<?php 
	$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
	$dico = explode("\n", $string);
 ?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Php Crunchings</title>
 </head>
 <body>

 	<h1>Exercices Dictionnaire</h1>
 	<div>Ce dictionnaire contient  mots</div>
 	<div>Il y a  mots qui font 15 caractères</div>
 	<div>Il y a  mots qui contiennent la lettre w</div>
 	<div>Il y a  mots qui contiennent la lettre q</div>
 	
 </body>
 </html>