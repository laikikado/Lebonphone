<?php

include "../helper/navbar.php";

$id = $_SESSION['iduser'];
$utilisateur = returnUtilisateur($id);
$user = infosUser($id);

$credit = credit($id);

if(isset($_POST['ajouter1'])){
    updatecredits1($id);
}

if(isset($_POST['ajouter2'])){
    updatecredits2($id);
}

if(isset($_POST['ajouter4'])){
    updatecredits4($id);
}

if(isset($_POST['ajouter10'])){
    updatecredits10($id);
}

if(isset($_POST['ajouter20'])){
    updatecredits20($id);
}

if(isset($_POST['ajouter100'])){
    updatecredits100($id);
}
?>
<div class="badge-center">
    <h3 class="text-center card-header">Crédits actuels : <?=$credit['0']->credit;?> <img src="../img/coin.png"></h3><br><br>
    <h3 class="text-center card-header">Acheter du crédit en toute sécurité :</h3>
    <h6 class="text-center card-header">(1 <img src="../img/coin.png" style="width: 15px"> = 5,00€)</h6><br>
    <form action="../helper/acheter.php" method="POST">
        <div style="text-align: center">
            <button type="submit" name="ajouter1" class="btn btn-success">5€
                <img src="../img/paypal.png" style="width: 80px"> = 1<img src="../img/coin.png" style="width:20px"></button><br><br>

            <button type="submit" name="ajouter2" class="btn btn-success">10€
                <img src="../img/paypal.png" style="width: 80px"> = 2<img src="../img/coin.png" style="width:20px"></button><br><br>

            <button type="submit" name="ajouter4" class="btn btn-success">20€
                <img src="../img/paypal.png" style="width: 80px"> = 4<img src="../img/coin.png" style="width:20px"></button><br><br>

            <button type="submit" name="ajouter10" class="btn btn-success">50€
                <img src="../img/paypal.png" style="width: 80px"> = 10<img src="../img/coin.png" style="width:20px"></button><br><br>

            <button type="submit" name="ajouter20" class="btn btn-success">100€
                <img src="../img/paypal.png" style="width: 80px"> = 20<img src="../img/coin.png" style="width:20px"></button><br><br>

            <button type="submit" name="ajouter100" class="btn btn-success">500€
                <img src="../img/paypal.png" style="width: 80px"> = 100<img src="../img/coin.png" style="width:20px"></button><br><br>
        </div>
    </form>
</div>