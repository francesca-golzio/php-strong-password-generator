<?php


  // Generate Password
  function generatePassword(){
    
    /* Get password_length if properly setted */
    (isset($_GET['password_length']) && (int)$_GET['password_length'] > 0) ? $password_length = (int)$_GET['password_length'] : $password_length = null;    
    //var_dump($password_length);

    /* Define password possible characters */
    $chars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '?', '_', '*']; 
    //var_dump($chars);

    /* Set password to default `NAN` */
    $password = '';
    
    /* Get password characters by characters */
    while (strlen($password) < $password_length) {

      /* Get random index between 0 and 66 (chars[] length) */
      $random_index = rand(0, 65);
      //var_dump($random_index);

      /* Add new char to password */
      $password = $password . (string)$chars[$random_index];

    }

    /* Return password */
    return $password;

  }
  //var_dump(generatePassword());

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  
  <!-- Custom CSS -->
  <style>

    body{
      background-color: #c0c0c0;
    }


  </style>

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