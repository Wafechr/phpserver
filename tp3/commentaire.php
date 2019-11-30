<?php session_start();
if (!isset($_SESSION["var_sess"])) {
    $_SESSION["var_sess"] = "";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>

<body>

    <?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', "");

} catch (Exception $e) {die('Erreur : ' . $e->getMessage());
}
if (isset($_GET["numblog"])) {
    $_SESSION["var_sess"] = $_GET["numblog"];

    $req = $bdd->prepare('SELECT * FROM billets WHERE id=?');
    $req->execute(array($_GET["numblog"]));

    echo '<table border=1>';
    while ($art = $req->fetch()) {
        echo '<tr><td class=entete><b>' . $art["titre"] . '  ' . '</b>' . $art["date_creation"] . '</td></tr><br/><tr><td class=corps>' . $art["contenu"] . '</td></tr>';
    }
}
?>
    <form name="commentaire" action="commentaire_post.php" method='POST'>
        <table width="400">
            <tr>
                <td> Auteur : </td>
            </tr>
            <tr>
                <td> <input type="text" name="auteur" size="40" /></td>
            </tr>
            <tr>
                <td> Commentaire : </td>
            </tr>
            <tr>
                <td width="200"><textarea name="commentaire" rows="20" cols="50"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="valider" value="Valider" />
                </td>
            </tr>
        </table>
    </form>
    <h3>Commentaires </h3>
    <?php
if (isset($_GET["numblog"])) {
    $req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet=? ORDER BY id LIMIT 5');
    $req->execute(array($_GET["numblog"]));
} else {
    $req = $bdd->prepare('SELECT * FROM billets WHERE id=?');
    $req->execute(array($_SESSION["var_sess"]));
}
while ($ligne = $req->fetch()) {
    echo '<strong>' . $ligne["auteur"] . '</strong>' . $ligne["date_commentaire"] . '<br/>' . $ligne["commentaire"];
    $req->closecursor();
}
?>
    </form>
</body>

</html>