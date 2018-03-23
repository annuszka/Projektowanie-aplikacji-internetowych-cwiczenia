<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>php</title>
<link rel="stylesheet" href="styl410.css" />
</head>
<body>
    <h3>Formularz osobowy</h3>
    <p>Podaj dane: </p>
    <?php
    //przed formularzem przetwarzanie danych
    //odebranie danych
      if(isset($_POST['imie'])) $imie = $_POST['imie'];
      if(isset($_POST['nazwisko'])) $naz = $_POST['nazwisko'];
      if(isset($_POST['email'])) $email = $_POST['email'];
      if(isset($_POST['tel'])) $tel = $_POST['tel'];
      
    //sprawdzanie danych i komunikatyu o bledach
    if(!empty($imie) || !empty($naz) || !empty($email) || !empty($tel))
    {
    if(empty($imie) || !preg_match('/^[A-Z£Œ¯][a-z¹æê³óñœ¿Ÿ]+$/',$imie))
      print('<p class="error">Niepoprawne imie</p>'.PHP_EOL);
    if(empty($naz) || !preg_match('/^[A-Z£ÓÆŒ¯][a-z¹æê³óñœ¿Ÿ]+$/',$naz))
      print('<p class="error">Niepoprawne nazwisko</p>'.PHP_EOL);
      if(empty($email) || !preg_match('/^[a-z0-9\-]+(\.?[a-z0-9\-]+)*@[a-z0-9\-]+(\.[a-z0-9\-]+)+$/i',$email))    //i oznacza ze case insensitive?
      print('<p class="error">Niepoprawne email</p>'.PHP_EOL);
      if(empty($tel) || !preg_match('/^\+?[0-9]+$/',$tel))
      print('<p class="error">Niepoprawne telefon</p>'.PHP_EOL);  
      
      
      }
    ?>
   <form method="post" action="">    
    Imie: <input type="text" name="imie" /><br />
    Nazwisko: <input type="text" name="nazwisko" /><br />
    E-mail: <input type="text" name="email" /><br />
    Telefon: <input type="text" name="tel" /><br />
    <input type="submit" value="Zapisz" />
   </form>
</body>
</html>