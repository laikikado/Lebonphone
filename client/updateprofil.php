<?php

include_once '../helper/functions.php';

if (isset($_POST["iduser"]) && !empty($_POST["iduser"])) {
    updateProfil();
}
else
{
    echo "Erreur d'update";
}