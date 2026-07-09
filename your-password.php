<?php

// Resume session
session_start();

// Get session variables

// get password settings
$password_settings = $_SESSION['password_settings'] 
  ?? [
      'password_length' => 8,
      'repeated_chars_allowed' => false,
      'has_requested_chars' => [
        'wants_alpha_low_char' => true,
        'wants_alpha_up_char' => true,
        'wants_numb_char' => true,
        'wants_spec_char' => true,
      ],
    ];

// get password length
$password_length = $password_settings['password_length'] ?? 8;

// get repeated chars allowed ?
$repeated_chars_allowed = $password_settings['repeated_chars_allowed'] ?? false;

// get requested chars
// IF at least one char is requested and true
$has_requested_chars = (!empty($password_settings['has_requested_chars']) && !empty(array_filter($password_settings['has_requested_chars']))) 
  ? $password_settings['has_requested_chars'] 
  : [
      'wants_alpha_low_char' => true,
      'wants_alpha_up_char' => true,
      'wants_numb_char' => true,
      'wants_spec_char' => true,
    ];
 

// Get password generator function `generatePassword()
require __DIR__ . '/functions.php';

// Store password into a variable
$password = generatePassword($has_requested_chars, $password_length, $repeated_chars_allowed);

// Set support variable
$has_length = strlen($password) > 0;
  

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
        <?php echo $has_length ? $password : '<small>-- password will be printed here --</small>' ?>
      </p> 

      <?php echo $has_length
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