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

<h1 class="text-center">Liste des profils enregistrés</h1><br>
<div class="container">

    <?php

    $adminlisteprofil = admininfosuser();
    $count = (int)admincountprofil()[0]->count;
    for($i=0;$i<$count;$i++)
    {
?>
<div class="badge-center" style="margin: 0 auto; width: 600px">
    <div class="badge-modif" style="font-size: 18px!important">
        <div class ="main-container">
            <div class=" highlight" style="margin-left:0;">
                <h2 class="text-center card-header"><?=$adminlisteprofil[$i]->nom;?> <?=$adminlisteprofil[$i]->prenom;?></h2>
                <div class="row">
                    <ul>
                        <li>Genre : <?=$adminlisteprofil[$i]->genre;?></li>
                        <li>Téléphone : +33<?=$adminlisteprofil[$i]->numero;?></li>
                        <li>Mail : <?=$adminlisteprofil[$i]->mail;?></li>
                        <li>Mot de passe : <?=$adminlisteprofil[$i]->motdepasse;?> </li>
                        <li>Date de naissance : <?=$adminlisteprofil[$i]->datenaissance;?></li>
                        <li>Adresse : <?=$adminlisteprofil[$i]->adresse1;?></li>
                        <li>Ville : <?=$adminlisteprofil[$i]->nomville;?></li>
                        <form action="../admin/admindeleteprofil.php" method="post">
                            <input type="text" name="iduser" value="<?=$adminlisteprofil[$i]->iduser;?>" hidden>
                            <input type="submit" name="Supprimer" class="btn btn-danger" value="Supprimer">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
        <br>
<?php } ?>
</body>
</html>