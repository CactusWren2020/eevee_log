<?php 

$conn = mysqli_connect('localhost', 'umber', 'Jupiter1031', 'eevees');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

?>