<?php
include('session.php');
include('logic/login-logic.php');
include('templates/header.php')

?>

<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h2 class="mb-3">Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control password">
                    
                    <input type="checkbox" class="my-3" onclick="showPassword()" value="Show Password"><span>&nbsp;Show Password</span><br/>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </div>

</div>










<?php include('templates/footer.php'); ?>