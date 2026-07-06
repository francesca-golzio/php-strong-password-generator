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

    <form action="./your-password.php" method="post">

      <div>
        <label for="password_length">How many characters?</label>
        <input type="number" min="8" name="password_length" id="password_length" placeholder="E.g. 10">
      </div>
      
      <button type="submit">Generate Password</button>

    </form>
    

  </div>    

</main>
  
</body>
</html>