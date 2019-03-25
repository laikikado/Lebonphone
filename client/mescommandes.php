<html lang="fr">
<head title="">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/mesventes.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

<?php
    include '../helper/navbar.php';
?>

<h2 class="text-center card-header">Liste de vos offres en cours</h2>

<?php

returnUtilisateur($id);
$ventes = infosacheteur($id);

$count = (int)countachat($id)[0]->count;

for($i=0;$i<$count;$i++)
{
   ?>
<div class="badge-center" style="margin: 0 auto; width: 600px">
    <div class="badge-modif" style="font-size: 18px!important">
        <div class ="main-container">
            <div class=" highlight" style="margin-left:0;">
                <h2><?=$ventes[$i]->nommarque;?> - <?=$ventes[$i]->libelle;?></h2>
                <div class="row">
                    <ul>
                        <li>Prix : <?=$ventes[$i]->prix;?></li>
                        <li>Téléphone du vendeur : 0<?=$ventes[$i]->numero;?></li>
                        <li>Mail du vendeur : <?=$ventes[$i]->mail;?></li>
                        <?php if($ventes[$i]->vendu == true){
                            echo '<br><p style="font-weight: bolder">Le vendeur a validé la transaction !</p>';
                        }
                        else { ?>
                            <form action="../telephone/deleteachat.php" method="post">
                                <input type="text" name="idprod" value="<?= $ventes[$i]->idprod; ?>" hidden>
                                <input type="submit" name="annuler" style="margin-top: 10px" class="btn btn-danger"
                                       value="Annuler l'offre">
                            </form>
                            <?php
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