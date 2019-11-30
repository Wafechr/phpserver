<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
 
       
	if (isset($_POST["valider"])) { 

	    try{
          $bdd= new PDO('mysql:host=localhost;dbname=tp3;charset=utf8','root',"");

           }
           catch (Exception $e) { die('Erreur : ' . $e->getMessage());
            }
            $req=$bdd -> prepare('INSERT INTO commentaire (auteur,commentaire) values(?,?)');
            $req -> execute(array($_POST["auteur"],$_POST["commentaire"]));
            $req -> closecursor();
            $rep=$bdd -> prepare('INSERT INTO commentaire(id_billet,auteur,commentaire) values(?,?,?)');

            $rep -> execute(array($_SESSION["var_sess"],$_POST["auteur"],$_POST["commentaire"]));
            $rep -> closecursor();
             header('location:commentaire.php');

        }
        ?>

</body>
</html>