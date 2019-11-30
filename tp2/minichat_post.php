<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
       setcookie("pseudonyme",$_POST["pseudo"],time()+24*3600); 
       /**permet de définir un cookie qui sera envoyé avec les autres entetes HTTP */
	if (isset($_POST["envoyer"])) { 
	    try{
          $bdd= new PDO('mysql:host=localhost;dbname=tp2;charset=utf8','root',"");
        }
        catch (Exception $e) { die('Erreur : ' . $e->getMessage());
        }
           
        $rep=$bdd ->prepare('INSERT INTO minichat(pseudo,messages) values(?,?)');
        $rep ->execute(array($_POST['pseudo'],$_POST['messages']));
        $rep ->closecursor();
        header('location:minichat.php');

        }
?>
</body>
</html>