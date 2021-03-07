<?php
include("session.php");
include("templates/header.php");

if (!$loggedin) {
    //redirect if not logged in
    header("Location: login.php");
    exit;
}

$conn = db_connection();

// test if database is empty
$user = htmlspecialchars($_SESSION['username']);

$sql = "SELECT role FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $sql);
$user_role = mysqli_fetch_all($result, MYSQLI_ASSOC);

// $isAdmin holds whether the user is admin or not
$isAdmin = ("admin" == $user_role[0]["role"]);


$sql = 'SELECT * FROM characters ORDER BY id';

$result = mysqli_query($conn, $sql);
$characters = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

/* profile pic logic */

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
}



?>

<div class="container">
    <div class="row my-5">
        <div class="col">
            <h1 class="mb-5">Hi, <?php echo ucwords(htmlspecialchars($_SESSION["username"])); ?>. Welcome to EeeVee-Base.</h1>
            <div class="card" style="width: 35vw;">
                <img src="images/eevee.svg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ucwords(htmlspecialchars($_SESSION['username'])); ?></h5>
                    <p class="card-text">User description</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0"><a href="index.php" class="btn btn-primary">See Eevees</a></li>
                        <?php
                        echo $isAdmin ? "<li class='list-group-item px-0'> <a href='admin.php' class='btn btn-primary'>Dashboard</a></li>" : ''; ?>
                        <li class="list-group-item px-0"><a href="logout.php" class="btn btn-warning">Log out</a></li>
                        <li class="list-group-item px-0"><a href="reset_password.php" class="btn btn-danger">Reset your password</a></li>
                        
                        <li class="list-group-item px-0">
                            
                        <form action="welcome.php" method="POST" enctype="multipart/form-data">
                        <label>Upload Avatar</label>
                        <input type="file" name="avatar_upload">
                    </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php 
 include("templates/footer.php"); 
 ?>