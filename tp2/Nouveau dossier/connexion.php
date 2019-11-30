<!DOCTYPE html>
<html>
<head>

</head>
<body> 
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=tp2;charset=utf8','root',"",
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
    ?>
</body>
</html>
