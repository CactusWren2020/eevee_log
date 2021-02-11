<?php

include('config/db_connect.php');

// test if database is empty
$sql_count = "SELECT count(*) from characters";
$check_result = mysqli_query($conn, $sql_count);
$check = mysqli_fetch_all($check_result, MYSQLI_ASSOC);
if (!$check[0]['count(*)'] > 0) {
    //if empty, go to add.php
    header('Location: add.php');
}

$sql = 'SELECT * FROM characters ORDER BY id';

$result = mysqli_query($conn, $sql);
$characters = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);


?>

<?php include('templates/header.php'); ?>

<div class="container bg-light p-5">

    <div class="row">

        <?php foreach ($characters as $character) : ?>
            <div class="col bg-light">
                <div class="card p-2">
               
                <a href="index.php"><img class="card-img-top pb-5" src="<?php echo htmlspecialchars($character['path_to_pic']); ?>" /></a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($character['character_name']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Played by: <?php echo htmlspecialchars($character['actor_name']); ?></h6>

                        <p class="card-text"><?php echo htmlspecialchars($character['character_description']); ?></p>
                        <a href="details.php?id=<?php echo $character['id']; ?>" class="btn btn-primary">More</a>
                    </div>
                </div>
                <!--card-->
            </div>
            <!--col-->
        <?php endforeach; ?>
    </div>
    <!--row-->
</div>
<!--container-->
<?php include('templates/footer.php'); ?>