<!Doctype-html>
<html>

<head>

<title>Škola informatike</title>
<meta name="description" content="Obrazovanje i podučavanje informatičkih tehnologija u programiranja">
<meta name="keywords" content="škola, obrazovanje, programiranje, poduka">
<meta charset="UTF-8">
<link rel="stylesheet" href="orbit-1.2.3/orbit-1.2.3.css"> 
<link rel="stylesheet" type="text/css" href="stil.css">
</head>

<body>


<ul style="float:right;list-style-type:none;">
    <li><a href="registracija.php">Registracija</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</ul>


<h1>ŠKOLA INFORMATIKE</h1>
<ul>
   <li><a class="active" href="index.php">Početna</a></li>
   <li><a href="onama.php">O nama</a></li>
   <li><a href="gdjesmo.php">Gdje smo</a></li>
 
</ul> 
<br>

<!-- slider sa slikama -->
<h3>Naši profesori:</h3> 
<div id="featured"> 
     <img src="slike/pre1.jpg" alt="Pero Perić" />
     <img src="slike/pre2.jpg"  alt="Jure Jurić" />
     <img src="slike/pre3.jpg" alt="Miki Mikić" />
</div>




  

<br>
<!-- Pie google charts grafički prikaz:  -->

<?php
include "connection.php";
$n1="PHP";
$n2="C#";
$n3="Java";

// za PHP polaznike
$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query= "SELECT COUNT(br_polaznika) AS broj FROM polaznici JOIN predavaci ON polaznici.tecaj=predavaci.br_predavaca
WHERE naziv_tecaja LIKE ?";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $n1);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);
$a=$result->broj; 
unset($pdo);

// za #C polaznike
$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query= "SELECT COUNT(br_polaznika) AS broj FROM polaznici JOIN predavaci ON polaznici.tecaj=predavaci.br_predavaca
WHERE naziv_tecaja LIKE ?";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $n2);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);
$b=$result->broj; 
unset($pdo);

// za Java polaznike
$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass);
$query= "SELECT COUNT(br_polaznika) AS broj FROM polaznici JOIN predavaci ON polaznici.tecaj=predavaci.br_predavaca
WHERE naziv_tecaja LIKE ?";
$stmt=$pdo->prepare($query);
$stmt->bindParam(1, $n3);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_OBJ);
$c=$result->broj; 
unset($pdo);
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      google.load('visualization', '1.0', {'packages':['corechart']});

      google.setOnLoadCallback(drawChart);

      
      function drawChart() {

       
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
          echo "['".$n1."',".$a."],";
          echo "['".$n2."',".$b."],";
          echo "['".$n3."',".$c."]";
          ?>
         
        ]);

       
        var options = {'title':'Broj polaznika po programu obrazovanja',
                       'width':400,
                       'height':300};

        
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
 

  
   
    <div id="chart_div"></div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="orbit-1.2.3/jquery.orbit-1.2.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
     $(window).load(function() {
         $('#featured').orbit({
              bullets: true
         });
     });
</script>

</body>



</html>