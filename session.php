<?php 

session_start();

//autoload files (currently just session.php)

require __DIR__ . '/vendor/autoload.php'; 
  
//authenticated function comes from session.php

$loggedin = authenticated();

?>