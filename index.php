<?php 
include('session.php');
include('logic/index-logic.php');
include('templates/header.php');  




?>



<div class="container bg-light p-5 mt-5">

    <div class="row">

        <?php foreach ($characters as $character) : ?>
            <div class="col-12 col-md-4 pb-5 bg-light">
                <div class="card pb-2">
               
                 <a href="index"><img class="card-img-top pb-5 card-img" src="<?php echo htmlspecialchars($character['path_to_pic']); ?>"></a>
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