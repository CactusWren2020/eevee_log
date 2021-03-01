<?php 

include('config/db_connect.php');

$conn = db_connection();

//richest eevees
$sql = "SELECT actor_name, actor_net_worth from characters order by actor_net_worth desc limit 5";
$result = mysqli_query($conn, $sql);
$richest = mysqli_fetch_all($result);
mysqli_free_result($result);

//richest for pic
$sql = "SELECT path_to_pic from characters order by actor_net_worth desc limit 1";
$result = mysqli_query($conn, $sql);
$top_rich = mysqli_fetch_all($result);
mysqli_free_result($result);

//most popular eevee
$sql = "SELECT actor_name, actor_followers from characters order by actor_followers desc limit 5";
$result = mysqli_query($conn, $sql);
$popular = mysqli_fetch_all($result);
mysqli_free_result($result);

//most popular for pic
$sql = "SELECT path_to_pic from characters order by actor_followers desc limit 1";
$result = mysqli_query($conn, $sql);
$top_popular = mysqli_fetch_all($result);
mysqli_free_result($result);


mysqli_close($conn);


?>