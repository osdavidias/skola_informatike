<html>
<head>
<head>
 
<link rel="stylesheet" type="text/css" media="screen" href="stil.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.minimus-1.3.min.js"></script>

 
 


</head>


<body>

<div id="my_slider" class="minimus-slider">

  <!-- images -->
  <!-- for images lazy loading insert a placeholder in "src" and the path to the image in "data-src" -->
  <!-- for hi resolution images suport insert the path to the hi resolution image in "data-src-2x" -->
  <div class="minimus-slide">
    <img src="slike/pre1.jpg" data-src="slike/pre1.jpg" data-src-2x="slike/pre1.jpg" alt="alt text" title="img caption" />
    <!-- insert an image "title" if you want a caption for your image -->
  </div>

</div>
<!-- navigation controls -->
<div class="minimus-navslide">
  <span class="minimus-prev">previous slide</span>
  <span class="minimus-start">start auto play</span>
  <span class="minimus-stop">stop auto play</span>
  <span class="minimus-next">next slide</span>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $("#my_slider").minimus();
});
</script>
</body>



</html>
