<?php 
$con=mysqli_connect("localhost", "root", "", "ehc_appointment");

// use to check connection
if (mysqli_connect_error()) {
    echo "failed to connect to MySQL:". mysqli_connect_error();
}
?>