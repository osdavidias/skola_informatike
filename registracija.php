<!Doctype-html>
<html>
<head>


<link rel="stylesheet" type="text/css" href="stil.css">

</head>


<body>


<ul style="float:right;list-style-type:none;">
    <li><a class="active" href="registracija.php">Registracija</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</ul>

<ul>
   <li><a href="index.php">Početna</a></li>
   <li><a href="onama.php">O nama</a></li>
   <li><a href="gdjesmo.php">Gdje smo</a></li>
</ul>

<h2>Registracija polaznika</h2>

<form method="post" enctype="multipart/form-data">

Ime:<br>
<input type="text" name="ime"><br>
Prezime:<br>
<input type="text" name="prezime"><br>
Adresa:<br>
<input type="text" name="adresa"><br>
Mjesto:<br>
<input type="text" name="mjesto"><br>
Slika<br>
<input type="file" name="slika"><br>
Email:<br>
<input type="text" name="mail"><br>
Korisničko ime:<br>
<input type="text" name="username"><br>
Lozinka:<br>
<input type="password" name="password"><br>
Tečaj:
<select name="tecaj">
<?php
include "connection.php";
$pdo=new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query="SELECT * FROM predavaci";
$stmt=$pdo->query($query);
$rezultat=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($rezultat as $key => $value) {
	 echo '<option value="'.$value->br_predavaca.'">'.$value->naziv_tecaja.", ".$value->ime_predavaca." ".$value->prezime_predavaca;
	 echo '</option>';

}
unset($pdo);


?>
</select>
<br><input type="submit"class="dugme" name="dugme" value="Pošalji">



</form>

<?php
if (isset($_POST["dugme"])) {
$uploaddir='C:/xampp/htdocs/test/skola_informatike/slike/';
$uploadfile=$_FILES["slika"]["name"];
$novi=$uploaddir.$uploadfile;
move_uploaded_file($_FILES["slika"]["tmp_name"], $novi);	

function ciscenje($a)
{
$a=mysql_real_escape_string($a);
$a=stripslashes($a);
return $a;

}

$ime=ciscenje($_POST["ime"]);
$prezime=ciscenje($_POST["prezime"]);
$adresa=ciscenje($_POST["adresa"]);
$mjesto=ciscenje($_POST["mjesto"]);
$slika=$_FILES["slika"]["name"];
$mail=ciscenje($_POST["mail"]);
$username=ciscenje($_POST["username"]);
$password=ciscenje($_POST["password"]);
$tecaj=$_POST["tecaj"];

$password = md5($password);

$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query="INSERT INTO polaznici (ime, prezime, adresa, mjesto, slika, mail, username, password, tecaj)";
$query.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $ime);
$stmt->bindParam(2, $prezime);
$stmt->bindParam(3, $adresa);
$stmt->bindParam(4, $mjesto);
$stmt->bindParam(5, $slika);
$stmt->bindParam(6, $mail);
$stmt->bindParam(7, $username);
$stmt->bindParam(8, $password);
$stmt->bindParam(9, $tecaj);
$stmt->execute();
unset($pdo);











}






?>

</body>


</html>