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

<?php

function nije_prazno($a)
{
  //for ($i=0; $i<func_num_args(); $i++) { 
  if (empty($a)) {
    echo 0;
  }
    else {
      echo 1;
    }
  //}


}
$a="";
echo $a;
echo '<br>';
echo nije_prazno($a);
?>


</body>



</html>