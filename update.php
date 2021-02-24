<?php
include('session.php');
include('logic/update-logic.php');
include('templates/header.php'); 
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

                <label for="">Character Personality</label>

                <textarea class="form-control" name="character_personality"><?php echo $result_array['character_personality']; ?></textarea>

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

                <label for="">Actor Personality</label>
                <textarea name="actor_personality" class="form-control"><?php echo $result_array['actor_personality']; ?></textarea>

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