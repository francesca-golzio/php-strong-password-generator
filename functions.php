<?php

  /* Get random char */
  function getRandomChar($array) {

    // get random index between 0 and array length
    $random_index = rand(0, (count($array) - 1));

    // get random char from array
    $rando_char = (string)$array[$random_index];

    return $rando_char;

  }

  /* Generate Password */
  function generatePassword($array) {

    /* Get variables from array */

    // get password length
    $password_length = $array['password_length'] ?? 8;

    // get repeated chars allowed ?
    $repeated_chars_allowed = $array['repeated_chars_allowed'] ?? false;

    // get requested chars
    $has_requested_chars = (!empty($array['has_requested_chars']) && !empty(array_filter($array['has_requested_chars']))) 
      ? $array['has_requested_chars'] 
      : [
        'wants_alpha_low_char' => true,
        'wants_alpha_up_char' => true,
        'wants_numb_char' => true,
        'wants_spec_char' => true,
        ];

    /* Define password possible characters */  
    $alpha_low_char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']; 
    $alpha_up_char = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']; 
    $numb_char = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']; 
    $spec_char = ['@', '#', '!', '?', '_', '*']; 

    /* Set variables to empty default */
    $chars = [];
    $temp_password = [];
    $password = '';

    /* add requested chars to chars array */
    foreach ($has_requested_chars as $key => $value) {

      // IF the user wants_alpha_low_char
      if ($key === 'wants_alpha_low_char' && $value === true) {

        // add alpha_low_char to the pool of requested/allowed chars
        $chars = array_merge($chars, $alpha_low_char);

        // push a random alpha_low_char to the temp_password array
        array_push($temp_password, getRandomChar($alpha_low_char));

      }
        
      // IF the user wants_alpha_up_char
      if ($key === 'wants_alpha_up_char' && $value === true) {
        
        // add alpha_up_char to the pool of requested/allowed chars
        $chars = array_merge($chars, $alpha_up_char);

        // push a random alpha_up_char to the temp_password array
        array_push($temp_password, getRandomChar($alpha_up_char));
        
      } 
        
      // IF the user wants_numb_char
      if ($key === 'wants_numb_char' && $value === true) {
        
        // add numb_char to the pool of requested/allowed chars
        $chars = array_merge($chars, $numb_char);

        // push a random numb_char to the temp_password array
        array_push($temp_password, getRandomChar($numb_char));

      }

      // IF the user wants_spec_char
      if ($key === 'wants_spec_char' && $value === true){

        // add spec_char to the pool of requested/allowed chars
        $chars = array_merge($chars, $spec_char);

        // push a random spec_char to the temp_password array
        array_push($temp_password, getRandomChar($spec_char));
        
      }
        
    }
        

    /* Get password character by character */

    while (count($temp_password) < $password_length) { 
      
      // Get random char
      $random = getRandomChar($chars);
     
      // IF chars must be unique, but char is already in temp_password
      if (!$repeated_chars_allowed && in_array($random, $temp_password)) {

        // skip char
        continue;
      } 

      // Add new char to temp_password
      array_push($temp_password, $random);

    }

    // Shuffle temp_password chars 
    shuffle($temp_password);

    // Save password
    $password = implode('', $temp_password);

    // Return password
    return $password;

  }

?>