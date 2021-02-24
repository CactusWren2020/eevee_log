<?php
include("session.php");
include("templates/header.php");

if (!$loggedin) {
    //redirect if not logged in
    header("Location: login.php");
    exit;
}



?>

<div class="container">
    <div class="row my-5">
        <div class="col">
            <h1>Hi, <?php echo ucwords(htmlspecialchars($_SESSION["username"])); ?>. Welcome to EeeVee-Base.</h1>
            <a href="logout.php" class="mt-3 btn btn-danger">Log out</a>
            <a href="reset_password.php" class="mt-3 btn btn-warning">Reset your password</a>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>