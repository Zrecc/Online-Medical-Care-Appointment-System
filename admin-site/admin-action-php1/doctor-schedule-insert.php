<?php
include("../conn.php");
if (isset($_POST['add_schedule'])){
    $average_time_slot_correct = $_POST["average_time_slot"] . "00";
    $sql="INSERT INTO doctor_schedule (doctor_id, schedule_date, sche_start_time,
    sche_end_time, average_time_slot)

    VALUES

    ('$_POST[doctor_id]','$_POST[schedule_date]','$_POST[sche_start_time]','$_POST[sche_end_time]',
    '$average_time_slot_correct')";

    if(!mysqli_query($con,$sql)) {
        die("Error:" .mysqli_error($con));
    }
    else{
        echo '<script>alert("1 record added!");
        window.location.href ="../admin_doctor_schedule.php";
        </script>';
    }   
    mysqli_close($con);
}
?>
