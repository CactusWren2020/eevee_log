<?php 

 
function authenticated() {
    if (! isset ($_SESSION['loggedin'])) {
        return false;
    }

    return $_SESSION['loggedin'];
}

 
?>