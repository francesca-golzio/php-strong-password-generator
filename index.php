<?php 

  // Open session
  session_start();

  // Declare support variables
  $length_error = '';

  // Save form data into session
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // save password settings
    $_SESSION['password_settings'] = [

      'password_length' => (isset($_POST['password_length']) && (int)$_POST['password_length'] >= 8 && (int)$_POST['password_length'] <= 32) ? (int)$_POST['password_length'] : 8,

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

    // Guard against infinite loop
    // if chars must be unique
    if($_SESSION['password_settings']['repeated_chars_allowed'] === false) {

      // reset chars pool length
      $chars_pool_length = 0;

      // get allowed chars pool length
      foreach(array_filter($_SESSION['password_settings']['has_requested_chars']) as $key => $value) {
         
        if ($key === 'wants_alpha_low_char') $chars_pool_length += 26;
        if ($key === 'wants_alpha_up_char') $chars_pool_length += 26;
        if ($key === 'wants_numb_char') $chars_pool_length += 10;
        if ($key === 'wants_spec_char') $chars_pool_length += 6;

      }
        
      // show error message
      if ($_SESSION['password_settings']['password_length'] > $chars_pool_length) {

      $length_error = 
        "<dialog class='error_message' open>
        <p>Not enough characters to generate password.<br><br>
        <span>Please reduce password length or enable repeated characters.</span>
        </p>
        <form method='dialog'>
          <button class='close'>OK</button>
        </form>
        </dialog>";
      }
    }
    
    if ($length_error === '') {
      
      // Certify that form has been submitted
      $_SESSION['form-submitted'] = true;
      
      // handle redirect 
      header('Location: your-password.php');
      // stop script
      exit;

    }
    
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
  
  <main>
    
    <div class="outer_container">
      
      <div class="container">
        
        <?php echo $length_error; ?>
        
        <form method="post">

          <div class="heading">
            <h1>Password Generator</h1>
          </div>

          <!-- Password Length -->
          <div class="password_length">
            <label for="password_length">How many characters?</label>
            <div class="password_length_span">
              <span>8</span>
              <div class="ruler_slider_container">
                <div class="ruler">
                  <small class="tick">12</small>
                  <small class="tick">16</small>
                  <small class="tick">20</small>
                  <small class="tick">24</small>
                  <small class="tick">28</small>
                </div>
                <input type="range" name="password_length" id="password_length" min="8" max="32" list="ticks" step="1">
              </div>
              <span>32</span>
            </div>
          </div>

          <!-- Unique characters? -->
          <div class="repeated_chars">

            <label>Do you want to allow repeated characters?</label>

            <div class="repeated_chars_options">
              <label for="repeated_chars_yes">
                yes
                <input type="radio" name="repeated_chars_allowed" id="repeated_chars_yes" value="true">
              </label>
      
              <label for="repeated_chars_no">
                no
                <input type="radio" name="repeated_chars_allowed" id="repeated_chars_no" value="false">
              </label>
            </div>

          </div>

          <!-- Choose Characters Type -->
          <div class="char_type">

            <label>Which kind of characters?</label>
              
            <div class="char_type_options">
              <!-- a, b, c -->
              <div>
                <input type="checkbox" name="get_alpha_low_char" id="get_alpha_low_char">
                <label for="get_alpha_low_char" aria-label="Lowercase Letters">a b c</label>
              </div>
              
              <!-- A, B, C -->
              <div>
                <input type="checkbox" name="get_alpha_up_char" id="get_alpha_up_char">
                <label for="get_alpha_up_char" aria-label="Uppercase Letters">A B C</label>
              </div>
              
              <!-- 1, 2, 3 -->
              <div>
                <input type="checkbox" name="get_numb_char" id="get_numb_char">
                <label for="get_numb_char" aria-label="Numbers">1 2 3</label>
              </div>
              
              <!-- !, @, # -->
              <div>
                <input type="checkbox" name="get_spec_char" id="get_spec_char">
                <label for="get_spec_char" aria-label="Special Characters">@ # !</label>
              </div>
            </div>
            
          </div>
          
          <button type="submit">Generate Password</button>
          
        </form>
        
      </div>    
    </div>    
    
    <!-- <?php var_dump($_SESSION); ?>⚠️ DEBUG ONLY -->
  </main>
  
</body>
</html>