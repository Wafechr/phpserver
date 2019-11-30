<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>   
	<?php  
           try{
          $bdd= new PDO('mysql:host=localhost;dbname=tp2;charset=utf8','root',"");
           }
           catch (Exception $e) { die('Erreur : ' . $e->getMessage());
            } //*connexion à la BD et détection des probs

            $requette=$bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 10'); 
            while ($enreg=$requette->fetch()){
            	echo '<b>'.$enreg["pseudo"].'</b> :'.$enreg["messages"].'<br/>';
 }
         if (isset($_COOKIE["pseudonyme"])) {

             $visiteur = $_COOKIE["pseudonyme"];
        }
         	else {
                 $visiteur="";
         }
           ?>
	<form  name="minichat"  action="minichat_post.php"  method='POST'  >
	  <table width="400" border="1">
            <tr>
                  <td> Pseudo : </td>
                  <td> <input type="text" name="pseudo" value=<?php echo $visiteur;?> /></td>
              </tr>
              <tr> <td> Message : </td>
              <td><input type="textarea" name="messages"></td>
          </tr>
               <tr> <td colspan="2"> 
            <input type="submit" name="envoyer" value="envoyer"/> </td></tr>
        </table>
    </form>
</body>
</html>