<?php
include('session.php');
include('logic/add-logic.php');
include('templates/header.php');
?>

<div class="container p-5">
    <div class="row">

        <div class="col text-center">
    
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

                    <label for="">Character Personality</label>

                    <textarea class="form-control" name="character_personality"></textarea>

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

                    <label for="">Actor Personality</label>

                    <textarea class="form-control" name="actor_personality"></textarea>

                    <label for="">File Name of Pic</label>
                    <input type="file" class="form-control" name="image_upload">

                    <input type="submit" value="submit" name="submit" class="mt-3 form-control btn btn-dark">
                </form>
        </div>
    </div>
</div>




<?php include('templates/footer.php'); ?>