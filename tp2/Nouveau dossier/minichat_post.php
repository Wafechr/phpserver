<!DOCTYPE html>
<html>
<head>
</head>
<body> 
<?php
setcookie("pseudonyme",$_POST["pseudo"],time()+24*3600 );
if(isset($_POST["Envoyer"])) {
    include('connexion.php');
    $reponse=$bdd->prepare('INSERT INTO minichat(pseudo,messages) values(?,?)'); 
    $reponse-> execute(array($_POST['pseudo'],$_POST['messages']));
    $reponse->closecursor();
    header('location :minichat.php');
     //*redirection sur la page automatiquement
     }
?>
</body>
</html>