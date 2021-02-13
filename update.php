<?php
include('templates/header.php'); 

//connect to database
include('config/db_connect.php');

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
    include('empty_fields.php');
    var_dump($_POST);

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
        echo 'comparison failed';
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
    $sql = "UPDATE characters SET character_name = '$character_name', character_age = '$character_age', character_powers = '$character_powers', actor_name = '$actor_name', actor_age = '$actor_age', actor_followers = '$actor_followers', actor_net_worth = '$actor_net_worth', actor_description = '$actor_description', character_description = '$character_description', path_to_pic = '$path_to_pic'
       WHERE id = '$id'";
    
    // echo $sql;

    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
        exit;
    } else {
        //error
        echo 'sorry, query failed';
    }
}

?>


<div class="container p-5">
    <div class="row">

        <div class="col text-center">
            <h1 class="text-center">Update an Eevee</h1>

            <!--fields to be updated-->
            <form action="update.php" method="POST" class="mt-5 bg-light p-5" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <input type="hidden" name="id" value="<?php echo $result_array['id']; ?>">
                        <label for="" class="">Character Name</label>
                        <input type="text" class="form-control" name="character_name" value="<?php echo $result_array['character_name']; ?>">
                    </div>


                    <div class="col">
                        <label for="">Character Age</label>
                        <input type="text" class="form-control" name="character_age" value="<?php echo $result_array['character_age']; ?>">

                    </div>




                </div>

                <label for="">Character Powers</label>
                <textarea name="character_powers" id="" class="form-control"><?php echo $result_array['character_powers']; ?></textarea>

                <label for="">Character Description</label>

                <textarea class="form-control" name="character_description"><?php echo $result_array['character_description']; ?></textarea>

                <div class="form-row">
                    <div class="col">
                        <label for="">Actor Name</label>
                        <input type="text" class="form-control" name="actor_name" value="<?php echo $result_array['actor_name']; ?>">

                    </div>
                    <div class="col">
                        <label for="">Actor Age</label>
                        <input type="text" class="form-control" name="actor_age" value="<?php echo $result_array['actor_age']; ?>">

                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="">Actor Net Worth</label>
                        <input type="text" class="form-control" name="actor_net_worth" value="<?php echo $result_array['actor_net_worth']; ?>">
                    </div>
                    <div class="col">
                        <label for="">Actor Followers</label>
                        <input type="text" class="form-control" name="actor_followers" value="<?php echo $result_array['actor_followers']; ?>">

                    </div>
                </div>



                <label for="">Actor Description</label>
                <textarea name="actor_description" class="form-control"><?php echo $result_array['actor_description']; ?></textarea>
                <label for="">Picture</label>
               
                <input type="file" class="form-control" name="image_upload">

                <?php echo '<img style="width:150px;" src="' . $result_array['path_to_pic'] . '"  >'; ?>

                <label><?php echo $pathinfo['filename'].'.'.$pathinfo['extension'];?></label>

                <input type="hidden" name="path_to_pic" value="<?php  echo $pathinfo['filename'].'.'.$pathinfo['extension'];?>">
                 
                <input type="submit" value="update" name="update" class="mt-3 form-control btn btn-dark">
                
            </form>
        </div>
    </div>
</div>




<?php include('templates/footer.php'); ?>