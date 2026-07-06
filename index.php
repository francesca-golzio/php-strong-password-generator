<?php
 

  // Open session
  session_start();

  // Save form data into session
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // get password_length if properly set
    $_SESSION['password_length'] =  (isset($_POST['password_length']) && (int)$_POST['password_length'] > 0) ? (int)$_POST['password_length'] : null;

    // get requested char types array
    $_SESSION['has_requested_chars'] = [
      'wants_alpha_low_char' => (isset($_POST['get_alpha_low_char']) && $_POST['get_alpha_low_char'] === 'on') ? true : false,
      'wants_alpha_up_char' => (isset($_POST['get_alpha_up_char']) && $_POST['get_alpha_up_char'] === 'on') ? true : false,
      'wants_numb_char' => (isset($_POST['get_numb_char']) && $_POST['get_numb_char'] === 'on') ? true : false,
      'wants_spec_char' => (isset($_POST['get_spec_char']) && $_POST['get_spec_char'] === 'on') ? true : false,
    ];

    
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
        <!-- <label for="password_length">How many characters?</label>
        <input type="number" min="8" name="password_length" id="password_length" placeholder="E.g. 10"> -->
        <label for="password_length">
          How many characters?
          <input type="number" min="8" name="password_length" id="password_length" placeholder="E.g. 10">
        </label>
      </div>

      <!-- Choose Characters Type -->
      <fieldset name="char_type" id="char_type">

        <legend for="char_type">Which kind of characters?</legend>
          
        <!-- a, b, c -->
        <input type="checkbox" name="get_alpha_low_char" id="get_alpha_low_char">
        <label for="get_alpha_low_char">Lowercase Letters <span>a-z</span></label>
        
        <!-- A, B, C -->
        <input type="checkbox" name="get_alpha_up_char" id="get_alpha_up_char">
        <label for="get_alpha_up_char">Uppercase Letters <span>A-Z</span></label>
        
        <!-- 1, 2, 3 -->
        <input type="checkbox" name="get_numb_char" id="get_numb_char">
        <label for="get_numb_char">Numbers <span>1-2-3</span></label>
        
        <!-- !, @, # -->
        <input type="checkbox" name="get_spec_char" id="get_spec_char">
        <label for="get_spec_char">Special Characters <span>@ # ! ? _ *</span></label>
        
      </fieldset>
      
      <button type="submit">Generate Password</button>
      
    </form>
    
  </div>    
  
  <!-- <?php var_dump($_SESSION); ?>⚠️ DEBUG ONLY -->
  
</main>
  
</body>
</html>