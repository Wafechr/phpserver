<!DOCTYPE html>
<html>
<head>
	
  <link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>

	<?php   


           try{
          $bdd= new PDO('mysql:host=localhost;dbname=tp3;charset=utf8','root',"");

           }
           catch (Exception $e) { die('Erreur : ' . $e->getMessage());
            }

            $requette= $bdd -> query ('SELECT * FROM billets ORDER BY id DESC LIMIT 5');
             echo '<table border=1>';
            while ($b = $requette -> fetch()){

            	echo '<tr><td class=entete>'.$b["titre"].'  '.$b["date_creation"].'</td></tr><tr><td class=corps>'.$b["contenu"].'<br/><a href=commentaire.php?numblog='.$b["id"].'> Commentaire...</a></td></tr>';
              $requette -> closecursor();
              echo '</table>';

              /* ou bien on utilise des blocks : echo '<div id=titre>'.$b["titre"].' '.$b["date_creation"].'</div><div id=contenu>'.$b["contenu"].'<a href...'>commen...; */
            }
?>
</body>
</html>