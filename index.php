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
<?php
include 'connection.php';

$pdo=new PDO ("mysql:host=$host; dbname=$baza", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$query="SELECT * FROM predavaci";
$stmt=$pdo->prepare($query);
$stmt->execute();
$rezultat=$stmt->fetchAll(PDO::FETCH_OBJ);


?>
<h3>Naši profesori:</h3> 
<div id="featured"> 
  <?php
  foreach ($rezultat as $key => $value) {
    
  echo '<img src="slike/'.$value->slika_predavaca.'" alt="'.$value->ime_predavaca.'" data-caption="#htmlCaption'.$value->br_predavaca.'" />';
     
     }
     ?>
</div>
<?php
foreach ($rezultat as $key => $value) {
 
echo '<span class="orbit-caption" id="htmlCaption'.$value->br_predavaca.'">'.$value->ime_predavaca." ".$value->prezime_predavaca.'</span>';
}
unset($pdo);
?>

  

<br>
<!-- Pie google charts grafički prikaz:  -->

<?php




$pdo = new PDO ("mysql:host=$host; dbname=$baza", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$query= "SELECT naziv_tecaja, COUNT(br_polaznika) AS broj FROM polaznici JOIN predavaci ON polaznici.tecaj=predavaci.br_predavaca
GROUP BY naziv_tecaja";
$stmt=$pdo->prepare($query);

$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);


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
          foreach ($result as $key => $v)

        {

          echo "['".$v->naziv_tecaja."',".$v->broj."],";


          }
          
          ?>
         
        ]);

       
        var options = {'title':'Broj polaznika po programu obrazovanja:',
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
              bullets: true,
              captions: true
         });
     });
</script>

<div id="footer">© Škola informatike </div>
</body>



</html>