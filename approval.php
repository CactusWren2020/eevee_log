<?php 

$hash = $_GET['h'];
$username = $_GET['e'];

if ($hash == hash('sha512', 'ACCEPT')) {
    //access database find user andset user approved = 1 where username = 
    echo 'accept';
} else if ($hash == hash('sha512', 'DECLINE')) {
   //not approved
   echo 'nope';
}
?>