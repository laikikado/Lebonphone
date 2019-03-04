<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<?php

include '../helper/navbar.php';

returnUtilisateur($id);

if (isset($_POST["idprod"]) && !empty($_POST["idprod"])) {
    $id = htmlspecialchars($_POST["idprod"]);
    $req = getDatabase()->prepare('SELECT * FROM telephone WHERE idprod = :idprod');
    $req->execute(array(":idprod" => $id));
    $donnees = $req->fetch();
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <form method="post" action="updatetelephone.php">
                    <fieldset>
                        <legend class="text-center">Edition du téléphone : <?php echo $donnees['libelle']; ?></legend>

                        <!-- MARQUE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Marque</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='idmarque' required>
                                    <?php echo($donnees['idmarque']); ?>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM marque');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idmarque = $row["idmarque"];
                                        $nommarque = $row["nommarque"];
                                        echo "<option ";
                                        if ($row["idmarque"] == $donnees['idmarque'])
                                            echo "selected ";
                                        echo "value='$idmarque'>$nommarque</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- MODELE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Modèle</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo($donnees['libelle']); ?>" name="libelle" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- ETAT -->
                        <div class="form-group">
                            <label for="etat" class="col-md-3 control-label">Etat</label>
                            <div class="col-md-9">
                                <select type="text" name="etat" class="form-control">
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM telephone');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idprod = $row["idprod"];
                                        $etat = $row["etat"];
                                        echo "<option ";
                                        if ($row["idprod"] == $donnees['idprod'])
                                            echo "selected ";
                                        echo "value='$etat' hidden>$etat</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                    <option>Neuf
                                    <option>Très bon
                                    <option>Bon
                                    <option>Usagé
                                    <option>Hors Service
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- PRIX -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="prix">Prix</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="<?php echo($donnees['prix']); ?>" name="prix" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- TYPE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="idtype">Type</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='idtype' required>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM typetel');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idtype = $row["idtype"];
                                        $nomtype = $row["nomtype"];
                                        echo "<option ";
                                        if ($row["idtype"] == $donnees['idtype'])
                                            echo "selected ";
                                        echo "value='$idtype'>$nomtype</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- TAILLE ECRAN -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="tailleecran">Taille de l'écran</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='tailleecran' required>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM telephone');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idprod = $row["idprod"];
                                        $tailleecran = $row["tailleecran"];
                                        echo "<option ";
                                        if ($row["idprod"] == $donnees['idprod'])
                                            echo "selected ";
                                        echo "value='$tailleecran' hidden>$tailleecran</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                    <option>3 ou moins
                                    <option>3,1
                                    <option>3,2
                                    <option>3,3
                                    <option>3,4
                                    <option>3,5
                                    <option>3,6
                                    <option>3,7
                                    <option>3,8
                                    <option>3,9
                                    <option>4
                                    <option>4,1
                                    <option>4,2
                                    <option>4,3
                                    <option>4,4
                                    <option>4,5
                                    <option>4,6
                                    <option>4,7
                                    <option>4,8
                                    <option>4,9
                                    <option>5
                                    <option>5,1
                                    <option>5,2
                                    <option>5,3
                                    <option>5,4
                                    <option>5,5
                                    <option>5,6
                                    <option>5,7
                                    <option>5,8
                                    <option>5,9
                                    <option>6
                                    <option>6,1
                                    <option>6,2
                                    <option>6,3
                                    <option>6,4
                                    <option>6,5
                                    <option>6,6
                                    <option>6,7
                                    <option>6,8
                                    <option>6,9
                                    <option>7 et plus
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- CONNECTIVITE -->
                        <div class="form-group">
                            <label for="connectivite" class="col-md-3 control-label">Option 4G ?</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='connectivite' required>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM telephone');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idprod = $row["idprod"];
                                        $connectivite = $row["connectivite"];
                                        echo "<option ";
                                        if ($row["idprod"] == $donnees['idprod'])
                                            echo "selected ";
                                        echo "value='$connectivite' hidden>$connectivite</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                    <option>Oui
                                    <option>Non
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- STOCKAGE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="stockagememoire">Stockage</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='stockagememoire' required>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM telephone');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idprod = $row["idprod"];
                                        $stockagememoire = $row["stockagememoire"];
                                        echo "<option ";
                                        if ($row["idprod"] == $donnees['idprod'])
                                            echo "selected ";
                                        echo "value='$stockagememoire' hidden>$stockagememoire</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                    <option>2Go et moins
                                    <option>4Go
                                    <option>8Go
                                    <option>16Go
                                    <option>32Go
                                    <option>64Go
                                    <option>128Go
                                    <option>256Go
                                    <option>512Go et plus
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- SYSTEME EXPLOITATION -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="systemexploit">OS</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name='systemexploit' required>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM telephone');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idprod = $row["idprod"];
                                        $systemexploit = $row["systemexploit"];
                                        echo "<option ";
                                        if ($row["idprod"] == $donnees['idprod'])
                                            echo "selected ";
                                        echo "value='$systemexploit' hidden>$systemexploit</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                    <option>Android
                                    <option>iOS
                                    <option>Tizen
                                    <option>Blackberry OS
                                    <option>Windows Mobile
                                    <option>Autre
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- COULEUR -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="couleur">Couleur</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo($donnees['couleur']); ?>" name="couleur" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- PHOTO -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="photo">Photo</label>
                            <div class="col-md-9">
                                <input type="file" name="photo" value="<?php echo($donnees['photo']); ?>" hidden>
                            </div>
                        </div>
                        <br><br>

                        <!-- DESCRIPTION -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">Description :</label>
                            <div class="col-md-9">
                                <textarea class="form-control" type="text" name="description" rows="4" required><?php echo($donnees['description']); ?></textarea>
                            </div>
                        </div>

                        <!-- IDUSER -->
                        <select type="text" name='iduser' hidden>
                            <?php echo($donnees['iduser']); ?>
                            <?php
                            $req = getDatabase()->prepare('SELECT iduser FROM utilisateur');
                            $req->execute();
                            $row = $req->fetch();
                            while ($row) {
                                $iduser = $row["iduser"];
                                echo "<option ";
                                if ($row["iduser"] == $donnees['iduser'])
                                    echo "selected ";
                                echo "value='$iduser'></option>";
                                $row = $req->fetch();
                            }
                            ?>
                        </select>

                        <!-- IDMARQUE -->
                        <input type="text" name="idprod" value="<?php echo $donnees['idprod']; ?>" hidden>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                        <input type="submit" value="Sauvegarder" class="btn btn-primary" name="sauvegarder">
                            </div>
                        </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php
}
else
{
    echo('Erreur de modification');
}
?>
</body>
</html>