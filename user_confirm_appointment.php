<?php session_start () ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm appoinment</title>
    <style>
        body {
            font-family: "Microsoft yahei";
            background: linear-gradient(to right, #2c3e50, #bdc3c7);
        }
        div#headerspace {
            height: 130px;
        }
        div#footer .footer-link a{
            height:100%;
            color: white;
        }
        .confirm-box {
            width: 60%;
            margin: 0px auto;
            text-align: center;
        }
        .title1 {
            color: white;
            font-size: 30px;
            text-align: center;
        }
        textarea {
            display: block;
            width: 100%;
            height: auto;
            min-height: 200px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.6);
            color: black;
            outline: none;
            font-size: 24px;
            border: 2px solid lightgray;
        }
        button[type=submit] {
            height: 50px;
            width: 250px;
            text-align: center;
            font-size: 20px;
            margin: 0px auto;
            color: white;            
            background: linear-gradient(to right, #1f4037, #99f2c8);
            border-radius: 12px;
            line-height: 50px;
            cursor: pointer;
            border: 2px solid green;
            box-sizing: content-box;
        }


    </style>
</head>
<body>
    <div id="headerspace"><?php include('header-footer/header.php')?></div>
<?php   
$sche_id = $_POST['doc_schedule_id'];
$sel_time = date("H:i", strtotime($_POST['selected_time']));?>
    <div class="confirm-box"> <br>
        <div class="title1">Share with us your reason of making this appointment</div>
        <form action="user_confirm_appointment.php" method="post">
            <input type="hidden" name="doc_schedule_id" value="<?php echo $sche_id?>"> 
            <input type="hidden" name="selected_time" value="<?php echo $sel_time?>"> <br><br>
            <textarea name="user_reason" placeholder="&nbsp;&nbsp;Type here"></textarea> <br><br>
            <button type="submit">Confirm appointment</button>
        </form>
    </div> <br><br><br><br><br><br><br><br><br><br><br>

    <div id="footer"><?php include('header-footer/footer.php')?></div>

<?php 
if (!isset($_SESSION['user'])) {
        echo '<script> alert("Please login first.") </script>';
        header('login.php');
} else if (isset($_POST['doc_schedule_id']) and (isset($_POST['selected_time'])) and (isset($_POST['user_reason']))) {
    include('conn.php');
    $user_reason = $_POST['user_reason'];
    $user_email = $_SESSION['user'];
    $sql = "INSERT INTO `appointment`(`appointment_id`, `user_email`, `doc_schedule_id`, `appointment_time`, `appointment_status`, `user_reason`) 
            VALUES ('','$user_email','$sche_id','$sel_time','booked','$user_reason')";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        else {
        echo '<script>alert("Your appointment is confirmed");
        window.location.href = "appointment.php";
        </script>';
        }
        mysqli_close($con);
    
}?>







</body>
</html>





