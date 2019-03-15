<head>
    <title>Erreur de connexion</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
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
            echo '
                <div class="container" style="margin-top: 15%">
                    <div class="jumbotron">
                        <div class="text-center"><i class="fa fa-5x fa-frown-o" style="color:#d9534f;"></i></div>
                        <h2 class="text-center">Erreur de connexion</h2>
                        <p class="text-center">Mauvais identifiant ou mot de passe ! !</p><br>
                        <p class="text-center"><a class="btn btn-primary" style="border-color: #56baed" href="javascript:history.back()"><i class="fa fa-home"></i> Revenir à la page de connexion</a></p>
                    </div>
                </div>';
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
            echo '
                <div class="container" style="margin-top: 15%">
                    <div class="jumbotron">
                        <div class="text-center"><i class="fa fa-5x fa-frown-o" style="color:#d9534f;"></i></div>
                        <h2 class="text-center">Erreur de connexion</h2>
                        <p class="text-center">Mauvaise adresse mail ou mot de passe !</p><br>
                        <p class="text-center"><a class="btn btn-primary" style="border-color: #56baed" href="javascript:history.back()"><i class="fa fa-home"></i> Revenir à la page de connexion</a></p>
                    </div>
                </div>';
        }
    }
}