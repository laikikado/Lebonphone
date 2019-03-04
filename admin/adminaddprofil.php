<?php

include '../helper/functions.php';

$iduser = postVar("iduser");
$motdepasse = postVar("motdepasse");
$nom = postVar("nom");
$prenom = postVar("prenom");
$numero = postVar("numero");
$genre = postVar("genre");
$datenaissance = postVar("datenaissance");
$adresse1 = postVar("adresse1");
$mail = postVar("mail");
$credit = postVar("credit");
$idville = postVar("idville");
$id = adminaddprofil($iduser, $motdepasse, $nom, $prenom, $numero, $genre, $datenaissance, $adresse1, $mail, $credit, $idville);