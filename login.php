
<?php if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
 header("location: home.php");
 exit;
 //session_start();
} ?>
<?php
include('conectare.php') 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Conecteaza-te!</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('eroare.php'); ?>
  	<div class="input-group">
  		<label>Nume utilizator</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Parola</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Nu ai inca un cont? <a href="inregistrare.php">Inregistreaza-te!</a>
  		
  	</p>
  </form>
</body>
</html>