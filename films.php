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
 	<div>Nombre de films sortis avant 2000 : <?= filmsBeforeDate($top, 2000) ?></div>
 	<div>Film le plus récent : <?= mostRecentMovie($top); ?></div>
 	<div>Film le plus vieux : <?= olderMovie($top) ?> </div>
 	<div>Catégorie de film la plus représentée : <?= biggestCategory($top) ?></div>
 	<div>Réalisateur le plus présent dans le top 100 : <?= mostFrequentDirector($top) ?></div>
 	<div>Prix d'achat du Top 10 sur itunes : <?= buyingPriceSum($top) ?> USD</div>
 	<div>Prix de location du Top 10 sur itunes : <?= rentalPriceSum($top) ?> USD (4 films impossibles à louer)</div>
 	<div>Mois avec le plus de sorties au cinéma : <?= mostMoviesMonth($top) ?></div>
 	<div><h2>Les 10 meilleurs films à voir avec un petit budget : </h2>
 		<ol><?= cheaperMovies($top) ?></ol>
 	</div>

 	
 </body>
 </html>