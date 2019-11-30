<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="formsCss.css"> 
</head>
<body> 
<form name='formulaire_ex4' action='livredorBD.php' method='Post'>
 <label for='nom'> Nom et prénom </label>
 <input type='text' name='nom'><br>

 <label for='mail'> mail </label>
 <input type='text' name='mail'><br>

 <label for='comment'> Commentaires </label>
 <input type='text_area' name='comment'><br>

 <input type='submit' value='Envoyer' name='Envoyer'>

 <input type='submit' value='Afficher les commentaires' name='Afficher'>

 </form>
<?php
try {
$bdd = new PDO('mysql:host=localhost;dbname=livredor;charset=utf8','root',"",
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die('Erreur :'.$e->getMessage());
}
if(isset($_POST["Envoyer"])) {
  $reponse=$bdd->prepare('INSERT INTO ligne(nom,email,commentaire) values(?,?,?)'); 
  $reponse->execute(array($_POST['nom'],$_POST['mail'],$_POST['comment']));
  $reponse->closecursor();
  }


if(isset($_POST["Afficher"])) { 
    $reponse =$bdd->query('SELECT * from ligne');
    if($reponse ->rowcount())
        while ($donnee=$reponse->FETCH()){
            echo '<table>';
            echo '<tr><th>date</th><td>'.date($donnee["date"]).'</td><th>nom</th><td>'.$donnee["nom"].'</td><th>mail</th><td>'.$donnee["email"].'</td><th>commentaires</th><td colspan=3 >'.$donnee["commentaire"].'</td></tr>';
            echo '</table>';
                } 
    }
    else 
        echo 'Personne n\'a écrit sur le livre d\'or';
        

?>
</body>
</html>
