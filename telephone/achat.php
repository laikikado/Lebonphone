<?php

include '../helper/functions.php';

session_start();

$idprod = postVar("idprod");
$iduser = $_SESSION['iduser'];
$id = achete($idprod, $iduser);