<?php
include("../conn.php");
if (isset($_POST['Edit'])){
    $average_time_slot_correct = $_POST["average_time_slot"] . "00";
    $sql = "UPDATE doctor_schedule SET 
            doctor_id = '$_POST[doctor_id]',
            schedule_date = '$_POST[schedule_date]',
            sche_start_time = '$_POST[sche_start_time]',
            sche_end_time = '$_POST[sche_end_time]',
            average_time_slot = '$average_time_slot_correct'

            WHERE doc_schedule_id=$_POST[doc_schedule_id]";

    if(!mysqli_query($con,$sql)) {
        die("Error:" .mysqli_error($con));
    }
    else{
        echo '<script>alert("Record saved!");
        window.location.href ="../admin_doctor_schedule.php";
        </script>';
    }   
    mysqli_close($con);
    }
?>
        
        
        
        
    