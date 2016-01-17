<!Doctype-html>
<html>
<head>

<title>Škola informatike</title>
<meta name="description" content="Obrazovanje i podučavanje informatičkih tehnologija u programiranja">
<meta name="keywords" content="škola, obrazovanje, programiranje, poduka">
<meta charset="UTF-8">
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
<input type="text" name="ime"
value="<?php if(!empty($_POST['ime']))
{
 echo $_POST['ime'];
} ?>" ><br>
Prezime:<br>
<input type="text" name="prezime" value="<?php if(!empty($_POST['prezime']))
{
 echo $_POST['prezime'];
} ?>"><br>
Adresa:<br>
<input type="text" name="adresa" value="<?php if(!empty($_POST['adresa']))
{
 echo $_POST['adresa'];
} ?>"><br>
Mjesto:<br>
<input type="text" name="mjesto" value="<?php if(!empty($_POST['adresa']))
{
 echo $_POST['adresa'];
} ?>"><br>
Slika<br>
<input type="file" name="slika"><br>
Email:<br>
<input type="text" name="mail" value="<?php if(!empty($_POST['mail']))
{
 echo $_POST['mail'];
} ?>"><br>
Korisničko ime:<br>
<input type="text" name="username" value="<?php if(!empty($_POST['username']))
{
 echo $_POST['username'];
} ?>"><br>
Lozinka:<br>
<input type="password" name="password"><br>
Potvrdi lozinku:<br>
<input type="password" name="potvrda"><br>
Tečaj:<br>
<select name="tecaj">
<?php
include "connection.php";
$pdo=new PDO ("mysql:host=$host; dbname=$baza", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
	



$ime=$_POST["ime"];
$prezime=$_POST["prezime"];
$adresa=$_POST["adresa"];
$mjesto=$_POST["mjesto"];
$slika=$_FILES["slika"]["name"];
$mail=$_POST["mail"];
$username=$_POST["username"];
$password=$_POST["password"];
$potvrda=$_POST["potvrda"];
$tecaj=$_POST["tecaj"];

function nije_prazno()
{
  
  $par=func_get_args();
  foreach ($par as $key => $value) {
    if (empty($value)) {
      return 0;
    }

  }

}

if (nije_prazno($ime, $prezime, $adresa, $mjesto, $slika, $mail, $username, $password, $potvrda, $tecaj)!== 0
	AND $password==$potvrda)
{
	
$uploaddir='C:/xampp/htdocs/test/skola_informatike/slike/';
$uploadfile=$_FILES["slika"]["name"];
$novi=$uploaddir.$uploadfile;
move_uploaded_file($_FILES["slika"]["tmp_name"], $novi);



$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$query="INSERT INTO polaznici (ime, prezime, adresa, mjesto, slika, mail, username, password, tecaj)";
$query.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $ime, PDO::PARAM_STR);
$stmt->bindParam(2, $prezime, PDO::PARAM_STR);
$stmt->bindParam(3, $adresa, PDO::PARAM_STR);
$stmt->bindParam(4, $mjesto, PDO::PARAM_STR);
$stmt->bindParam(5, $slika);
$stmt->bindParam(6, $mail, PDO::PARAM_STR);
$stmt->bindParam(7, $username, PDO::PARAM_STR);
$stmt->bindParam(8, $password, PDO::PARAM_STR);
$stmt->bindParam(9, $tecaj);
$password = md5($password);
$stmt->execute();
unset($pdo);





echo '<div class="dobro">Podaci uspješno unijeti!</div>';
}// kraj provjere varijabli

else 
{
	echo '<b><div class="krivo">Niste dobro unijeli lozinku ili neko od traženih polja!</div></b>';
}	


}// kraj if isset dugme






?>


</body>


</html>