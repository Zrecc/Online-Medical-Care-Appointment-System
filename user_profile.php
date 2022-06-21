<?php 
    session_start();
    if (isset($_SESSION['user'])) {
        include('conn.php');
        $user_email = $_SESSION['user'];
        $sql = "SELECT * FROM user WHERE user_email = '$user_email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        mysqli_close($con);
    } else {
        header("location: login.php");
    }

    if(isset($_POST["logout"])){
        session_destroy();
        header("location: index.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['user_first_name']. " " . $row['user_last_name'] ?></title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        div#headerspace {
            height: 130px;
        }
        div#head-container {
            display: flex;
            width: 80%;
            margin: 15px auto;
            height: 100px;
            justify-content: row;
        }
        #user-header,
        #total-appointment {
            border: 1.5px #373b44 solid;
            border-radius: 20px;
            background-color: white;
            margin-left: 1px;
        }
        body {
            background-color: #eee;
        }
        #user-header {
            width: 65%;
            display: flex;
        }
        #total-appointment {
            width: 25%;
            text-align: center;
            line-height: 60px;
        }
        #total-appointment span {
            display: block;
            line-height: 15px;
        }
        #logout-form {
            width: 15%;
        }
        #logout-form button {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            border: 0;
            padding: 0;
            font-size: 22px;
            background-color: red;
            color: white;
            margin-left: 1px;
            cursor: pointer;
        }
        .user-title {
            margin-left: 10%;
            width: 48%;
        }
        .user-name{
            font-size: 30px;
            line-height: 60px;
        }
        .head-img {
            height: 80%;
            margin: 10px 0 0 90px;
        }
        .title2 {
            text-align: center;
            margin-top: 15px;
            font-size: 22px;
        }
        #logout-form {
            width: 10%;
            text-align: center;
        }
        .mid-container {
            width: 80%;
            margin: 0 auto;
            height: auto;
            border-radius: 20px;
            display: flex;
        }
        .user-information {
            width: 40%;
            border: 2px #8ec7b7 solid;
            height: 380px;
            border-radius: 20px;
            background-color: white;
        }
        .user-information-first-ul {
            display: inline-block;
            width: auto;
            margin: 50px auto;
            list-style-type: none;
            padding: 0;
            margin-left: 90px;
        }
        .user-information li:not(.user-address) {
            display: block;
            height: 55px;
        }
        .user-address {
            display: block;
            height: 30px;
            margin-left: 35%;
        }
        .appointment-num {
            display: flex;
            justify-content: space-between;
            margin: 15px auto;
            width: 95%;
        }
        .user-history-container {
            width: 59%;
            min-height: 600px;
            height: auto;
            margin-bottom: 100px;
            padding-bottom: 50px;
            border-radius: 20px;
            margin-left: 1%;
            background: #e0e0e0;
        }
        .user-history-record {
            width: 95%;
            min-height: 200px;
            margin: 15px auto;
            border: 2px solid grey;
            border-radius: 20px;
            background-color: white;
        }
        .doc-information {
            display: flex;
            margin: 15px auto;
            width: 95%;
        }
        .doc-img, .doc-img img {
            width: 220px;
            height: auto;
        }
        .appointment-data {
            font-size: 20px;
        }
        .label {
            font-size: 15px;
            color: #2c2c2c;
        }
        
    </style>
</head>
<body>
    <div id="headerspace"><?php include('header-footer/header.php')?></div> <br>
    <div id="head-container">
        <div id="user-header">
            <div>
            <?php 
            include('conn.php');
            $sql = "SELECT * FROM user WHERE user_email = '$user_email'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            mysqli_close($con);
            if ($row['user_gender'] == "male") {
                echo "<img class='head-img' src='media/male.png'>";
            }
            else {
                echo "<img class='head-img' src='media/female.png'>";
            }?>
            </div>

            <div class="user-title"> 
                <div class="user-name"><?php echo $row['user_first_name']. " " . $row['user_last_name']?></div>
                <div style="font-size: 18px; color: gray">&#9993; <?php echo $user_email ?></div>
            </div>
        </div>
        

        <div id="total-appointment">
            <?php include('conn.php');
            $sql = "SELECT COUNT(user_email) FROM appointment WHERE user_email = '$user_email'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_fetch_array($result);
            ?>
            Total appointment made<span><?php echo $count[0]?><span>
        </div>

        <form method="post" id="logout-form">
            <button name="logout">Logout</button>
        </form>

    </div>

    <div class="mid-container">
        <div class="user-information">
            <ul class="user-information-first-ul">
                <li><i class="fa fa-id-card-o" style="font-size:24px"></i>&nbsp;&nbsp; <span class="label">Ic number: </span><?php echo $row['user_ic_number']?></li>
                <li><i class='far fa-calendar-alt' style='font-size:24px'></i>&nbsp;&nbsp; <span class="label">Date of birth: </span><?php echo $row['user_dob']?></li>
                <li><i class="fa fa-map-marker" style="font-size:24px"></i>
                <span class="label">&nbsp;&nbsp;&nbsp;&nbsp; Address: </span> 
                <ul>
                    <?php echo '<li class="user-address">'. $row['user_address_line1']. ', ' . $row['user_address_line2']. '</li>'?>
                    <?php echo '<li class="user-address">'. $row['user_postal_code']. ', ' . $row['user_city']. '</li>'?>
                    <?php echo '<li class="user-address">'. $row['user_state'] . '</li>'?>
                </ul></li><br><br><br>
                <li><i class="fa fa-phone" style="font-size:24px"></i><span class="label">&nbsp;&nbsp; Phone number: </span><?php echo $row['user_pnumber']?></li>
            </ul>
        </div>
        <div class="user-history-container">
            <div class="title2">Appointment History</div>

            <?php include('conn.php');
            $sql = "SELECT d.doctor_name,  ds.schedule_date, a.*
            FROM doctor_schedule ds, appointment a, doctor d
            WHERE a.doc_schedule_id = ds.doc_schedule_id AND d.doctor_id = ds.doctor_id 
            AND a.user_email = '$user_email'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            foreach ($result as $row) {
            ?>
                <div class="user-history-record">
                    <div class="appointment-num">
                        <div class="appointment-id">
                            <span class="label">Appointment ID:</span> <?php echo $row['appointment_id']?>
                        </div>
                        <div class="appointment-date-time">
                            <span class="label">Date:</span> <?php echo $row['schedule_date']?>&nbsp;&nbsp;<span class="label">Time: </span><?php echo $row['appointment_time']?>
                        </div>
                    </div>
                    <div class="doc-information">
                        <div class="doc-img">
                            <img src="media/doctor1.jpg">
                        </div>
                        <div class="appointment-data">
                            <span class="label">Doctor name: </span><?php echo $row['doctor_name']?> <br>
                            <span class="label">Reason: </span>
                            <?php if ($row['user_reason'] == "") {
                            echo "empty";
                            } else {
                                echo $row['user_reason'];
                            }
                            ?>
                            </span>
                        </div>
                    </div>
                </div>

            <?php }?>

        </div>
    </div>

    <div id="footer"><?php include('header-footer/footer.php')?></div>
</body>
</html>