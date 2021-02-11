<?php
include('config/db_connect.php');

//check get request id parameter

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM characters WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $character = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}

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

<?php include('templates/header.php'); ?>


<?php if ($character) : ?>
    <div class="container p-5">
        <div class="row d-flex flex-column">
            <div class="col  d-flex align-items-center flex-column">
                <a href="index.php"><img class="img-fluid my-5" src="templates/assets/images/eevee-1320568179872387933_0.svg" /></a>
                <h1 class="mb-3">Character</h1>
            </div>


            <div class="row mt-5 bg-light">
                <div class="col-9 p-5">
                    <h2><?php echo htmlspecialchars($character['character_name']); ?></h2>
                    <p>Age: <?php echo htmlspecialchars($character['character_age']); ?></p>
                    <p>Powers: <?php echo htmlspecialchars($character['character_powers']); ?></p>
                    <p>Description: <?php echo htmlspecialchars($character['character_description']); ?></p>

                    <h2 class="mt-5 mb-3">Actor: <?php echo htmlspecialchars($character['actor_name']); ?></h2>
                    <p><span>Age: <?php echo htmlspecialchars($character['actor_age']); ?>
                            <span>&nbsp;Followers: <?php echo htmlspecialchars($character['actor_followers']); ?></span>
                            <span>&nbsp;Net Worth: <?php echo htmlspecialchars($character['actor_net_worth']); ?></span></p>

                    <p>Description: <?php echo htmlspecialchars($character['actor_description']); ?></p>
                    <form action="details.php" method="POST" class="">
                        <input type="hidden" name="id_to_delete" class="" value="<?php echo $character['id']; ?>">
                       
                        <input type="submit" name="delete" value="Delete" class="btn btn-dark form-control mt-3">
                        
                    </form>
                </div>

                <div class="col-3 p-5 d-flex flex-column justify-content-center">
               
                <a href="index.php"><img class="img-fluid" src="<?php echo htmlspecialchars($character['path_to_pic']); ?>" /></a>
                </div>
            </div>

        </div>
        <a href="update.php?id=<?php echo htmlspecialchars($_GET['id']); ?>"><button class="btn btn-dark form-control mt-3">Update</button></a>
    </div>
<?php else :  ?>
    <h5>No such character exists!</h5>
<?php endif; ?>




<?php include('templates/footer.php'); ?>