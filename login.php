<?php



$VAILD_EMAIL = "member@gmail.com";

$VAILD_PASSWORD = "member123";

$ADMIN_EMAIL = "admin@gmail.com";

$ADMIN_PASSWORD = "admin123";



// Check if the form has been submitted

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Sanitize user input

  $credentials = [

    'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),

    'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)

  ];



  // Check if the email and password match a valid user

  if ($VAILD_EMAIL == $credentials['email'] && $VAILD_PASSWORD == $credentials['password']) {

    redirect('/home.php');

  } 

  // Check if the email and password match the admin user

  else if ($ADMIN_EMAIL == $credentials['email'] && $ADMIN_PASSWORD == $credentials['password']) {

    redirect('/adminpage.php');

  }

  // If the email and password don't match any valid user, redirect to the login page

  else {

    $_SESSION["status"] = "NotLoggedIn";

    $_SESSION['login_error_msg'] = "Sorry, that user name or password is incorrect. Please try again.";

    header("Location: index.php");

    exit();

  }

}



// Redirect to the given URL

function redirect($url) {

  header("Location: $url");

  exit();

}



?>
