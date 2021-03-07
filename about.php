<?php 
include('session.php');
include('templates/header.php'); ?>

<div class="container">
    <div class="row my-5">
        <div class="col d-flex justify-content-center">
            <h1>EeVee-Base</h1>
        </div>
    </div>
</div> <!--container-->

<div class="container">
    <div class="row bg-light p-5 my-5">
        <div class="col">
            <h3 class="mb-3">Browse</h3>
            <p>Look through our collection of EeeVees, both main cast and supporting cast.</p>
            <h3 class="mb-3">Upload</h3>
            <p>Keep the EeVee-base updated as new characters appear</p>
            <h3 class="mb-3">Ship</h3>
            <p>Let your imagination run wild!</p>
            <p>This is a place for EeVees</p>
        </div>
        <div class="col">
            <div class="card pt-3">
                <a href="index.php"><img class="card-img-top" src="templates/assets/images/sylveon.jpg" alt=""></a>
                <div class="card-body">

                    <h5 class="card-title">
                        Pixi</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Played by: Roxie Rene Rose</h6>

                </div>
            </div>

        </div>
    </div>
</div> <!--container-->


    <?php include('templates/footer.php'); ?>