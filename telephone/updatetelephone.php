<?php

include_once '../helper/functions.php';

if (isset($_POST["idprod"]) && !empty($_POST["idprod"])) {
    updateTelephone();
}
else
{
    echo "Erreur d'update";
}