<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>lebonphone - LOGIN</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login_custom.css">
</head>

<body>
<div class="wrapper fadeInDown">
    <div id="formContent">

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="../img/logo_lebonphone.png" id="icon" alt="User Icon" />
            <p>Donnez une seconde vie à votre smartphone.</p>
            <hr>
            <h1>Se connecter</h1>
        </div>
        <!-- Login Form -->
        <form action="login.php" method="post">
            <input type="text" id="mail" class="fadeIn second" name="mail" placeholder="e-mail" required/>
            <input type="password" id="motdepasse" class="fadeIn third" name="motdepasse" placeholder="mot de passe" required/>
            <input type="submit" class="fadeIn fourth" value="Connexion" name="connexion">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="../client/formprofil.php">S'inscrire</a>
        </div>
    </div>
</div>
</body>
</html>
