<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
for ($i=1 ; $i<=10 ; $i++)
$T[$i]= rand(0,20);
echo '<table border=1><tr>';
for ($i=1; $i<=10; $i++)
	echo'<td>'.$T[$i].'</td>';
echo '</tr></table>';
?>
</body>
</html>