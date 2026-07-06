<?php

  // Set chars array
  function setChars($has_requested_chars) {
    
    // Define password possible characters  
    $alpha_low_char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']; 
    $alpha_up_char = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']; 
    $numb_char = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']; 
    $spec_char = ['@', '#', '!', '?', '_', '*']; 

    // set chars to default empty array
    $chars = [];

    // add requested chars to chars array
    foreach ($has_requested_chars as $key => $value) {
      ($key === 'wants_alpha_low_char' && $value === true) ? $chars = array_merge($chars, $alpha_low_char) : null;
      ($key === 'wants_alpha_up_char' && $value === true) ? $chars = array_merge($chars, $alpha_up_char) : null;
      ($key === 'wants_numb_char' && $value === true) ? $chars = array_merge($chars, $numb_char) : null;
      ($key === 'wants_spec_char' && $value === true) ? $chars = array_merge($chars, $spec_char) : null;
    }

    return $chars;
  }

  // Generate Password
  function generatePassword($length, $chars = []){

    /* Set password to default `NAN` */
    $password = '';
    
    /* Get password characters by characters */
    while (strlen($password) < $length) {

      /* Get random index between 0 and chars[] length */
      $random_index = rand(0, (count($chars) - 1));
      //var_dump($random_index);

      /* Add new char to password */
      $password = $password . (string)$chars[$random_index];

    }

    /* Return password */
    return $password;

  }
  //var_dump(generatePassword());

?>