<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["produs_id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Produsul este eliminat din cosul de cumparaturi!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['produs_id'] === $_POST["produs_id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title>Cos de cumparaturi</title>
<link rel='stylesheet' href='style1.css' type='text/css' media='all' />
<link rel='stylesheet' href='cssprincipala.css' type='text/css'  />
</head>
<body>
<div class="header">
  <a href="home.php" class="logo">Phone Care</a>
  <div class="header-right">
    <a class="active" href="cart1.php">Cos</a>
    <a href="login.php">Contul meu</a>
</div>
</div>

<div style="width:700px; margin:50 auto;">

<h2>Cos de cumparaturi - Phone Care</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart1.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>Nume produs</td>
<td>Cantitate</td>
<td>Pret unitar</td>
<td>Total</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["produs_imagine"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["produs_nume"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='produs_id' value="<?php echo $product["produs_id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Elimina produsul</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='produs_id' value="<?php echo $product["produs_id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["produs_pret"]; ?></td>
<td><?php echo "$".$product["produs_pret"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["produs_pret"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Cosul tau de cumparaturi este gol!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />

</div>
</body>
</html>