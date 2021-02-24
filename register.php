<?php 
include('session.php');
include('templates/header.php');
include('logic/register-logic.php');
 ?>

 
 <body>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
        <h2 class="my-5">Sign Up</h2>
        <p class="mb-3">Please fill this form to create an account.</p>
        <p class="mb-3">Once you're finished, you'll be redirected to a login page.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control password" value="<?php echo $password; ?>">
                
                

                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                
                <input type="password" name="confirm_password" class="form-control password" value="<?php echo $confirm_password; ?>">
                
                <span class="help-block"><?php echo $confirm_password_err; ?> 

                <input type="checkbox" class="my-3" onclick="showPassword()" value="Show Password"><span>&nbsp;Show Password</span><br/>
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
        </div>
    </div>
        
</div>    
     
 <?php include('templates/footer.php'); ?>