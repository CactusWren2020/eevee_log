<?php 
include('templates/header.php');
 require('config/db_connect.php');
 
//  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     //if logged in, redirect to index.php
//     header("index.php");
//  }
if ($loggedin) {
    //if logged in, redirect to index.php
    header("Location: index.php");
    exit;
}
 //define variables and initialize with empty values
 $username = $password = $confirm_password = "";
 $username_err = $password_err = $confirm_password_err = "";

 //processing form data when form is submitted
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username";
    } else {
        //prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            //set parameters
            $param_username = trim($_POST["username"]);
            
            //attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //store result
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
            //close statement
            mysqli_stmt_close($stmt);
        }
    }
    //Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    //check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        //prepare insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            //set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            //attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //login user and redirect to welcome.php

                //prepare select statement to get id
                $sql = "SELECT id FROM users WHERE username = ?";
                
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    //bind variables
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    $param_username = $username;
                    
                    if (mysqli_stmt_execute($stmt)) {
                        //store result
                        mysqli_stmt_store_result($stmt);

                        //login user and redirect to welcome page
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        header("Location: welcome.php");
                        exit;
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }
                    
                }
               
            } else {
                echo "Something went wrong. Please try again later.";
            }

            //close statement
            mysqli_stmt_close($stmt);
        }
    }
    //close connection
    mysqli_close($conn);

 } 
 
 


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