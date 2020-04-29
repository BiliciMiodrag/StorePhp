<?php 

//session_start();

include('conectare.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Inregistrare</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Inregistrare</h2>
  </div>
	
  <form method="post" action="inregistrare.php">
  	<?php include('eroare.php'); ?>
  	<div class="input-group">
  	  <label>Nume utilizator</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Parola</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirma-ti parola</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Inregistreaza-te!</button>
  	</div>
  	<p>
  		Sunteti deja membru? <a href="login.php">Autentifica-te!</a>
  	</p>
  </form>
</body>
</html>