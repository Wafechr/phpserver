<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    $T= file ('personne.txt'); //transfére les fichiers en tableaux
echo '<ol>';
for ($i=0;$i<count($T);$i++)
{
    $T1= explode(";", $T[$i]);
    echo '<li>'.$T1[1];
}
echo '</ol>'
?>
</body>
</html>