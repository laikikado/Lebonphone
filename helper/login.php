<?php

include '../helper/functions.php';
include '../helper/LoginController.php';

    $mailadmin = 'admin';
    $mdpadmin = 'admin';

    $mail = $_POST['mail'];
    $motdepasse = $_POST['motdepasse'];

    $resultat = CheckAuth();

    $isPasswordCorrect = ($_POST['motdepasse'] == $resultat['motdepasse']);
    $adminisPasswordCorrect = ($_POST['motdepasse'] == 'admin' && $_POST['mail'] == 'admin');

    if($_POST['mail'] == $mailadmin && $_POST['motdepasse'] == $mdpadmin){
        session_start();
        $_SESSION['iduser'] = $resultat['iduser'];
        $_SESSION['mail'] = 'admin';
        $_SESSION['motdepasse'] = 'admin';
        header('Location: admin.php');
    }
    else
        {
        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe !';
        } else
            {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['iduser'] = $resultat['iduser'];
                $_SESSION['mail'] = $mail;
                $_SESSION['motdepasse'] = $motdepasse;
                header('Location: accueil.php');
            }
            else
                {
            echo 'Mauvaise adresse mail ou mot de passe !';
        }
    }
}