<?php
    include("../conn.php");
    $id = intval($_GET['doctor_id']);
    mysqli_query($con, "DELETE FROM doctor_language WHERE doctor_id='$id'");
    mysqli_query($con, "DELETE FROM doctor_schedule WHERE doctor_id='$id'");
    mysqli_query($con, "DELETE FROM doctor_qualification WHERE doctor_id='$id'");
    mysqli_query($con, "DELETE FROM doctor WHERE doctor_id='$id'");
    mysqli_close($con); //close database connection
    echo "<script>alert('Record Deleted.');window.location.href='../doctor_list.php';</script>";
?>