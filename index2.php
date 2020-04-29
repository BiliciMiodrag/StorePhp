<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
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
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($produs_id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
<link rel='stylesheet' href='style1.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Simple Shopping Cart using PHP and MySQL</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart1.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($db,"SELECT * FROM `produse`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='produs_id' value=".$row['produs_id']." />
			  <div class='image'><img src='".$row['produs_imagine']."' /></div>
			  <div class='name'>".$row['produs_nume']."</div>
		   	  <div class='price'>$".$row['produs_pret']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
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