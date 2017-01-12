<?php include 'lib.php' ?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Php Crunchings</title>
 </head>
 <body>

 	<h1>Exercices Films</h1>
 	<div>
 		<h2>Top 10 des films</h2>
 		<ol><?php topTen($top) ?></ol>
 	</div>
 	<div>Classement du film Gravity : <?= searchPosition($top, 'Gravity') ?>ème</div>
 	<div>Réalisateur de The Lego Movie : <?= getDirector($top, 'The LEGO Movie') ?></div>
 	<div>Nombre de films sortis avant 2000 : </div>
 	<div>Film le plus récent : </div>
 	<div>Film le plus vieux : </div>
 	<div>Catégorie de film la plus représentée : </div>
 	<div>Réalisateur le plus présent dans le top 100</div>
 	<div>Prix d'achat du Top 10 sur itunes : </div>
 	<div>Prix de location du Top 10 sur itunes : </div>
 	<div>Mois avec le plus de sorties au cinémat : </div>
 	<div>Les 1à meilleurs films à voir avec un petit budget : </div>

 	
 </body>
 </html>