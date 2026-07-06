<?php

  // Resume session
  session_start();

  // Get session variables
  $password_length = $_SESSION['password_length'] ?? null;

  // Get password generator function `generatePassword()
  require __DIR__ . '/functions.php';

  // Store password into a variable
  $password = generatePassword($password_length);

  // Set support variable
  $has_password = strlen($password) > 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./src/css/style.css">

  <title>Your New Password</title>
</head>
<body>
  
  <header>
    <h1>Password Generator</h1>
    <h2>Get Your New Password!</h2>
  </header>

  <main>
  
    <!-- ⚠️ DA STRINGERE TROPPO LARGO -->
    <!-- ⚠️ DA SPAZIARE -->
    <div class="password_container">
      <p id="password" class="password">
        <?php echo $has_password ? $password : '<small>-- password will be printed here --</small>' ?>
      </p> 

      <?php echo $has_password
        ? 
        "<p id='show_length'>
          <small>
            Password length: 
            <span id='length'>" . strlen($password) .
            "</span>
          </small>
        </p>" 
        : 
        '' 
      ?>

    </div>

  </main>

</body>
</html>