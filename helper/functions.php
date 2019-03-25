<?php

function getDatabase()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=lebonphone;charset=utf8', 'root', 'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;

}

function infosUser($id)
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM utilisateur U, ville V WHERE U.idville = V.idville AND iduser = :pid");
        $stmt->bindParam(':pid', $id);
        if ($stmt->execute()) {
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $user;
}

function infosPhone($id){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM telephone t, typetel ty, marque ma, utilisateur u WHERE t.idtype = ty.idtype AND t.idmarque = ma.idmarque AND t.iduser = u.iduser AND u.iduser = :pid");
        $stmt->bindParam(':pid', $id);
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function infosacheteur($id){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM utilisateur u, achete a, marque m, typetel ty, telephone t 
WHERE u.iduser = a.iduser AND ty.idtype = t.idtype AND m.idmarque = t.idmarque AND t.idprod = a.idprod AND u.iduser = :pid");
        $stmt->bindParam(':pid', $id);
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function infosacheteurventes($idprod){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
        $bdd = getDataBase();
    }

    $user = null;
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM utilisateur u, achete a 
WHERE u.iduser = a.iduser AND a.idprod = :pid");
        $stmt->bindParam(':pid', $idprod);
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $user;
}
function admininfosuser()
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM utilisateur U, ville V WHERE U.idville = V.idville");
        if ($stmt->execute()) {
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $user;
}

function admininfosphone(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM telephone t, typetel ty, marque ma, utilisateur u WHERE t.idtype = ty.idtype AND t.idmarque = ma.idmarque AND t.iduser = u.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function admininfosachat()
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM utilisateur U, achete A WHERE U.iduser = A.iduser");
        if ($stmt->execute()) {
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $user;
}

function infosPhoneacc(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM telephone t, typetel ty, marque ma, utilisateur u WHERE t.idtype = ty.idtype AND t.idmarque = ma.idmarque AND t.iduser = u.iduser AND t.vendu = 0 ORDER BY idprod DESC");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function returnUtilisateur($id)
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->query("SELECT * FROM utilisateur WHERE iduser = $id");
        if ($resultat) {
            $utilisateur = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $utilisateur;
}

function countprod($id){

    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM utilisateur U, telephone T WHERE U.iduser = T.iduser AND T.iduser = :pid");
    $stmt->bindParam(':pid', $id);
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function countachat($id){

    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM utilisateur U, achete A WHERE U.iduser = A.iduser AND A.iduser = :pid");
    $stmt->bindParam(':pid', $id);
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function admincountprod(){

    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM utilisateur U, telephone T WHERE U.iduser = T.iduser");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function admincountprofil(){

    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM utilisateur U, ville V WHERE U.idville = V.idville");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function admincountachat(){

    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM utilisateur U, achete A WHERE U.iduser = A.iduser");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function sessionVar($name){
    @session_start();
    if(isset($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return true;
    }
    return false;
}

function getVar($name){
    if(isset($_GET[$name])){
        if(!empty($_GET[$name])){
            return $_GET[$name];
        }
        return true;
    }
    return false;
}

function postVar($name){
    if(isset($_POST[$name])){
        if(!empty($_POST[$name])){
            return $_POST[$name];
        }
        return true;
    }
    return false;
}

function addTelephone($idprod, $libelle, $prix, $etat, $description, $photo, $tailleecran, $connectivite, $stockagememoire, $couleur, $systemexploit, $idtype,
                      $iduser, $idmarque)
{
    $db = getDatabase();
    $sql='INSERT INTO telephone (libelle, prix, etat, description, photo, tailleecran, connectivite, stockagememoire, couleur, systemexploit, idtype, iduser, idmarque) 
          VALUES(:libelle, :prix, :etat, :description, :photo, :tailleecran, :connectivite, :stockagememoire, :couleur, :systemexploit ,:idtype ,:iduser, :idmarque)';
    $insert=$db->prepare($sql);
    $values = array('libelle' => $libelle, 'prix' => $prix, 'etat' => $etat, 'description' => $description, 'photo' => $photo, 'tailleecran' => $tailleecran,
        'connectivite' => $connectivite, 'stockagememoire' => $stockagememoire, 'couleur' => $couleur, 'systemexploit' => $systemexploit, 'idtype' => $idtype,
        'iduser' => $iduser, 'idmarque' => $idmarque);
    $insert->execute($values);
    return $db->lastInsertId();
}

function adminaddtelephone($idprod, $libelle, $prix, $etat, $description, $photo, $tailleecran, $connectivite, $stockagememoire, $couleur, $systemexploit, $idtype,
                      $iduser, $idmarque)
{
    $db = getDatabase();
    $sql='INSERT INTO telephone (libelle, prix, etat, description, photo, tailleecran, connectivite, stockagememoire, couleur, systemexploit, idtype, iduser, idmarque) 
          VALUES(:libelle, :prix, :etat, :description, :photo, :tailleecran, :connectivite, :stockagememoire, :couleur, :systemexploit ,:idtype ,:iduser, :idmarque)';
    $insert=$db->prepare($sql);
    $values = array('libelle' => $libelle, 'prix' => $prix, 'etat' => $etat, 'description' => $description, 'photo' => $photo, 'tailleecran' => $tailleecran,
        'connectivite' => $connectivite, 'stockagememoire' => $stockagememoire, 'couleur' => $couleur, 'systemexploit' => $systemexploit, 'idtype' => $idtype,
        'iduser' => $iduser, 'idmarque' => $idmarque);
    $insert->execute($values);
    header('Location: ../admin/listetelephones.php');
    return $db->lastInsertId();
}

function addProfil($iduser, $motdepasse, $nom, $prenom, $numero, $genre, $datenaissance, $adresse1, $mail, $credit, $idville)
{
    $db = getDatabase();
    $sql='INSERT INTO utilisateur (motdepasse, nom, prenom, genre, datenaissance, adresse1, mail, credit, numero, idville) 
          VALUES(:motdepasse, :nom, :prenom, :genre, :datenaissance, :adresse1, :mail, :credit, :numero, :idville)';
    $insert=$db->prepare($sql);
    $values = array('motdepasse' => $motdepasse, 'nom' => $nom, 'prenom' => $prenom,
        'numero' => $numero, 'genre' => $genre, 'datenaissance' => $datenaissance, 'adresse1' => $adresse1,
        'mail' => $mail, 'credit' => $credit, 'idville' => $idville);
    $insert->execute($values);
    header('Location: ../helper/accueil.php');
    return $db->lastInsertId();
}

function adminaddprofil($iduser, $motdepasse, $nom, $prenom, $numero, $genre, $datenaissance, $adresse1, $mail, $credit, $idville)
{
    $db = getDatabase();
    $sql='INSERT INTO utilisateur (motdepasse, nom, prenom, genre, datenaissance, adresse1, mail, credit, numero, idville) 
          VALUES(:motdepasse, :nom, :prenom, :genre, :datenaissance, :adresse1, :mail, :credit, :numero, :idville)';
    $insert=$db->prepare($sql);
    $values = array('motdepasse' => $motdepasse, 'nom' => $nom, 'prenom' => $prenom,
        'numero' => $numero, 'genre' => $genre, 'datenaissance' => $datenaissance, 'adresse1' => $adresse1,
        'mail' => $mail, 'credit' => $credit, 'idville' => $idville);
    $insert->execute($values);
    header('Location: ../admin/listeprofils.php');
    return $db->lastInsertId();

}

function updateTelephone()
{
    if (isset($_POST['sauvegarder'])) {
        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE telephone
    SET libelle = :libelle, prix = :prix, etat = :etat, description = :description, photo = :photo, tailleecran = :tailleecran, connectivite = :connectivite,
    stockagememoire = :stockagememoire, couleur = :couleur, systemexploit = :systemexploit, idtype = :idtype, iduser = :iduser, idmarque = :idmarque
    WHERE idprod = :idprod AND iduser = :iduser";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':idprod', $idprod);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':tailleecran', $tailleecran);
        $stmt->bindParam(':connectivite', $connectivite);
        $stmt->bindParam(':stockagememoire', $stockagememoire);
        $stmt->bindParam(':couleur', $couleur);
        $stmt->bindParam(':systemexploit', $systemexploit);
        $stmt->bindParam(':idtype', $idtype);
        $stmt->bindParam(':iduser', $iduser);
        $stmt->bindParam(':idmarque', $idmarque);
        $stmt->execute();
        header('Location: ../client/mesventes.php');
    }
}

function updateProfil()
{
    if (isset($_POST['sauvegarder'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur
    SET nom = :nom, motdepasse = :motdepasse, prenom = :prenom, genre = :genre, datenaissance = :datenaissance,
     adresse1 = :adresse1, mail = :mail, credit = :credit, numero = :numero, idville = :idville
    WHERE iduser = :iduser";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':iduser', $iduser);
        $stmt->bindParam(':motdepasse', $motdepasse);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':datenaissance', $datenaissance);
        $stmt->bindParam(':adresse1', $adresse1);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':credit', $credit);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':idville', $idville);
        $stmt->execute();
        header('Location: profil.php');
    }
}

function updateVendu($id)
{
    if (isset($_POST['idprod'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE telephone SET vendu = 1 WHERE idprod = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: mesventes.php');
    }
}

function updatecredits1($id)
{
    if (isset($_POST['ajouter1'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+1 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function updatecredits2($id)
{
    if (isset($_POST['ajouter2'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+2 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function updatecredits4($id)
{
    if (isset($_POST['ajouter4'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+4 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function updatecredits10($id)
{
    if (isset($_POST['ajouter10'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+10 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function updatecredits20($id)
{
    if (isset($_POST['ajouter20'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+20 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function updatecredits100($id)
{
    if (isset($_POST['ajouter100'])) {

        extract(array_map("htmlspecialchars", $_POST));
        $query = "UPDATE utilisateur SET credit = credit+100 WHERE iduser = :pid";
        $bdd = getDatabase();
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pid', $id);
        $stmt->execute();
        header('Location: ../helper/acheter.php');
    }
}

function credit($id)
{
    $bdd = getDatabase();
    $stmt = $bdd->prepare("SELECT * FROM utilisateur WHERE iduser = :pid");
    $stmt->bindParam(':pid', $id);
    $stmt->execute();
    $req = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $req;
}

function infosapple(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 1 AND M.idmarque = 1 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countapple(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 1 AND M.idmarque = 1 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infosasus(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 3 AND M.idmarque = 3 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countasus(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 3 AND M.idmarque = 3 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infosautres(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 10 AND M.idmarque = 10 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countautres(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 10 AND M.idmarque = 10 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infosblackberry(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 5 AND M.idmarque = 5 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countblackberry(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 5 AND M.idmarque = 5 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infoshuawei(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 9 AND M.idmarque = 9 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function counthuawei(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 9 AND M.idmarque = 9 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infoslg(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 8 AND M.idmarque = 8 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countlg(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 8 AND M.idmarque = 8 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infosnokia(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 4 AND M.idmarque = 4 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countnokia(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 4 AND M.idmarque = 4 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infossamsung(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 2 AND M.idmarque = 2 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countsamsung(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 2 AND M.idmarque = 2 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infossony(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 6 AND M.idmarque = 6 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countsony(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 6 AND M.idmarque = 6 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function infoswiko(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM marque M, telephone T, typetel TY, utilisateur U WHERE T.idmarque = 7 AND M.idmarque = 7 AND T.idtype = TY.idtype AND U.iduser = T.iduser");
        if ($stmt->execute()) {
            $phone = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $phone;
}

function countwiko(){
    $bdd = getDataBase();
    $stmt = $bdd->prepare("SELECT COUNT(*) as count FROM marque M, telephone T, typetel TY WHERE T.idmarque = 7 AND M.idmarque = 7 AND T.idtype = TY.idtype");
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $count;
}

function search($rechercher){
    $bdd = getDataBase();
    $stmt = $bdd->query("SELECT * FROM telephone T, utilisateur U, marque M WHERE libelle LIKE '%{$rechercher}%' AND U.iduser = T.iduser AND T.idmarque = M.idmarque");
    $search = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();
    return $search;
}

function countsearch($rechercher){

    $bdd = getDataBase();
    $stmt2 = $bdd->query("SELECT COUNT(*) as count FROM telephone T, utilisateur U, marque M WHERE libelle LIKE '%{$rechercher}%' AND U.iduser = T.iduser AND T.idmarque = M.idmarque");
    if($stmt2){
        $countSearch = $stmt2->fetchAll(PDO::FETCH_OBJ);
        $stmt2->closeCursor();
    }
    return $countSearch;
}

function deletetelephone(){

    if(isset($_POST['idprod'])){
        $idprod = $_POST['idprod'];
    $req = getDatabase()->prepare('DELETE FROM telephone WHERE idprod=:pid');
    $req -> bindParam(":pid", $idprod);
    $req->execute();
    header("Location: ../client/mesventes.php");
    }
}

function deletetelephoneadmin(){

    if(isset($_POST['idprod'])) {
        $idprod = $_POST['idprod'];
        $req = getDatabase()->prepare('DELETE FROM telephone WHERE idprod=:pid');
        $req->bindParam(":pid", $idprod);
        $req->execute();
        header("Location: ../admin/listetelephones.php");
    }
}

function deleteprofiladmin(){

    if(isset($_POST['iduser'])) {
        $iduser = $_POST['iduser'];
        $req = getDatabase()->prepare('DELETE FROM utilisateur WHERE iduser=:pid');
        $req->bindParam(":pid", $iduser);
        $req->execute();
        header("Location: ../admin/listeprofils.php");
    }
}

function deleteachat(){

    //if(isset($_POST['annuler'])) {
        $idprod = $_POST['idprod'];
        $req = getDatabase()->prepare('DELETE FROM achete WHERE idprod = :pid');
        $req->bindParam(":pid", $idprod);
        $req->execute();
        header("Location: ../client/mescommandes.php");
    //}
}

function achete($idprod, $iduser){
    $bdd = getDatabase();
    $stmt = 'INSERT INTO achete (idprod, iduser) VALUES(:idprod, :iduser)';
    $insert = $bdd->prepare($stmt);
    $values = array('idprod' => $idprod, 'iduser' => $iduser);
    $insert->execute($values);
    header("Location: ../client/mescommandes.php");
    return $bdd->lastInsertId();

}