<?php
include("templates/header.php");

include('logic/reset_password-logic.php');

?>

<div class="container">
    <div class="row my-5">
        <div class="col">
            <h2 class="mb-4">Reset Password</h2>
            <p>Please fill out this form to reset your password.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control password" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control password">
                    <input type="checkbox" class="my-3" onclick="showPassword()" value="Show Password"><span>&nbsp;Show Password</span><br/>
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link" href="welcome.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>



</div>


<?php include("templates/footer.php"); ?>