<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clark Center Fires Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <link rel="stylesheet" href="homeCSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  
  
  <script type='text/javascript'>      
	$(document).ready(function() {
       var jumboHeight = $('.jumbotron').outerHeight();
       function parallax(){
       var scrolled = $(window).scrollTop();
       $('.bg').css('height', (jumboHeight-scrolled) + 'px');
     }

$(window).scroll(function(e){
    parallax();
});
        
        });
 </script>
 
 <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   ga('create', 'UA-40413119-1', 'bootply.com');
   ga('send', 'pageview');
 </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
	  <a class="navbar-brand" href="#">
         <img src="logo2.png" alt="" width="150" height="55">
	  </a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
            <li><a href="phpProjectInventory.php">View Inventory</a></li>
            <li><a href="phpProjectContact.php">Contact Us</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="phpProjectLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="bg"></div>
<div class="jumbotron">
  <h1><b>Clarks Center Fires</b></h1>
  <h3> For all your Shooting Needs</h3>
  <h3> You Spot'em We Got'em</h3>
  <h4> Firearms, Ammo, and Accessories</h4>
  
  
</div>


<div id = "carouselmove">
 <!-- CAROUSEL -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="SR222.jpg" alt="..." width = "500" heigh ="375">
      <div class="carousel-caption">
          <h2>Ruger SR22</h2><br />
		  <h3>Caliber: .22</h3>
		  <h3>$399.99</h3>
		  
      </div>
    </div>
    <div class="item">
      <img src="P238.jpg" alt="...">
      <div class="carousel-caption">
          <h2>Sig Sauer P238 Nitron</h2><br />
		  <h3>Caliber: .380</h3>
		  <h3>$549.99</h3>
		  
      </div>
    </div>
    <div class="item">
      <img src="870.jpg" alt="...">
      <div class="carousel-caption">
          <h2 color="black">Remington 870 Express</h2> <br/ >
		  <h3>Gauge: 12</h3>
		  <h3>$379.99</h3>
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->     
</div>

</body>
</html>