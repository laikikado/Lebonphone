<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../css/mesventes.css" rel="stylesheet">
</head>
<body>

<?php

include '../helper/navbaradmin.php';

?>

<div class="container">
    <img src="../img/iPad_Pro.png" style="width: 100%; margin-top: -40px">

    <div style="position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);">
    <h3 class="text-center">Nombre de profils enregistrés :</h3>
    <?php
    $adminlisteprofil = admininfosuser();
    $countprofil = (int)admincountprofil()[0]->count;
    echo '<p style="text-align: center; margin-top: -10px; font-weight: bolder; font-size: 20px">' . $countprofil . '</p><br><br>';?>

    <h3 class="text-center">Nombre de téléphones en vente :</h3>
    <?php
    $adminlisteprofil = admininfosphone();
    $countprod = (int)admincountprod()[0]->count;
    echo '<p style="text-align: center; margin-top: -10px; font-weight: bolder; font-size: 20px">' . $countprod . '</p><br><br>';?>

    <h3 class="text-center">Nombre de téléphones commandés :</h3>
    <?php
    $adminlisteprofil = admininfosachat();
    $countoffre = (int)admincountachat()[0]->count;
    echo '<p style="text-align: center; margin-top: -10px; font-weight: bolder; font-size: 20px">' . $countoffre . '</p><br>';?>
</div></div>
</body>
</html>