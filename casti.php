<?php

//session_start();
include('conectare.php');
$status="";
if (isset($_POST['produs_id']) && $_POST['produs_id']!=""){
$produs_id = $_POST['produs_id'];
$result = mysqli_query($db,"SELECT * FROM `produse` WHERE `produs_id`='$produs_id'");
$row = mysqli_fetch_assoc($result);
$name = $row['produs_nume'];
$produs_id = $row['produs_id'];
$price = $row['produs_pret'];
$image = $row['produs_imagine'];

$cartArray = array(
  $produs_id=>array(
  'produs_nume'=>$name,
  'produs_id'=>$produs_id,
  'produs_pret'=>$price,
  'quantity'=>1,
  'produs_imagine'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
  $_SESSION["shopping_cart"] = $cartArray;
  $status = "<div class='box'>Produsul a fost adaugat in cos!</div>";
}else{
  $array_keys = array_keys($_SESSION["shopping_cart"]);
  if(in_array($produs_id,$array_keys)) {
    $status = "<div class='box' style='color:red;'>
    Produsul este deja adaugat in cos!</div>";  
  } else {
  $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
  $status = "<div class='box'>Produsul este adaugat in cos!</div>";
  }

  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="cssprincipala.css">
  <link rel='stylesheet' href='style1.css' type='text/css' media='all' />
</head>
<body>

<div class="header">
  <a href="home.php" class="logo">Phone Care</a>
  <div class="header-right">
    <a class="active" href="cart1.php">Cos</a>
    <a href="login.php">Contul meu</a>
</div>

</div>
<div class="categorii">
  <div class="search-right">
<form action="search.php" method="GET">
        <input type="text" name="query" />
        <input id="submit" type="submit" value="Search" />
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
      <a href="incrwir.php">Incarcatoare wireless</a>
    </div>
</div>

<div class="subcategorii">
    <button class="subnavbtn">Audio <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="incwir.php">Casti audio</a>
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
<div style="width:700px; margin:50 auto;">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}

$result = mysqli_query($db,"SELECT * FROM produse WHERE produs_categorie='Casti audio'  ORDER BY produs_id ASC" );
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
        <form method='post' action=''>
        <input type='hidden' name='produs_id' value=".$row['produs_id']." />
        <div class='image'><img src='".$row['produs_imagine']."' /></div>
        <div class='name'>".$row['produs_nume']."</div>
          <div class='price'>$".$row['produs_pret']."</div>
          <div class='descriere'>".$row['produs_descrierecompl']."</div>
        <button type='submit' class='buy'>Cumpara acum</button>
        </form>
          </div>";
        }
mysqli_close($db);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />

</div>
</body>
</html>


