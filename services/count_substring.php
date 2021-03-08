<?php 
// Simple PHP program to count occurrences 
// of substring in string. 
  
$count_substring = function ($substring, $string) 
{ 
    $substring_length = strlen($substring); 
    $string_length = strlen($string); 
    $count = 0; 
  
    /* A loop to slide substring[] one by one */
    for ($i = 0; $i <= $string_length - $substring_length; $i++) 
    {  
        /* For current index i, check for  
        substringtern match */
        for ($j = 0; $j < $substring_length; $j++) 
            if ($string[$i+$j] != $substring[$j]) 
                break; 
  
        // if substring[0...M-1] = string[i, i+1, ...i+M-1] 
        if ($j == $substring_length)  
        { 
            $count++; 
            $j = 0; 
        } 
    } 
    return $count; 
};

// This code is contributed  
// by Akanksha Rai 

 