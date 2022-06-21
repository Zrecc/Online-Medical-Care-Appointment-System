<?php

use LDAP\Result;
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Doctor Details</title>
    <style>
        	body {
            height: 100%;
            margin: 0;
        }
        div#headerspace {
            display: inline-block;
            width: 12%;
            position: fixed;
        }
        div#main-content {
            width: 88%;
            display: inline-block;
            margin-left: 12%;
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
            width: 100%;
            height: auto;
            display: flex;
            margin-right: 30px;
        }
        .choose-date-time {
            width: 40%;
            height: 550px;
            background-color: #2c2c2c;
            color: #8ec7b7;
            border-radius: 30px;
            box-sizing: border-box;
            border: 1.5px solid #8ec7b7;
            
        }
        .doctor-information1 {
            display: flex;
            width: 100%;
            height: 250px;
            background-color: #2c2c2c;
            margin-right: 25px;
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
			margin-left: 25px;
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
        
        .button{
            margin-left:550px;
            border-radius: 5px;
            width: 100px;
            height: 50px;
            background-color: #808080;
            color: #FFF;
        }
    </style>
</head>
<body>
<div id="headerspace"><?php include_once('adminheader.php');?></div>
    <div id="main-content">
    <!-- <h1>Make appointment</h1> <br>
    <h1 class="title2">2 steps to make an appointment</h1> <br><br><br> -->

    <div class="instruction1">
        <div class="instruction-text">View Doctor Details</div> 
    </div> <br>
    
    <div class="outer-box">
        <?php 
            $doc_id = $_GET['doctor_id'];
            include('conn.php');
            $sql = "SELECT * FROM doctor WHERE doctor_id = $doc_id";
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
    </div><br><br>
        <div>
		<button class="button" type="cancel" name="cancel" onclick="document.location='doctor_list.php'">Cancel</button><br><br>
      	</div>
    </div>
</body>
</html>