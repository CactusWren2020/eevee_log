<?php 

$conn = db_connection();
// include('config/db_connect.php');

// test if database is empty
$sql_count = "SELECT count(*) from characters";
$check_result = mysqli_query($conn, $sql_count);
$check = mysqli_fetch_all($check_result, MYSQLI_ASSOC);
if (!$check[0]['count(*)'] > 0) {
    //if empty, go to add.php
    header('Location: add.php');
    exit;
}

$sql = 'SELECT * FROM characters ORDER BY id';

$result = mysqli_query($conn, $sql);
$characters = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

