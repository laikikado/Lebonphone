<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

<?php

include "../helper/navbar.php";
returnUtilisateur($id);

$id = $_SESSION['iduser'];

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <form action="../telephone/addtelephone.php" method="POST">
                    <fieldset>
                        <legend class="text-center">Vendez vous aussi votre téléphone !</legend>
                        <br>

                        <!-- MARQUE-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Marque</label>
                            <div class="col-md-9">
                                <select name='idmarque' class="form-control" required>
                                    <option value=0>Choisir parmi les propositions...</option>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM marque');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idmarque = $row["idmarque"];
                                        $nommarque = $row["nommarque"];
                                        echo "<option value='$idmarque'>$nommarque</option>";
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
                                <input name="libelle" type="text" placeholder="ex. S7 edge" class="form-control" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- ETAT -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Etat</label>
                            <div class="col-md-9">
                                <select type="text" name="etat" class="form-control" required>
                                    <option value=0>Choisir parmi les propositions...</option>
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
                            <label class="col-md-3 control-label">Prix</label>
                            <div class="col-md-9">
                                <input name="prix" type="number" placeholder="ex. 200" class="form-control" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- TYPE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Type</label>
                            <div class="col-md-9">
                                <select type="text" name='idtype' class="form-control" required>
                                    <option value=0>Choisir parmi les propositions...</option>
                                    <?php
                                    $req = getDatabase()->prepare('SELECT * FROM typetel');
                                    $req->execute();
                                    $row = $req->fetch();
                                    while ($row) {
                                        $idtype = $row["idtype"];
                                        $nomtype = $row["nomtype"];
                                        echo "<option value='$idtype'>$nomtype</option>";
                                        $row = $req->fetch();
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- TAILLE ECRAN -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Taille de l'écran</label>
                            <div class="col-md-9">
                                <select type="text" name="tailleecran" class="form-control" required>
                                    <option value=0>Choisir parmi les propositions... (en pouces)</option>
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
                            <label class="col-md-3 control-label">Option 4G ?</label>
                            <div class="col-md-9">
                                <select type="text" name="connectivite" class="form-control" required>
                                    <option value=0>Choisir parmi les 2 réponses...</option>
                                    <option>Oui
                                    <option>Non
                                </select>
                            </div>
                        </div>
                        <br><br>

                        <!-- STOCKAGE -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Stockage</label>
                            <div class="col-md-9">
                                <select type="text" name="stockagememoire" class="form-control" required>
                                    <option value=0>Choisir parmi les propositions... (en GigaOctets)</option>
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
                            <label class="col-md-3 control-label">OS</label>
                            <div class="col-md-9">
                                <select type="text" name="systemexploit" class="form-control" required>
                                    <option value=0>Choisir parmi les propositions...</option>
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
                            <label class="col-md-3 control-label">Couleur</label>
                            <div class="col-md-9">
                                <input type="text" name="couleur" placeholder="ex. Noir" class="form-control" required>
                            </div>
                        </div>
                        <br><br>

                        <!-- PHOTO -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Photo</label>
                            <div class="col-md-9">
                                <label for="photo"></label><input type="file" name="photo" id="photo"/>
                            </div>
                        </div>
                        <br><br>

                        <!-- DESCRIPTION -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="S'il vous plait saisir une description précise" rows="4" required></textarea>
                            </div>
                        </div>

                        <!-- IDUSER -->
                        <input type="number" name="iduser" value="<?php echo $id ?>" hidden>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Mettre en vente</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>