<?php
    session_start();
?>
<?php
    include("../conn.php");

    //$_GET[‘id’] — Get the integer value from id parameter in URL. 
    //intval() will returns the integer value of a variable
    $id = $_GET['appointment_id'];

    $result = mysqli_query($con,"DELETE FROM appointment WHERE appointment_id=$id");

    mysqli_close($con); //close database connection
    header('Location: ../appointment.php'); //redirect the page to view.php page

?>