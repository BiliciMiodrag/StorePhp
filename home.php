
<?php 
 //session_start()
  include 'conectare.php';
?> 
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <link rel="stylesheet" type="text/css" href="cssprincipala.css">
  <link rel="stylesheet" type="text/css" href="slider.css">

</head>
<body>
<div class="cart_div">
<div class="header">
  <a href="#" class="logo"> Phone Care</a>
  <div class="header-right">
    <a class="active" href="cart1.php">Cos</a>
    <a 
<?php if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
 header("location: home.php");
 exit;
}?> href="login.php">Contul meu</a>
   
</div>

</div>
<div class="categorii">
	<div class="search-right">
<form action="search.php" method="GET">
        <input type="text" name="query" />
        <input  type="submit" name="submit" value="Search" />
        
 </form>
</div>

 <div class="subcategorii">
    <button class="subnavbtn">Huse si Folii<i class="fa fa-caret-down"></i> </button>
    <div class="subnav-content">
      
     <a href="husa.php">Huse si carcase</a>
      <a href="folii.php">Folii de protectie</a>
    </div>
</div>

<div class="subcategorii">
    <button class="subnavbtn">Incarcatoare<i class="fa fa-caret-down"></i> </button>
    <div class="subnav-content">
      <a href="incarcatoareauto.php">Incarcatoare auto</a>
      <a href="incarcatoarepriza.php">Incarcatoare priza</a>
      <a href="incwir.php">Incarcatoare wireless</a>
    </div>
</div>

<div class="subcategorii">
    <button class="subnavbtn">Audio <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="casti.php">Casti audio</a>
      <a href="boxe.php">Boxa portabila</a>
    </div>
</div>

<div class="subcategorii">
    <button class="subnavbtn">Baterii si cabluri <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="baterii.php">Baterii externe</a>
      <a href="cabluri.php">Cabluri</a>
    </div>
</div>

<div class="subcategorii">
    <button class="subnavbtn">Stocare date<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="stick.php">Stick-uri</a>
      <a href="carduri.php">Carduri de memorie</a>
    </div>
</div>
</div>

<div class="header">
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3 align="center">
          <?php 

            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <p style="text-align: center;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p style="text-align: center;"> <a href="login.php" style="color: red;">logout</a> </p>
    <?php endif ?>
    
</div>


<div class="slideshow-container">

  
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="husa-iphone11.jpg" style="width:100%">
   
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="husa-samsung.jpg" style="width:100%">
   
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="casti-sport.jpg" style="width:100%">
   
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<footer>
  <p style="text-align: center; background-color: black;color: white;">Facut de:Bilici Miodrag</p>
  
</footer>
</body>
</html>

