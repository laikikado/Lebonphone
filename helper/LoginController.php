<?php

function CheckAuth(){
    if(isset($_POST['mail'])){
        $mail = $_POST['mail'];
        $bdd = getDatabase();
        $req = $bdd->prepare('SELECT iduser, motdepasse, mail FROM utilisateur WHERE mail = :mail');
        $req->execute(array('mail' => $mail));
        $resultat = $req->fetch();
    }
    return $resultat;
}