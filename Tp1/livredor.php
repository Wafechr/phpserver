<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="formsCss.css"> 
</head>
<body> 
<form name='formulaire_ex4' action='livredor.php' method='Post'> 

 <label for='nom'> Nom et prénom </label>
 <input type='text' name='nom'><br>

 <label for='mail'> mail </label>
 <input type='text' name='mail'><br>

 <label for='comment'> Commentaires </label>
 <input type='text_area' name='comment'><br>

 <input type='submit' value='Envoyer' name='Envoyer'>

 <input type='submit' value='Afficher les commentaires' name='Afficher'

 </form>
 
<?php
if(isset($_POST["Envoyer"])) {
   
}

if(isset($_POST["Afficher"])) {
    if (file_exists("livredor.txt")) {
        $f=fopen("livredor.txt","r");
        $T=file("livredor.txt");
    
        for ($i=0;$i<count($T);$i++)
        {
            echo '<table>';
            $Tpers=explode(";",$T[$i]);
            echo '<tr><th> date </th><td>'.date("d/m/y",$Tpers[0]).'</td><th> Nom </th><td>'.$Tpers[1].'</td><th> Mail </th><td>'.$Tpers[2].'</td><th> commentaires </th><td colspan=3 >'.$Tpers[3].'</td></tr>';
            echo '</table>';
        }
         //*<tr> pour une ligne // <th> texte en gras dans une cellule // <td> texte normal dans une cellule *//
    }
    else 
        echo 'Personne n\'a écrit sur le livre d\'or';
        fclose($f);
}
?>
</body>
</html>
