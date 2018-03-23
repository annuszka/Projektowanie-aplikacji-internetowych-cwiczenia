<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>php</title>
<link rel="stylesheet" href="styl410.css" />

</head>
<?php
  if(isset($_GET['kolor']))
  {
    $kolor = $_GET['kolor'];  //get jak chcemy zeby dzialalo po kliknieciu uzytkownika
   setcookie("kolor",$kolor, time()+10*60); // przez 10 min bedzie pamietac kolor, zapis ciasteczka
   
   }
  else if(isset($_COOKIE['kolor']))
  {
    $kolor = $_COOKIE['kolor'];                 //odswiezenie strony bedzie odswieza tez ciasteczko, trzeba znowu ustawic albo ten czas ustawnony wczesniej
     setcookie("kolor",$kolor, time()+10*60);
  }
  else
  
    $kolor = 'white';
?>

<body style="background-color: <?php print($kolor); ?>">
   <h3>Metoda GET i odnosniki</h3>
   <p>wybierz kolor:</p>
   <a href="c24.php?kolor=lightgreen">Zielony</a><br />
   <a href="?kolor=lightpink">Rozowy</a><br />
   <a href="?kolor=lightskyblue">niebieski</a><br />
   <a href="?kolor=lightyellow">zolty</a><br />
   <a href="?kolor=lightgray">szary</a><br />
<?php

?>
</body>
</html>