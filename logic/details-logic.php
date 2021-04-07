<?php 
// include('config/db_connect.php');
$conn = db_connection();
 
//check get request id parameter



if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM characters WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $character = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    // var_dump($character);
}

// if delete has been called, check and then execute the delete statement

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM characters WHERE id = $id_to_delete";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
 
?>