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

include "../helper/navbaradmin.php";

?>

<h1 class="text-center">Liste des téléphones en vente</h1><br>
<div class="container">

<?php

    $adminlistetel = admininfosphone();
    $count = (int)admincountprod()[0]->count;
    for($i=0;$i<$count;$i++)
    {
        ?>

<div class="badge-center" style="margin: 0 auto; width: 600px">
    <div class="badge-modif" style="font-size: 18px!important">
        <div class ="main-container">
            <div class=" highlight" style="margin-left:0;">
                <h2><?=$adminlistetel[$i]->nommarque;?> - <?=$adminlistetel[$i]->libelle;?></h2>
                <div class="row">
                    <ul>
                        <li>Modèle : <?=$adminlistetel[$i]->libelle;?></li>
                        <li>Prix : <?=$adminlistetel[$i]->prix;?></li>
                        <li>État : <?=$adminlistetel[$i]->etat;?></li>
                        <li>Description : <?=$adminlistetel[$i]->description;?></li>
                        <li>Taille de l'écran : <?=$adminlistetel[$i]->tailleecran;?>"</li>
                        <li>Connectivité 4G : <?=$adminlistetel[$i]->connectivite;?></li>
                        <li>Stockage du téléphone : <?=$adminlistetel[$i]->stockagememoire;?></li>
                        <li>Couleur : <?=$adminlistetel[$i]->couleur;?></li>
                        <li>Système d'exploitation : <?=$adminlistetel[$i]->systemexploit;?></li>
                        <li>Type : <?=$adminlistetel[$i]->nomtype;?></li>
                        <li>Marque : <?=$adminlistetel[$i]->nommarque;?></li>
                        <li>Statut :
                            <?php
                            if ($adminlistetel[$i]->dispo == true){
                                echo 'Indisponible';
                            }
                            else{
                                echo 'Disponible';
                            }
                            ?></li>
                        <form action="../admin/admindeletetelephone.php" method="post">
                            <input type="text" name="idprod" value="<?=$adminlistetel[$i]->idprod;?>" hidden>
                            <input type="submit" name="Supprimer" class="btn btn-danger" style="margin-top: 20px" value="Supprimer">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<?php } ?>
