<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/navbaradmin.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<?php

session_start();

include '../helper/functions.php';

if(empty($_SESSION['iduser'])){
    header('Location: ../helper/index.php');
}

$id = $_SESSION['iduser'];

?>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="../helper/accueil.php"><img src="../img/logo_lebonphone.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../admin/adminformtelephone.php">Ajouter téléphone</a></li>
                    <li><a href="../admin/adminformprofil.php">Ajouter profil</a></li>
                    <li><a href="../admin/listetelephones.php">Tous les téléphones</a></li>
                    <li><a href="../admin/listeprofils.php">Tous les profils</a></li>
                    <li><a href="../helper/logout.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</body>
</html>