<?php

// Resume session
session_start();

// If origin differs from form submission
if(!isset($_SESSION['form-submitted'])) {

  // redirect to form
  header('Location: index.php');

  // stop script
  exit;
} 

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
// $password_length = $password_settings['password_length'] ?? 8;

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
$password = generatePassword($password_settings);

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
  
  <main>
    <!-- ⚠️ DA STRINGERE TROPPO LARGO -->
    <!-- ⚠️ DA SPAZIARE -->    
    
    <div class="outer_container">

      <div class="container">
        
        <div class="heading">
          <h1>Password Generator</h1>
          <h2>Get Your New Password!</h2>
        </div>
        
        <div class="password_container">

          <p id="password" class="password">
            <?php echo $has_length ? $password : '<small>-- password will be printed here --</small>' ?>
          </p> 


        </div>
  
        <div class="password_settings">
          <p class='password_settings_recap'>
            <?php             
              echo $has_length
                ? "<span> " . strlen($password)
                : "";
            
              echo $repeated_chars_allowed
                ? " chars</span><br>"                   
                : " unique chars</span><br>";
  
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
                      
          <p class='note'>
            Note: 
            <br>• If repeated chars preference hasn't been selected, 'not allowed' is applied by default.
            <br>• If no char type has been selected, all chars type are applied by default.
          </p>
  
        </div>

      </div>

    </div> 

  </main>

</body>
</html>