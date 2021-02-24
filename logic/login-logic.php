<?php 

//check if user is already logged in, if yes redirect them to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("Location: index.php");
//     exit;
// }

if ($loggedin) {
    //send to welcome page if logged in
    header("Location: welcome.php");
    exit;
}
//include config
// include('config/db_connect.php');

$conn = db_connection();

//define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

//processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username";
    } else {
        $username = trim($_POST["username"]);
    }

    //check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password";
    } else {
        $password = trim($_POST["password"]);
    } 

    //validate credentials
    if (empty($username_err) && empty($password_err)) {
        //prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //set parameters
            $param_username = $username;

            //attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //store result
                mysqli_stmt_store_result($stmt);

                //check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    //bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            
                            //password is correct, so start a new session
                            session_start();
                            
                            //store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            //redirect user to welcome page
                            header("Location: welcome.php"); 
                        } else {

                            //display error if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    //display error if username doesn't exist
                    $username_err = "No account found with that username.";
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