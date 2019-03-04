<html>
<head>
</head>

<body>
<?php

include_once '../helper/functions.php';
include '../helper/navbar.php';

$id = $_SESSION['iduser'];
$user = infosUser($id);

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <form method="post" action="updateprofil.php">
                    <fieldset>
                        <legend class="text-center">Edition du profil</legend>

                        <!-- TELEPHONE -->
                        <div class="form-group">
                        <label class="col-md-3 control-label" for="numero">Téléphone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?=$user['0']->numero;?>" name="numero">
                            </div>
                        </div>
                        <br><br>

                        <!-- MOT DE PASSE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="motdepasse">Mot de passe</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" value="<?=$user['0']->motdepasse;?>" name="motdepasse" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- ADRESSE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="adresse1">Adresse</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?=$user['0']->adresse1;?>" name="adresse1" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- VILLE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="idville">Ville</label>
                             <div class="col-md-9">
                                    <select type="text" class="form-control" name='idville' required>
                                        <?=$user['0']->nomville;
                                        $req = getDatabase()->prepare('SELECT * FROM ville');
                                        $req->execute();
                                        $row = $req->fetch();
                                        while ($row) {
                                            $idville = $row["idville"];
                                            $nomville = $row["nomville"];
                                            echo "<option ";
                                            if ($row["idville"] == $user['0']->idville)
                                                echo "selected ";
                                            echo "value='$idville'>$nomville</option>";
                                            $row = $req->fetch();
                                        }
                                        ?>
                                    </select>
                        <br><br>

                        <input type="text" value="<?=$user['0']->nom;?>" name="nom" hidden>
                        <input type="text" value="<?=$user['0']->prenom;?>" name="prenom" hidden>
                        <input type="text" value="<?=$user['0']->genre;?>" name="genre" hidden>
                        <input type="text" value="<?=$user['0']->mail;?>" name="mail" hidden>
                        <input type="date" value="<?=$user['0']->datenaissance;?>" name="datenaissance" hidden>
                        <input type="text" value="<?=$user['0']->credit;?>" name="credit" hidden>
                        <input type="text" name="iduser" value="<?=$user['0']->iduser;?>" hidden>

                         <!-- Form actions -->
                         <div class="form-group">
                             <div class="col-md-12 text-right">
                                 <input type="submit" value="Sauvegarder" class="btn btn-primary" name="sauvegarder">                                     </div>
                         </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>