<?php
//connect to database
include('config/db_connect.php');

$errors = array(
    'character_name' => '',
    'character_age' => '',
);

if (isset($_POST['submit'])) {
    //check for empty fields
    require('empty_fields.php');

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
        include('save.php');
        

        $sql = "INSERT INTO characters(character_name, character_age, character_powers, actor_name, actor_age, actor_followers, actor_net_worth, character_description, path_to_pic, actor_description) VALUES('$character_name', '$character_age', '$character_powers', '$actor_name', '$actor_age', '$actor_followers', '$actor_net_worth', '$character_description', '$path_to_pic', '$actor_description')";


        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>
<?php include('templates/header.php'); ?>

<div class="container p-5">
    <div class="row">

        <div class="col text-center">
            <!-- <a href="index.php"><img class="img-fluid my-5" src="templates/assets/images/eevee-1320568179872387933_0.svg"/></a> -->
            <h1 class="text-center">Add an Eevee</h4>

                <form action="add.php" method="POST" class="mt-5 bg-light p-5" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col">
                            <label for="" class="">Character Name</label>
                            <input type="text" class="form-control" name="character_name">
                        </div>
                        <div class="col">
                            <label for="">Character Age</label>
                            <input type="text" class="form-control" name="character_age">

                        </div>




                    </div>

                    <label for="">Character Powers</label>
                    <textarea name="character_powers" id="" class="form-control"></textarea>

                    <label for="">Character Description</label>

                    <textarea class="form-control" name="character_description"></textarea>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Actor Name</label>
                            <input type="text" class="form-control" name="actor_name">

                        </div>
                        <div class="col">
                            <label for="">Actor Age</label>
                            <input type="text" class="form-control" name="actor_age">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Actor Net Worth</label>
                            <input type="text" class="form-control" name="actor_net_worth">
                        </div>
                        <div class="col">
                            <label for="">Actor Followers</label>
                            <input type="text" class="form-control" name="actor_followers">

                        </div>
                    </div>



                    <label for="">Actor Description</label>
                    <textarea name="actor_description" class="form-control"></textarea>
                    <label for="">File Name of Pic</label>
                    <input type="file" class="form-control" name="image_upload">

                    <input type="submit" value="submit" name="submit" class="mt-3 form-control btn btn-dark">
                </form>
        </div>
    </div>
</div>




<?php include('templates/footer.php'); ?>