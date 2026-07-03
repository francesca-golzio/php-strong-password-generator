<?php

  /* If parameter password_lenght is set, save it */
 (isset($_GET['password_lenght']) && (int)$_GET['password_lenght'] > 0) ? $password_lenght = (int)$_GET['password_lenght'] : $password_lenght = null;

  var_dump($password_lenght);

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

  <h1>Password Generator</h1>
  
  <div>
    <form action="" method="get">

      <input type=text name="password_lenght" id="password_lenght" placeholder="Desired Password Lenght">
      
      <button type="submit">Generate Password</button>

    </form>
  </div>

  
</body>
</html>