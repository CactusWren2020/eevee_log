<?php 
 
if (!$loggedin) {
    //if not logged in, redirect
    header("Location: login.php");
    exit;
}

$conn = db_connection();

//define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

//processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter new password";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must be at least 6 characters";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    //validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Passwords did not match.";
        }
    }

    //check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        //prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            //set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            //attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //password updated successfully. destroy session, redirect to login page
                session_destroy();
                header("Location: login.php");
                exit();
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