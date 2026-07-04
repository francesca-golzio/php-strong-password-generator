<?php

  // Get password generator function `generatePassword()`
require __DIR__ . '/functions.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  
  <!-- Custom CSS -->
  <style>

    /* CSS Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    /* Custom color palette */
    :root {
      --dark-color: #0a120a;
      --dark-color-opacity: #0a120ab6;
      --light-color: #eaeaea;
      --bg-color: #0a8d6c;
      --accent-color: #0bb78c;
      --gray-color: #607566;
    }

    /* Commons */    
    body{
      color: var(--dark-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--bg-color);
      transition: all 0.3s ease, text 0.4s;
    }

    /* Header */
    header {
      background-color: var(--dark-color);
      color: var(--light-color);
      text-align: center;
      padding: 1.5rem;
    }

    /* Main */
    .container {
      font-size: 1.5rem;
      background-color: var(--dark-color-opacity);
      display: flex;
      gap: 2rem;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      /* border: 3px solid var(--dark-color); */
      border-radius: 3.5rem;
      padding: 3.5rem;
      max-width: 95%;
      margin: 3rem auto;
    }

    /* Form */
    form {
      /* padding: 1.5rem; */
      text-align: center;
    }
    
    label {
      color: var(--light-color);
      padding: 1rem 0;
      border-radius: 1.25rem;
      
    }
    input#password_length {
      appearance: none;
      color: var(--accent-color);
      font-size: inherit;
      text-align: center;
      background-color: var(--dark-color);
      border: 1px solid var(--accent-color);
      padding: 1rem 1.5rem;
      margin: 1rem;
      border-radius: 1.25rem;
      width: 80%;
      cursor: caret;
    }
    input:focus {
      outline: none;
      box-shadow: 1px 1px 10px var(--accent-color);
    }
    
    button {
      appearance: none;
      color: var(--accent-color);
      font-size: inherit;
      font-weight: bold;
      background-color: var(--dark-color);
      border: 1px solid var(--accent-color);
      padding: 1rem 1.5rem;
      margin: 1rem;      
      border-radius: 1.25rem;
      width: 80%;
      cursor: pointer;
    }
    button:hover {
      color: var(--dark-color);
      background-color: var(--accent-color);
    }
    
    /* Password */
    .password_container {
      text-align: center;
      min-width: 90%;
    }    
    p.password {
      color: var(--dark-color);
      font-size: 2rem;
      letter-spacing: 0.75rem;
      white-space: nowrap;
      font-weight: bold;
      background-color: var(--light-color);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem 0.75rem 1rem 1.25rem;
      border: 1px solid var(--dark-color);
      border-radius: 1.5rem;
    }
    
    small {
      font-size: 0.75rem;
      letter-spacing: 0.1rem;
      padding-right: 0.5rem;

      span {
        font-size: 1rem;
      }
    }
    
    #show_length {
      color: var(--accent-color);
      text-align: right;
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