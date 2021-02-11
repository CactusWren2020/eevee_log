<?php 

$character_name = mysqli_real_escape_string($conn, $_POST['character_name']);
$character_age = mysqli_real_escape_string($conn, $_POST['character_age']);
$character_powers = mysqli_real_escape_string($conn, $_POST['character_powers']);
$actor_name = mysqli_real_escape_string($conn, $_POST['actor_name']);
$actor_age = mysqli_real_escape_string($conn, $_POST['actor_age']);
$actor_followers = mysqli_real_escape_string($conn, $_POST['actor_followers']);
$actor_net_worth = mysqli_real_escape_string($conn, $_POST['actor_net_worth']);
//$target (for image_upload) already declared above
$character_description = mysqli_real_escape_string($conn, $_POST['character_description']);
$actor_description = mysqli_real_escape_string($conn, $_POST['actor_description']);

?>