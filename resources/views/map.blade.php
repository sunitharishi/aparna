<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Aparna - Site Layout</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  
 
  <style>
  img {
  max-width: 100%;
  height: auto;
}

.js .imagemap__item {
  display: none;
}

@media screen and (min-width: 48em) {
  .imagemap__item:target {
    display: block;
  }

  .imagemap__item:target > .imagemap__text {
    display: block;
  }
}
  </style>  
</head>
<body>
  <div class="m-imagemap">
	<img class="imagemap__img" src="/images/Aparna-Site-Layout.jpg" alt="Infografik1" usemap="#imagemap1" height="619" width="983">
    <map id="imagemap1" name="imagemap1">
      <area shape="rect" alt="Park One" coords="700,450,900,360" href="parkone.html" target="_blank" title="Park One"/>
      <area shape="rect" alt="Park Two" coords="690,280,650,310" href="parktwo.html" target="_blank" title="Park Two"/>
      <area shape="rect" alt="Park Three" coords="590,450,700,500" href="parkthree.html" target="_blank" title="Park Three"/>
    </map>
	</div>
    <!--<script  src="js/index.js"></script>-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!--<script  src="/js1/index.js"></script>-->


</body>

</html>
