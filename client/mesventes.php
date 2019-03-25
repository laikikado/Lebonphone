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

    include "../helper/navbar.php";

    ?>
<h2 class="text-center card-header">Liste de vos articles en vente</h2>
    <?php

    returnUtilisateur($id);
    $ventes = infosPhone($id);
    $acheteur = infosacheteur($id);

$count = (int)countprod($id)[0]->count;

for($i=0;$i<$count;$i++)
{   ?>
    <div class="badge-center" style="margin: 0 auto; width: 600px">
        <div class="badge-modif" style="font-size: 18px!important">
            <div class ="main-container">
                <div class=" highlight" style="margin-left:0;">
                <h2><?=$ventes[$i]->nommarque;?> - <?=$ventes[$i]->libelle;?></h2>
                    <div class="row">
                        <ul>
                            <li>Modèle : <?=$ventes[$i]->libelle;?></li>
                            <li>Prix : <?=$ventes[$i]->prix;?></li>
                            <li>État : <?=$ventes[$i]->etat;?></li>
                            <li>Description : <?=$ventes[$i]->description;?></li>
                            <li>Taille de l'écran : <?=$ventes[$i]->tailleecran;?>"</li>
                            <li>Connectivité 4G : <?=$ventes[$i]->connectivite;?></li>
                            <li>Stockage du téléphone : <?=$ventes[$i]->stockagememoire;?></li>
                            <li>Couleur : <?=$ventes[$i]->couleur;?></li>
                            <li>Système d'exploitation : <?=$ventes[$i]->systemexploit;?></li>
                            <li>Type : <?=$ventes[$i]->nomtype;?></li>
                            <li>Marque : <?=$ventes[$i]->nommarque;?></li>
                            <?php if($ventes[$i]->dispo == false){?>
                                <form action="../telephone/edittelephone.php" method="post">
                                <input type="text" name="idprod" value="<?=$ventes[$i]->idprod;?>" hidden>
                                <input type="submit" name="Modifier" class="btn btn-primary" style="margin-top: 20px" value="Modifier">
                            </form>
                            <form action="../telephone/deletetelephone.php" method="post">
                                <input type="text" name="idprod" value="<?=$ventes[$i]->idprod;?>" hidden>
                                <input type="submit" name="supprimer" class="btn btn-danger" value="Supprimer">
                            </form><?php
                            }
                            else{
                                $acheteur = infosacheteurventes($ventes[$i]->idprod);
                                if ($acheteur != null) {
                                    ?>
                                    <ul>
                                        <li>Nom de l'acheteur: <?= $acheteur->nom; ?></li>
                                        <li>Prénom de l'acheteur : <?= $acheteur->prenom; ?></li>
                                        <li>Mail de l'acheteur : <?= $acheteur->mail; ?></li>
                                        <li>Numéro de l'acheteur : <?= $acheteur->numero; ?></li>
                                    </ul><br><br><br><br>
                                    <?php if($ventes[$i]->vendu == true){
                                        echo 'Le téléphone a été vendu !';
                                    }
                                    else{
                                        ?>

                                    <form action="../client/updatevendu.php" method="post">
                                        <input type="text" name="idprod" value="<?=$ventes[$i]->idprod;?>" hidden>
                                        <input type="submit" name="valider" class="btn btn-success" style="margin-top: 20px" value="Valider la vente">
                                    </form>
                                    <?php
                                    }
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</body>
</html>
<?php } ?>