<?php

include '../helper/functions.php';

$idprod= postVar("idprod");
$libelle = postVar("libelle");
$prix = postVar("prix");
$etat = postVar('etat');
$description = postVar('description');
$photo = postVar('photo');
$tailleecran = postVar('tailleecran');
$connectivite = postVar('connectivite');
$stockagememoire = postVar('stockagememoire');
$couleur = postVar('couleur');
$systemexploit = postVar('systemexploit');
$idtype = postVar('idtype');
$iduser = postVar('iduser');
$idmarque = postVar('idmarque');

$id = adminaddtelephone($idprod, $libelle, $prix, $etat, $description, $photo, $tailleecran, $connectivite, $stockagememoire, $couleur, $systemexploit, $idtype,
    $iduser, $idmarque);