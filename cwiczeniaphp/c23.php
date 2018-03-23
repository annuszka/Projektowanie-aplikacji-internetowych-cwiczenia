<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>php</title>
<link rel="stylesheet" href="styl410.css" />
</head>
<body>
<h3>Tabela  wygenerowana w PHP</h3>
<table>
 <thead>
 <tr><th>Lp.</th><th>Numer</th><th>cena</th></tr>
 </thead>
 <tbody>
<?php
   for($i=1; $i<10;$i++) 
   {
   print('  <tr>');     //php.eol koniec linii w kodzie a na stronie dopiero jak br
   print('<td>'.$i.'</td>');
   print('<td>'.mt_rand(1000000,9999999).'</td>');
   print('<td>'.mt_rand(1,99).'</td>');
   print('</tr>'.PHP_EOL);
    }
?>
</tbody>
</body>
</html>