<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../css/mesventes.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<?php

include '../helper/navbaradmin.php';

?>

<h1 class="text-center">Nombre de profils enregistrés dans la base de données</h1><br>
<div class="container">

    <?php

    $adminlisteprofil = admininfosuser();
    $countprofil = (int)admincountprofil()[0]->count;
    echo $countprofil;?>

    <h1 class="text-center">Nombre de téléphones en vente enregistrés dans la base de données</h1><br>

    <?php
    $adminlisteprofil = admininfosphone();
    $countprod = (int)admincountprod()[0]->count;
    echo $countprod
    ?>

    <h1 class="text-center">Nombre de téléphones en vente enregistrés dans la base de données</h1><br>

    <?php
    $adminlisteprofil = admininfosoffre();
    $countoffre = (int)admincountoffre()[0]->count;
    echo $countoffre
    ?>
</body>
</html>