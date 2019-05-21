<?php
include_once('./parametres.php');
$page="";
try
{
    $bdd = new PDO( DB_PDO_DSN, DB_USERNAME, DB_PASSWORD);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
require 'lectures.php';

$type_activation = lectureTypeActivation($bdd);
list ($indicatif_station, $ville, $departement, $service, $site_implentation) = lectureStationLocale($bdd);

if (isset($_POST['entrer_infos'])) {
	$page = "session.php";
}
elseif (isset($_POST['edit_membres'])) {
	$page = "edition-membres.php";
}
elseif (isset($_POST['voir_membres'])) {
	$page = "liste-membres.php";
}
elseif (isset($_POST['edit_membres_reseau'])) {
	$page = "edition-membres-reseau.php";
}
elseif (isset($_POST['voir_membres_reseau'])) {
	$page = "liste-membres-reseau.php";
}
elseif (isset($_POST['main_courante'])) {
	$page = "main_courante.php";
}
elseif (isset($_POST['releve_sater'])) {
	$page = "releve_sater.php";
}
 ?>
<html>
	<head>
		<title>GesADRA</title>
		<meta charset="UTF-8" />
		<script type="text/javascript">
			setInterval(function(){
			document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString(); //
			}, 500);
		</script>
	    <link href="css/bootstrap.min.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid"><a class="navbar-brand" href="javascript:void(0)">gesADRA</a>
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item"><a class="nav-link" href="main_courante.php">Main courante</a></li>
				  <li class="nav-item"><a class="nav-link" href="membres.php">Membres</a></li>
				  <li class="nav-item"><a class="nav-link" href="releves-sater.php">Relevés SATER</a></li>
				  <li class="nav-item"><a class="nav-link" href="cartographie.php">Cartographie</a></li>
				</ul>
			  </div>
		  </div>
		  <span id="afficherheure" class="float-right badge badge-light" style="font-size:18px;"></span>
		</nav>
		<div class="container-fluid">