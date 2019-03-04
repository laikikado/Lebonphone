<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/navbar.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
$credit = credit($id);

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
                    <li>
                        <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">Catégories</a>
                    </li>
                    <!--<li><form action="../helper/research.php" method="get"><input type="text" placeholder="Rechercher" name="rechercher" id="rechercher"</input></form></li>-->
                    <li><a href="../telephone/formtelephone.php">Vendre</a></li>
                    <li><a href="../client/mesventes.php">Mes ventes</a></li>
                    <li><a href="../client/mescommandes.php">Mes achats</a></li>
                    <li><a href="../client/profil.php"">Mon profil</a></li>
                    <li><a href="../helper/logout.php">Déconnexion</a></li>
                    <li><a href="../helper/acheter.php" class="btn btn-default btn-outline btn-circle">Acheter des <img src="../img/coin.png"></a></li>
                </ul>
                <div id="idmarque">
                <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
                    <li><a href="../marque/apple.php" name="apple">Apple</a></li>
                    <li><a href="../marque/samsung.php" name="samsung">Samsung</a></li>
                    <li><a href="../marque/asus.php" name="asus">Asus</a></li>
                    <li><a href="../marque/nokia.php" name="nokia">Nokia</a></li>
                    <li><a href="../marque/blackberry.php" name="blackberry">BlackBerry</a></li>
                    <li><a href="../marque/sony.php" name="sony">Sony</a></li>
                    <li><a href="../marque/wiko.php" name="wiko">Wiko</a></li>
                    <li><a href="../marque/lg.php" name="lg">LG</a></li>
                    <li><a href="../marque/huawei.php" name="huawei">Huawei</a></li>
                    <li><a href="../marque/autres.php" name="autres">Autres...</a></li>
                </div>
            </div>
        </div>
    </nav>
</div>
</body>
</html>