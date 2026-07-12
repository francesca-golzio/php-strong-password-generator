<?php

  /* Resume session */
  session_start();

  /* Origin safety check */
  // IF origin is not form submission
  if(!isset($_SESSION['form-submitted'])) {

    // Redirect to form
    header('Location: index.php');

    // Stop script
    exit;
  } 

  /* Get password settings (or default) */
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


  /* Save usefull variables (or default) */
  
  // Repeated chars: allowed?
  $repeated_chars_allowed = $password_settings['repeated_chars_allowed'] ?? false;

  // Requested chars
  $has_requested_chars = (!empty($password_settings['has_requested_chars']) && !empty(array_filter($password_settings['has_requested_chars']))) 
  ? $password_settings['has_requested_chars'] 
  : [
    'wants_alpha_low_char' => true,
    'wants_alpha_up_char' => true,
    'wants_numb_char' => true,
    'wants_spec_char' => true,
    ];


  /* Generate password */

  // Get password generator function `generatePassword()`
  require __DIR__ . '/functions.php';

  // Store password into a variable
  $password = generatePassword($password_settings);

  // Set support variable (rendering length)
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
  
  <main>
    
    <div class="outer_container">
      <div class="container">

        <!-- Back button -->
        <nav>
          <a href="index.php">&larr; back to form</a>
        </nav>
        
        <!-- Heading -->
        <div class="heading">
          <h1>Password Generator</h1>
          <h2>Get Your New Password!</h2>
        </div>
        
        <!-- Password container -->
        <div class="password_container">
          <p id="password" class="password">
            <?php echo $has_length ? $password : '<small>-- password will be printed here --</small>' ?>
          </p> 
        </div>
  
        <!-- Password settings recap -->
        <div class="password_settings">
          <p class='password_settings_recap'>
            <?php

              /* Render password length */
              echo $has_length
                ? "<span> " . strlen($password)
                : "";
            
              /* Render repeated chars preference */
              echo $repeated_chars_allowed
                ? " chars</span><br>"                   
                : " unique chars</span><br>";
  
              /* Render requested chars */
              if ($has_requested_chars) {  
                foreach($has_requested_chars as $key => $value) {
                  
                  if ($key === 'wants_alpha_low_char' && $value === true) {
                    echo "<span aria-label='Lowercase Letters'>a b c</span> • ";
                  }
  
                  if ($key === 'wants_alpha_up_char' && $value === true) {
                    echo "<span aria-label='Uppercase Letters'>A B C</span> • ";
                  }
  
                  if ($key === 'wants_numb_char' && $value === true) {
                    echo "<span aria-label='Numbers'>1 2 3</span> • ";
                  }
  
                  if ($key === 'wants_spec_char' && $value === true) {
                    echo "<span aria-label='Special Characters'>@ # !</span>";
                  }

                }                
              }               
              
            ?>
                  
          </p>
                     
          <!-- Disclaimer -->
          <p class='note'>
            Note: 
            <br>• If no preference forrepeated characters has been selected, 'not allowed' is applied.
            <br>• If no character type has been selected, all character types are applied.
          </p>
  
        </div>

      </div>
    </div> 

  </main>

</body>
</html>