<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose date & time</title>
    <style>
        div#headerspace {
            height: 130px;
        }
        body {
            background: linear-gradient(to right, #2c3e50, #bdc3c7);
        }
        div#footer .footer-link a{
            height:100%;
            color: white;
        }
        h1 {
            text-align: center;
            color: white;
        }
        .title2 {
            color: #d3d4d1;
            font-weight: 400;
        }
        .instruction1 {
            height: 80px;
            margin-left: 8%; 
        }
        .instruction1 img {
            height: 80px;
            width: 80px;
        }
        .instruction-text {
            display: inline-block;
            vertical-align: top;
            font-size: 28px;
            margin-left: 20px;
            line-height: 80px;
            color: white;
        }
        .outer-box {
            display: flex;
            width: 80%;
            margin: 0px auto;
            height: auto;
        }
        .doctor-information-column {
            width: 60%;
            height: auto;
            flex: column;
            margin-right: 30px;
        }
        .choose-date-time-container {
            width: 40%;
            height: auto;
        }
        .choose-date-time {
            min-height: 550px;
            background-color: #2c2c2c;
            color: #8ec7b7;
            border-radius: 30px;
            box-sizing: border-box;
            border: 1.5px solid #8ec7b7;
            padding-bottom: 20px;
        }
        .doctor-information1 {
            display: flex;
            width: 100%;
            height: 250px;
            background-color: #2c2c2c;
            margin-bottom: 25px;
            border-radius: 30px;
            border: 1.5px solid #8ec7b7;
            box-sizing: border-box;
        }
        .doctor-image {
            width: 35%;
            height: 300px;
        }
        .doctor-image img {
            display: block;
            height: 180px;
            width: 80%;
            margin: 30px auto;
        }
        .doctor-brief-information {
            width: 65%;
            height: 250px;
        }
        .doctor-brief-information>ul {
            list-style: none;
            margin: 30px 0px;
        }
        .doctor-information2 {
            width: 100%;
            height: auto;
            background-color: #2c2c2c;
            border-radius: 30px;
            border: 1.5px solid #8ec7b7;
            box-sizing: border-box;
        }
        .doctor-information2 ul {
            padding-top: 40px;
        }
        .doctor-information2 li {
            color: #96968F;
            font-size: 15px;
            list-style: none;
        }
        .doctor-information-column .doctor-data {
            color: white;
            font-size: 16px;
            margin-top: 5px;
            padding-right: 30px;
        }
        .instruction2,
        .instruction3 {
            margin: 0px auto;
            text-align: center;
            font-size: 22px;
        }
        .instruction2 {
            margin-top: 6%;
        }
        .choose-date-time form {
            height: 150px;
        }
        .choose-date-time input {
            display: block;
            height: 60px;
            width: 70%;
            margin: 0px auto;
            margin-top: 6%;
            border-radius: 10px;
            border: 1.5px solid #8ec7b7;
            text-align: center;
            box-sizing: border-box;
        }
        input[type="date"]::-webkit-datetime-edit  {
            margin-left: 15%;
        }
        input[type="date"]::-webkit-calendar-picker-indicator  {
            width: 10%;
            height: 70%;
            margin-top: 3%;
            margin-right: 4%;
        }
        .time-selector {
            margin: 0px auto;
            margin-top: 6%;
            width: 100%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
        }
        .time-selector form {
            margin: 0;
            padding: 0;
            width: auto;
            height: auto;
        }
        .time-selector button[type='submit'] {
            text-align: center;
            color: #090909;
            border-radius: 10px;
            width: 90px;
            height: 32px;
            line-height: 32px;
            font-size: 20px;
            border: 1px solid #8ec7b7;
            margin: 7px 10px;
            background-color: white;
            padding: 0;
        }
        .time-notice {
            margin: 0px auto;
            color: lightgray;
            font-size: 25px;
        }

    </style>
