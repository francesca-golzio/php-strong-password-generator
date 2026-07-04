<?php

  // Get password generator function `generatePassword()`
  require __DIR__ . '/functions.php'

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

    <form action="" method="get">

      <div>
        <label for="password_length">How many characters?</label>
        <input type="number" min="8" name="password_length" id="password_length" placeholder="E.g. 10">
      </div>
      
      <button type="submit">Generate Password</button>

    </form>
    
    <div class="password_container">
      <p id="password" class="password">
        <?php echo strlen(generatePassword()) > 0 ? generatePassword() : '<small>-- password will be printed here --</small>' ?>
      </p>

      <?php echo strlen(generatePassword()) > 0 
        ? 
        "<p id='show_length'>
          <small>
            Password length: 
            <span id='length'>" . strlen(generatePassword()) .
            "</span>
          </small>
        </p>" 
        : 
        '' 
      ?>

    </div>

  </div>    

</main>
  
</body>
</html>