<html>
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../css/custom.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

<?php

    include "../helper/navbar.php";
    returnUtilisateur($id);

?>

<div class="container">
    <div class="row">
        <div class="search form-center">
            <form class="formulaire" action="../helper/research.php" method="POST">
                <input type="text" style="display: inline-block!important;" class="form-control" placeholder="Rechercher" name="libelle" id="libelle">
                <button type="submit" name="rechercher" class="btn btn-sm"><img alt="" src="../img/search.png"></button>
            </form>
        </div>
    </div>
</div>
<br><br>

<h2 class="text-center card-header">Résultat(s) de votre recherche</h2>
<div class="container">

<?php

if(isset($_POST['libelle'])){
    $rechercher = htmlspecialchars($_POST['libelle']);
}

$countprod = (int)countsearch($rechercher)[0]->count;
$rechercheprod = search($rechercher);
for($i=0;$i<$countprod;$i++){ ?>

    <div class="col-md-4">
        <div class="thumbnail">
            <img src="http://tech.firstpost.com/wp-content/uploads/2014/09/Apple_iPhone6_Reuters.jpg" alt="" class="img-responsive">
            <div class="caption">
                <h4 class="pull-right"><?=$rechercheprod[$i]->prix;?> <img src="../img/coin.png"></h4>
                <h4><?=$rechercheprod[$i]->libelle;?></h4>
                <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$rechercheprod[$i]->description;?></p>
            </div>
            <div class="space-ten"></div>
            <div class="btn-ground text-center">
                <button type="button" class="btn btn-primary" style="margin-bottom: 5px" data-toggle="modal" data-target="#product<?=$rechercheprod[$i]->idprod;?>_view"><i class="fa fa-search"></i>En savoir plus</button>
                <?php
                if($rechercheprod[$i]->dispo == true){
                    echo'<form action="../telephone/achat.php" method="post">
                        <input name="idprod" value="' . $rechercheprod[$i]->idprod . '" hidden>
                        <input type="submit" name="achattel" value="Acheter" class="btn btn-danger" disabled="disabled">
                    </form>';
                }
                else
                {
                    echo '<form action="../telephone/achat.php" method="post">
                        <input name="idprod" value="' . $rechercheprod[$i]->idprod . '" hidden>
                        <input type="submit" name="achattel" value="Acheter" class="btn btn-success">
                    </form>';
                }
                ?>

            </div>
            <div class="space-ten"></div>
        </div>
    </div>
    <div class="modal fade product_view" id="product<?=$rechercheprod[$i]->idprod;?>_view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    <h3 class="modal-title" ><?=$rechercheprod[$i]->nommarque;?> - <?=$rechercheprod[$i]->libelle;?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 product_img">
                            <img src="http://img.bbystatic.com/BestBuy_US/images/products/5613/5613060_sd.jpg" class="img-responsive">
                        </div>
                        <div class="col-md-6 product_content">
                            <h4 style="text-transform: none">Vendeur: <?=$rechercheprod[$i]->nom;?> <?=$rechercheprod[$i]->prenom;?><span></span></h4>
                            <p>Description : <?=$rechercheprod[$i]->description;?></p>
                            <h3 class="text">Prix : <?=$rechercheprod[$i]->prix;?> <img src="../img/coin.png"></h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Etat : <?=$rechercheprod[$i]->etat;?><br>
                                        Taille de l'écran : <?=$rechercheprod[$i]->tailleecran;?><br>
                                        4G compatible : <?=$rechercheprod[$i]->connectivite;?><br>
                                        Stockage : <?=$rechercheprod[$i]->stockagememoire;?><br>
                                        Couleur : <?=$rechercheprod[$i]->couleur;?><br>
                                        OS : <?=$rechercheprod[$i]->systemexploit;?><br><br>
                                        <strong>Statut :
                                            <?php
                                            if ($rechercheprod[$i]->dispo == true){
                                                echo 'Indisponible';
                                            }
                                            else{
                                                echo 'Disponible';
                                            }
                                            ?></strong>
                                    </p>
                                </div>
                            </div>
                            <div class="space-ten"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>
</body>
</html>