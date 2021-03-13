<?php
include('session.php');

$conn = db_connection();

if (!$loggedin) {
    //if not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

$errors = array(
    'episode' => '',
    'logline' => '',
);


if (isset($_POST['submit'])) {
    if (empty($_POST['logline'])) {
        $errors['logline'] = "A logline is required.";
    } else {
        $logline = $_POST['logline'];
    }

    if (array_filter($errors)) {
        var_dump($errors);
        //do nothing, if there is anything in the $errors array
    } else {
        //save to database
        $episode = mysqli_real_escape_string($conn, $_POST['episode']);
        $logline = mysqli_real_escape_string($conn, $_POST['logline']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $characters = mysqli_real_escape_string($conn, $_POST['characters']);
        $chronology = mysqli_real_escape_string($conn, $_POST['chronology']);

        $sql = "INSERT INTO episodes(episode, logline, description, characters, chronology) VALUES('$episode', '$logline', '$description', '$characters', '$chronology')";

        
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: episode.php');
            exit;
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

include('templates/header.php');
?>

<div class="container p-5">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-center">Add Episode</h4>
                <form action="add_episode.php" method="POST" class="mt-5 bg-light p-5" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col">
                            <label for="" class="">Episode Title</label>
                            <input type="text" class="form-control" name="episode">
                        </div>
                        <div class="col">
                            <label for="">Logline</label>
                            <input type="text" class="form-control" name="logline">
                        </div>
                    </div>

                    <label for="">Description</label>
                    <textarea name="description" rows="5" id="" class="form-control"></textarea>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Characters</label>
                            <textarea rows="2" class="form-control" name="characters"></textarea>
                        </div>
                        
                    </div>
                    <div class="form-row">
                    <div class="col">
                            <label for="">Chronology</label>
                            <input type="number" class="form-control" name="chronology">
                            <input type="submit" class="mt-3 form-control btn btn-dark" name="submit" value="submit">
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>