<!Doctype-HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css">

</head>

<body>





<?php
include "connection.php";
session_start();




if (!$_SESSION["user"]) {
	header("location:login.php");
}

else
{

echo 
'<ul style="float:right;list-style-type:none;">
 <li><a href="registracija.php">Registracija</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="logout.php">Logout</a></li>

  </ul>
</ul>

<ul>
   <li><a class="active"  href="login_uspjesan.php">Podaci o polazniku</a></li>
</ul>';
echo '<h2 class="polaznik">Podaci o polazniku:</h2>';


$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query="SELECT * FROM polaznici JOIN predavaci ON polaznici.tecaj=predavaci.br_predavaca WHERE username=? AND password = ?";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $_SESSION["user"]);
$stmt->bindParam(2, $_SESSION["pass"]);
$stmt->execute();
$rezultat=$stmt->fetch(PDO::FETCH_OBJ);
echo '<img class="slika" src="slike/'.$rezultat->slika.'"><br>';

echo '<table class="tablica" border="1">';
echo '<tr>';
echo '<th>Ime:</th>
      <th>Prezime:</th>
      <th>Adresa:</th>
      <th>Mjesto:</th>
      <th>Email:</th>
      <th>Username:</th>
      <th>Upisani tečaj:</th>';
echo '</tr>';      
echo '<tr>';
echo '<td>'.$rezultat->ime.'</td>';
echo '<td>'.$rezultat->prezime.'</td>';
echo '<td>'.$rezultat->adresa.'</td>';
echo '<td>'.$rezultat->mjesto.'</td>';
echo '<td>'.$rezultat->mail.'</td>';
echo '<td>'.$rezultat->username.'</td>';
echo '<td>'.$rezultat->naziv_tecaja.'</td>';
echo '</tr>';
echo '</table>';

echo '<br><b>Promijeni lozinku:</b>';
echo '<form method="post">';
echo '<br>Stara lozinka:<br>';
echo '<input type="password" name="stara"><br>';
echo 'Nova loznika:<br>';
echo '<input type="password" name="nova"><br>';
echo 'Potvrdi novu lozinku:<br>';
echo '<input type="password" name="potvrda">'; 
echo '<br><input class="dugme" type="submit" name="dugme" value="Promijeni">';
echo '</form>';

if (isset($_POST["dugme"])) {

function ciscenje($a)
{
$a=mysql_real_escape_string($a);
$a=stripslashes($a);
return $a;
}
$stara=ciscenje($_POST["stara"]);
$nova=ciscenje($_POST["nova"]);
$potvrda=ciscenje($_POST["potvrda"]);

//provjera lozinke
if (!empty($stara) & !empty($nova) & !empty($potvrda)
AND md5($stara==$_SESSION["pass"]) AND $nova==$potvrda) {

$nova=md5($nova);
 

$pdo = NEW pdo ("mysql:host=$host; dbname=$baza", $user, $pass);
$query="UPDATE polaznici SET password = ? WHERE username = ? AND password= ? ";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $nova);
$stmt->bindParam(2, $_SESSION["user"]);
$stmt->bindParam(3, $_SESSION["pass"]);
$stmt->execute();
unset($pdo);  

 $_SESSION["pass"]=$nova;
 echo '<div class="dobro">Lozinka uspješno promijenjena!</div>';
}//kraj uvjeta za provjeru lozinke

else
{
  echo '<div class="krivo">Krivo ste unijeli lozinku!</div>';
}

}// kraj uvjeta za dugme

}// kraj uvjeta za postavljeni session [user]

?>


</body>

</html>