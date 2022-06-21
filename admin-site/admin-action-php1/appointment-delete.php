<?php
include("../conn.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM appointment WHERE id=$id");

$sql = "DELETE FROM appointment WHERE appointment_id = $id";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ../admin_appointment.php');
    exit;
} else {
    echo "Error deleting record";
}
