if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Sanitize user input

  $credentials = [

    'username' => filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING),

    'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)

  ];



  // Check if the username and password match a valid user

  if ($VAILD_USERNAME == $credentials['username'] && $VAILD_PASSWORD == $credentials['password']) {

    redirect('home.html');

  } 

  // Check if the username and password match the admin user

  else if ($ADMIN_USERNAME == $credentials['username'] && $ADMIN_PASSWORD == $credentials['password']) {

    redirect('teacherhome.html');

  }

  // If the username and password don't match any valid user, redirect to the login page

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

