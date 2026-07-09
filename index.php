<?php
 

  // Open session
  session_start();

  // Save form data into session
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // save password settings
    $_SESSION['password_settings'] = [

      'password_length' => (isset($_POST['password_length']) && (int)$_POST['password_length'] > 0) ? (int)$_POST['password_length'] : 8,

      'repeated_chars_allowed' => (isset($_POST['repeated_chars_allowed']) && $_POST['repeated_chars_allowed'] === 'true') ? true : false,

      'has_requested_chars' => [
        'wants_alpha_low_char' => (isset($_POST['get_alpha_low_char']) && $_POST['get_alpha_low_char'] === 'on') ? true : false,
        'wants_alpha_up_char' => (isset($_POST['get_alpha_up_char']) && $_POST['get_alpha_up_char'] === 'on') ? true : false,
        'wants_numb_char' => (isset($_POST['get_numb_char']) && $_POST['get_numb_char'] === 'on') ? true : false,
        'wants_spec_char' => (isset($_POST['get_spec_char']) && $_POST['get_spec_char'] === 'on') ? true : false,
      ]
      
    ];
    // IF no chars requested use all of them
    if (empty(array_filter($_SESSION['password_settings']['has_requested_chars']))) {
      $_SESSION['password_settings']['has_requested_chars'] = [
        'wants_alpha_low_char' => true,
        'wants_alpha_up_char' => true,
        'wants_numb_char' => true,
        'wants_spec_char' => true
      ];
    }

    
    // handle redirect 
    header('Location: your-password.php');
    // stop script
    exit;
    
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./src/css/style.css">

  <title>Password Generator</title>
</head>
<body>
  
<header>
  <h1>Password Generator</h1>
</header>

<main>
  
  <div class="container">

    <form method="post">

      <!-- Password Length -->
      <div class="password_length">
        <label for="password_length">
          How many characters?
          <input type="number" min="8" name="password_length" id="password_length" placeholder="E.g. 10">
        </label>
      </div>

      <!-- Unique characters? -->
      <fieldset id="repeated_chars">

        <legend>Do you want to allow repeated characters?</legend>

        <input type="radio" name="repeated_chars_allowed" id="repeated_chars_yes" value="true">
        <label for="repeated_chars_yes">yes</label>

        <input type="radio" name="repeated_chars_allowed" id="repeated_chars_no" value="false">
        <label for="repeated_chars_no">no</label>

      </fieldset>

      <!-- Choose Characters Type -->
      <fieldset id="char_type">

        <legend>Which kind of characters?</legend>
          
        <!-- a, b, c -->
        <input type="checkbox" name="get_alpha_low_char" id="get_alpha_low_char">
        <label for="get_alpha_low_char" aria-label="Lowercase Letters">a-z</label>
        
        <!-- A, B, C -->
        <input type="checkbox" name="get_alpha_up_char" id="get_alpha_up_char">
        <label for="get_alpha_up_char" aria-label="Uppercase Letters">A-Z</label>
        
        <!-- 1, 2, 3 -->
        <input type="checkbox" name="get_numb_char" id="get_numb_char">
        <label for="get_numb_char" aria-label="Numbers">1-2-3</label>
        
        <!-- !, @, # -->
        <input type="checkbox" name="get_spec_char" id="get_spec_char">
        <label for="get_spec_char" aria-label="Special Characters">@ # ! ? _ *</label>
        
      </fieldset>
      
      <button type="submit">Generate Password</button>
      
    </form>
    
  </div>    
  
  <!-- <?php var_dump($_SESSION); ?>⚠️ DEBUG ONLY -->
</main>
  
</body>
</html>