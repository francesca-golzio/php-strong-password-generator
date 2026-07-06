<?php


  // Generate Password
  function generatePassword($length){

    /* Define password possible characters */
    $chars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '?', '_', '*']; 
    //var_dump($chars);

    /* Set password to default `NAN` */
    $password = '';
    
    /* Get password characters by characters */
    while (strlen($password) < $length) {

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