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

    include '../helper/navbar.php';

    $id = $_SESSION['iduser'];
    $utilisateur = returnUtilisateur($id);
    $user = infosUser($id);

    ?>
<div class="badge-center" style="margin: 0 auto; width: 600px">
    <div class="badge-modif" style="font-size: 18px!important">
        <div class ="main-container">
            <div class=" highlight" style="margin-left:0;">
                <h2 class="text-center card-header"><?=$user['0']->nom;?> <?=$user['0']->prenom;?></h2>
                <div class="row">
                    <ul><br>
                        <li>Genre : <?=$user['0']->genre;?></li>
                        <br>
                        <li>Téléphone : +33<?=$user['0']->numero;?></li>
                        <br>
                        <li>Mail : <?=$user['0']->mail;?></li>
                        <br>
                        <li>Mot de passe : ********* </li>
                        <br>
                        <li>Date de naissance : <?=$user['0']->datenaissance;?></li>
                        <br>
                        <li>Adresse : <?=$user['0']->adresse1;?></li>
                        <br>
                        <li>Ville : <?=$user['0']->nomville;?></li>
                        <br>
                        <label for="iduser"></label>
                        <input type="text" name="iduser" value="<?=$user['0']->iduser;?>" hidden>

                        <form action="../client/editprofil.php" method="post">
                            <input type="text" name="idprod" value="<?=$user['0']->iduser;?>" hidden>
                            <input type="submit" name="Modifier" class="btn btn-primary" value="Modifier">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>