<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<?php include '../helper/functions.php';
?>

<body>

<a class="btn btn-group" style="border-color: #56baed; margin-top: 1%; margin-left: 1%" href="javascript:history.back()">
    <i class="fa fa-home"></i>Retour
</a>


<h2 class="text-center nav-item">Inscription :</h2>
<div class="badge-center text-center">
    <form action="addprofil.php" method="POST">
        <br><br>
        <div class="form-group form-center">
            <input type="text" class="form-control" name="mail" placeholder="E-mail" required>
        </div>
        <br><br>
        <div class="form-group form-center">
            <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe" required>
            <small id="passwordHelpInline" class="text-muted">
                8 caractères minimums vivement conseillés
            </small>
        </div>
        <br><br><br>
        <div class="form-group form-center">
            <input type="text" class="form-control" name="nom" placeholder="Nom" required>
        </div>
            <br><br>
        <div class="form-group form-center">
            <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
        </div>
        <br><br>
        <div class="form-group form-center">
            <input type="tel" class="form-control" name="numero" placeholder="Téléphone" required>
        </div>
        <br><br>
        <div class="col-auto my-1">
            <label>Genre :</label>
            <select type="text" class="custom-select mr-sm-2 form-center" name="genre" placeholder="Genre" required>
                <option>Choisir le genre...
                <option>Homme
                <option>Femme
            </select>
        </div>
        <br>
        <div class="form-group form-center">
            <input type="date" class="form-control" name="datenaissance" placeholder="Date de naissance" required>
        </div>
        <br><br>
        <div class="form-group form-center">
            <input type="text" class="form-control" name="adresse1" placeholder="Adresse" required>
        </div>
        <br><br>
        <div class="col-auto my-1">
            <select type="text" class="custom-select mr-sm-2 form-center" name='idville' required>
                <option>Choisir la ville...
                <?php
                $req = getDatabase()->prepare('SELECT * FROM ville');
                $req->execute();
                $row = $req->fetch();
                while ($row) {
                    $idville = $row["idville"];
                    $nomville = $row["nomville"];
                    echo "<option ";
                    if ($row["idville"] == ['idville'])
                        echo "selected ";
                    echo "value='$idville'>$nomville</option>";
                    $row = $req->fetch();
                }
                ?>
            </select>
        </div>
        <br><br>
        <input type="text" name="credit" placeholder="Crédits" hidden>
        <br><br>
        <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">S'enregistrer</button>
        </div>
    </form>
</div>
</body>
</html>