</head>
<body>
    <div id="headerspace"><?php include('header-footer/header.php')?></div> <br>

    <div class="instruction1">
        <img src="media/instruction_icon2.png">
        <div class="instruction-text">Know your doctor and choose a date & time</div> 
    </div> <br>
    
    <div class="outer-box">
        <?php 
            $doc_id = $_GET['doctor_id'];
            include('conn.php');
            $sql = "SELECT * FROM doctor d WHERE doctor_id = $doc_id";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>
            <div class="doctor-information-column">
                <div class="doctor-information1">
                    <div class="doctor-image">
                        <?php  
                        if ($row['doctor_portrait'] != ""){
                            echo '<img src="data:image/jpg;base64,' . base64_encode($row['doctor_portrait']) . 
                            '" width="100px" height="auto" />'; 
                        } else {
                            echo  "<img src='media/1234.jpg'/>";
                        } ?>
                    </div>
                    
                    <div class="doctor-brief-information">
                        <ul>
                            <li class="doctor-data" style="font-size: 26px;"><?php echo $row['doctor_name']?></li><br>
                            <li class="doctor-data"><?php echo $row['doctor_specialist']?></li><br>
                            <li class="doctor-data"><?php echo $row['doctor_experience']?> years</li>
                        </ul>
                    </div>
                </div>
                <div class="doctor-information2">
                    <ul>
                        <li>About doctor</li>
                        <li class="doctor-data"><?php echo $row['doctor_about']?></li><br>
                        <li>Specialization</li>
                        <li class="doctor-data"><?php echo $row['doctor_specialist']?></li><br>
                        <li>Qualification</li>
                        <li class="doctor-data">
                            <?php 
                            $sql = "SELECT * FROM doctor_qualification WHERE doctor_id = $doc_id";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo $row['doctor_qualification'] . "<br>";
                            } ?>
                        </li><br>
                        <li>Language</li>
                        <li class="doctor-data">
                            <?php 
                            $sql = "SELECT * FROM doctor_language WHERE doctor_id = $doc_id";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo ucfirst($row['doctor_language']) . "<br>";
                            } ?>
                        </li><br>
                    </ul>
                </div>
            </div>
        <?php }?>
        <div class="choose-date-time-container">
            <div class="choose-date-time">
                <div class="instruction2">Choose a date</div>
                    <form action="choosedatetime.php" method="get">
                        <input type="hidden" name="doctor_id" value="<?php echo $_GET['doctor_id']?>">
                        <input type="date" name="date" onchange='this.form.submit()'>
                    </form>
                <div class="instruction3">Available time</div>
                <div class="time-selector">
                    <?php 
                    if (isset($_GET['date'])) {
                        $date = $_GET['date'];
                        $date = date("Y-m-d", strtotime($date));    // user selected date
                        include('conn.php');
                        $sql = "SELECT a.appointment_time 
                                FROM doctor_schedule ds, appointment a
                                WHERE doctor_id = $doc_id AND a.doc_schedule_id = ds.doc_schedule_id AND schedule_date = '$date'";    // link with appointment and get booked time
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $booked_time_slot = array();
                        foreach ($result as $row) {
                            array_push($booked_time_slot, date("H:i", strtotime($row['appointment_time'])));
                        }

                        $sql = "SELECT * FROM doctor_schedule WHERE doctor_id = $doc_id AND schedule_date > CURDATE() AND date(schedule_date) = '$date' ORDER BY sche_start_time";    // find record match with selected doctor and date
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row != 0) {    // if record found
                            foreach ($result as $row) {
                                $today = strtotime("today");
                                $avg_time_slot = strtotime($row['average_time_slot']) - $today;
                                $start_time = strtotime($row['sche_start_time']) - $today;
                                $end_time = strtotime($row['sche_end_time']) - $today;
                                while ($start_time <= $end_time) {
                                    if (!in_array(date('H:i', ($start_time + $today)), $booked_time_slot)) { ?>
                                        <form action='user_confirm_appointment.php' method='post'>
                                            <input type='hidden' name='doc_schedule_id' value="<?php echo $row['doc_schedule_id']?>"></input>
                                            <input type='hidden' name='selected_time' value="<?php echo date('H:i', ($start_time + $today))?>"></input>
                                            <button type='submit'><?php echo date('H:i', ($start_time + $today))?></button>
                                        </form>

                                    <?php }
                                    $start_time += $avg_time_slot;
                                } ?>

                            <?php }?>

                        <?php }
                        else {
                            echo '<br>'.'<div class="time-notice">'."No slot is available in this day".'</div>';
                        } ?>

                    <?php } else { 
                        echo '<br>'.'<div class="time-notice">'."Please choose a date".'</div>'; }?>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <div id="footer"><?php include('header-footer/footer.php')?></div>
</body>
</html>