<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
  $f= fopen ('connexion.txt', 'a+');
 fputs ($f, time());
 fseek($f,0);
  while (!feof ($f))
  { $d= fgets($f,11);                   //while ($d=fgets($f,11))
    echo date('h F h:i:s',$d).'<br/>';}
fclose($f)
?>
  <a href='whats lalala'> hhh </a>
</body>
</html>
