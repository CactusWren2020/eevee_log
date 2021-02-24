<?php 

$conn = db_connection();

$errors = [];
//get character info using id from query string

if (isset($_GET['id'])) {
    $id_query = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM characters WHERE id = '$id_query'";
    $result = mysqli_query($conn, $sql);
    $result_array = mysqli_fetch_assoc($result);
    $pathinfo = pathinfo($result_array['path_to_pic']);
     
    mysqli_free_result($result);
    mysqli_close($conn);
}

if (isset($_POST['update'])) {
    //check for empty fields and assign values
    include('logic/empty_fields.php');
    // var_dump($_POST);

    //compare new path_to_pic to old value
    $id = $_POST['id'];
    $sql = "SELECT path_to_pic FROM characters WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $result_array = mysqli_fetch_assoc($result);
    $pathinfo = pathinfo($result_array['path_to_pic']);


    if (($pathinfo['filename'].'.'.$pathinfo['extension']) == $_FILES['image_upload']['name'] OR !$_FILES['image_upload']['name']) {
        $path_to_pic = $result_array['path_to_pic'];
        echo 'comparison succeeded';
    } else {
        //delete old file
         unlink($result_array['path_to_pic']); 
        //get image name
         $image = $_FILES['image_upload']['name'];
         //get path where image will be stored
         $target = "templates/assets/images/" . basename($image);
         //move file to storage area
         if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $target)) {
             echo "image uploaded successfully";
             //variable for storing path in database
             $path_to_pic = $target;
    }
}
     
    $id = $_POST['id'];
    $sql = "UPDATE characters SET character_name = '$character_name', character_age = '$character_age', character_powers = '$character_powers', actor_name = '$actor_name', actor_age = '$actor_age', actor_followers = '$actor_followers', actor_net_worth = '$actor_net_worth', actor_description = '$actor_description', actor_personality = '$actor_personality', character_description = '$character_description', character_personality = '$character_personality', path_to_pic = '$path_to_pic'
       WHERE id = '$id'";
    
    // echo $sql;

    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
        exit;
    } else {
        //error
        echo mysqli_error($conn);
    }
}
