<!DOCTYPE html>
<html>
        <head>
            <meta charset='utf-8' />
            <title>PHP - terminarz</title>
            <link rel="stylesheet" href="styl.css"/>
        </head>
<body>
    <h3>Terminarz</h3>
    <table><tbody>
<?php
$db = new PDO('sqlite:terminy.db');
$db->exec("CREATE TABLE IF NOT EXISTS terminy(dzien INTEGER PRIMARY KEY, opis TEXT)");
$db->exec("INSERT INTO terminy(dzien,opis) VALUES(3, 'Spotkanie o 13:13')");
$dni = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');

//obsługa nowych danych i formularza
if(isset($_POST['opis']))
{
    $opis = substr(strip_tags($_POST['opis']),0,1000);
    $dzien = intval($_POST['dzien']);
    $sql = "INSERT OR REPLACE INTO terminy(dzien,opis) VALUES(:dzien,:opis)";
    $res = $db->prepare($sql);
    $res->bindValue(':dzien', $dzien);
    $res->bindValue(':opis', $opis);
    $res->execute();
}





foreach($dni as $k=>$d)
{
    $sql = "SELECT opis FROM terminy WHERE dzien = $k";
    $opis = $db->query($sql)->fetch()['opis'];
    print '<tr>';
    if(empty($opis)) print '<td class="wolny">'; else print '<td class="zajety" title="'.$opis.'">';
    print '<a href="?d='.$k.'">'.$d.'</a>';
    print '</td>';
    print'</tr>'.PHP_EOL;
}
?>
</tbody></table>
<?php
if(isset($_GET['d'])) //kliknięcie w konkretny dzień
{
    $d = intval($_GET['d']);
    if($d>=1 && $d<=7)
    {
    $sql = "SELECT opis FROM terminy WHERE dzien = $d";
    $opis = $db->query($sql)->fetch()['opis'];

        

?>
<hr >
<form action="<?php print $_SERVER['SCRIPT_NAME'] ?>" method="post">
<input type="hidden" name="dzien" value="<?php print $d; ?>"/>
<?php print $dni[$d]; ?>: <input type="text" name="opis" value="<?php print $opis;?>" />
</form>
<?php
}
}
?>


</body>


</html>
