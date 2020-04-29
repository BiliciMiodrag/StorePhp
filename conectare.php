<?php
session_start();

// initializare variabile
$username = "";
$email    = "";
$errors = array(); 

// conectare la baza de date
$db = mysqli_connect('localhost', 'root', '', 'magazinvirtual');
/*if($db)
{
  echo "S-a conectat la baza de date";

}
else
{
  echo "Nu s-a conectat la baza de date";
}
*/
// Inregistreare utilizator
if (isset($_POST['reg_user'])) {
  //  ia toate inputurile din formular
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //  se asigura ca formularul este corect completat
  //  sunt adaugate erorile de la variabila $errors
  if (empty($username)) { array_push($errors, "Completati numele utilizatorului"); }
  if (empty($email)) { array_push($errors, "Completati adresa de email"); }
  if (empty($password_1)) { array_push($errors, "Completati parola"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Cele doua parole nu coincid");
  }
  //prima data verificam baza de date sa fim siguri ca nu exista un utilizator cu acelasi nume

  $user_check_query = "SELECT * FROM clienti WHERE client_username='$username' OR client_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // daca exista utilizatorul
    if ($user['username'] === $username) {
      array_push($errors, "Numele utilizatorului exista deja, va rog alegeti alt nume");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Adresa de email exista deja, va rog alegeti alta adresa de mail");
    }
  }

  // la final se inregistreaza utilizatorul daca nu sunt erori
  if (count($errors) == 0) {
  	$password = md5($password_1);//encriptarea parolei in baza de date

  	$query = "INSERT INTO clienti (client_username, client_email, client_password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Sunteti acum conectat!";
  	header('location: home.php');
  }
}
// Logarea utilizatorului
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Numele utilizatorului trebuie completat");
  }
  if (empty($password)) {
    array_push($errors, "Parola este necesara");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM clienti WHERE client_username='$username' AND client_password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Autentificarea dumneavoastra a avut succes!";
      header('location: home.php');
    }else {
      array_push($errors, "Nume utilizator sau parola gresita");
    }
  }
}

?>