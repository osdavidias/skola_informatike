<!Doctype-html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css">

</head>

<body>

<ul style="float:right;list-style-type:none;">
    <li><a href="registracija.php">Registracija</a></li>
    <li><a class="active" href="login.php">Login</a></li>
  </ul>
</ul>

<ul>
   <li><a href="index.php">Početna</a></li>
   <li><a href="onama.php">O nama</a></li>
   <li><a href="gdjesmo.php">Gdje smo</a></li>
</ul>
<form method="post">
<h2>Unesi korisničko ime i lozinku</h2>
Username:<br>
<input type="text" name="korisnik" id="korisnik">
<br>Password:<br>
<input type="password" name="lozinka" id="lozinka"><br>
<button class="dugme" name="posalji">Unesi</button>
</form>

<?php
include "connection.php";

if (isset($_POST["posalji"])) {

$korisnik=$_POST["korisnik"];
$lozinka=$_POST["lozinka"];

$korisnik=stripslashes($korisnik);
$lozinka=stripslashes($lozinka);
$korisnik=mysql_real_escape_string($korisnik);
$lozinka=mysql_real_escape_string($lozinka);
$lozinka=md5($lozinka);

$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query="SELECT * FROM polaznici WHERE username= ? AND password= ?";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $korisnik);
$stmt->bindParam(2, $lozinka);
$stmt->execute();

$rezultat=$stmt->fetchAll(PDO::FETCH_OBJ);
if (empty($rezultat) OR !$rezultat)
 {
	echo '<div class="krivo">Pogrešno korisničko ime ili lozinka!</div>';
}
	
else 
 {

	session_start();
	$_SESSION["user"]=$korisnik;
	$_SESSION["pass"]=$lozinka;
	header("location:login_uspjesan.php");

}
unset($pod);

}


?>

<div id="footer">© Škola informatike </div>
</body>


</html>