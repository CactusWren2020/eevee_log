<?php 

$conn = db_connection();
// $conn = mysqli_connect('localhost', 'umber', 'Jupiter1031', 'eevees');

// var_dump($conn);

if (!$loggedin) {
    //if not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

$errors = array(
    'character_name' => '',
    'character_age' => '',
);

if (isset($_POST['submit'])) {
    //check for empty fields
    require('logic/empty_fields.php');

    if (array_filter($errors)) {
        var_dump($errors);
        //do nothing, if there is anything in the $errors array
    } else {
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
        //save to database
        include('logic/save.php');
        

        $sql = "INSERT INTO characters(character_name, character_age, character_powers, actor_name, actor_age, actor_followers, actor_net_worth, character_description, character_personality, path_to_pic, actor_description, actor_personality) VALUES('$character_name', '$character_age', '$character_powers', '$actor_name', '$actor_age', '$actor_followers', '$actor_net_worth', '$character_description', '$character_personality', '$path_to_pic', '$actor_description', '$actor_personality')";


        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
            exit;
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}