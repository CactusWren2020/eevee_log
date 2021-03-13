<?php


$conn = db_connection();

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
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
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

                        $accept_link = "https://mikecho.dev/projects/eevee_log/approval.php?e=" . $param_username . "&h=" . hash('sha512', 'ACCEPT');

                        $decline_link = "https://mikecho.dev/projects/eevee_log/approval.php?e="  . $param_username . "&h=" . hash('sha512', 'DECLINE');

                        $myemail = 'mike@mikecho.dev';
                        $subject = "user needs approval";
                        $message = "the user $param_username needs approval" .
                            '---------------------------------' . "\r\n" . "Accept" . $accept_link . "\r\n" . "Decline" . $decline_link . "\r\n";

                        $headers = 'From:admin@mikecho.dev' . '\r\n'; //From Headers
                        mail($myemail, $subject, $message, $headers);

                        //login user and redirect to welcome page
                        // $_SESSION["loggedin"] = true;
                        // $_SESSION["id"] = $id;
                        // $_SESSION["username"] = $username;
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
