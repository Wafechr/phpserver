<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="formsCss.css"> 
</head>
<body>
<?php
include('connexion.php');
$reponse=$bdd->query('SELECT * FROM minichat ORDER BY id DESC Limit 10');
while ($donnee=$reponse->FETCH()){
    echo '<b>'.($donnee["pseudo"]).'</b> :'.$donnee["messages"].'<br/>';
}

if (isset($_COOKIE ["pseudonyme"])) 
    $visiteur=$_COOKIE["pseudonyme"];
else
$visiteur="";
?>

</br>
<form name="minichat" action="minichat_post.php" method="post">
<label for='pseudo'>pseudo </label>
<input type='text' name='pseudo'><br>

<label for='message'>Message</label>
<input type='text_area' name='messages'>

<input type='submit' value='Envoyer' name='Envoyer'>

</form>
</body>
</html>