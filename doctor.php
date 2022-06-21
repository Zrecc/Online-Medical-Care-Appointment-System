<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>

    <style>
        div#headerspace {
            height: 130px;
        }

        * {
            box-sizing: border-box;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .icon {
            width: 30%;
            border-radius: 10%;
            object-fit: cover;
            float: right;
            margin-right: 180px;
            background-color: #1488CC;
        }

        .topic {
            font-style: italic;
            text-align: center;
            font-size: 22px;
            background-color: #FF512F;
        }

        h1,
        h2 {
            font-family: "Timen News Roman";
        }

        .content {
            font-size: 20px;
            font-family: "Timen News Roman";
            line-height: 1.6;
            width: 480px;
            padding: 75px;
            margin: 5%;
            text-align: justify;
        }

        strong {
            font-family: "Timen News Roman";
            background-color: #CCCCFF;
        }

        .header {
            font-family: "Timen News Roman";
            font-style: italic;
            font-size: 22px;
            margin-left: 150px;
        }

        .row {
            border-radius: 25px;
            border: 2px solid #73AD21;
            padding: 45px;
            margin-left: 20%;
            margin-right: 22%;
            width: auto;
            height: auto;
            clear: both;
            display: table;
        }

        .column {
            float: left;
            width: 70%;
            padding: 2px;
        }

        .btn {
            clear: both;
            text-align: center;
            font-size: 20px;
            font-family: "Timen News Roman";
            font-style: oblique;
            font-weight: 900;
            line-height: 1.6;
            width: 400px;
            padding: 20px;
            border: 3px solid gray;
            margin-left: 400px;
            cursor: pointer;
            border-radius: 25px;
            background-color: #F09819;
        }

        .info {
            padding-left: 5px;
            clear: both;
            float: left;
            font-family: "Timen News Roman";
            font-size: 18px;
            line-height: 1.6;
            text-align: justify;
        }

        .vl {
            clear: both;
            border-bottom: 3px solid green;
            height: 50px;
            margin-right: 230px;
        }

        button {
            font-family: "Timen News Roman";
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            background-color: #FFC837;
            padding: 10px;
            cursor: pointer;
        }

        .section {
            display: none;
        }

        li {
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            line-height: 1.6;
        }

        #doc {
            width: 600px;
        }

        .img_con {
            display: block;
            width: 1000px;
            margin: 0px auto;
            border-radius: 25px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#hide").click(function() {
                $(".section").hide();
            });
            $("#show").click(function() {
                $(".section").show();
            });
        });
    </script>
    </script>

</head>

<body>
    <div id="headerspace"><?php include 'header-footer/header.php'; ?></div>

    <div class="topic">
        <br>
        <h1>Doctor</h1>
        <br>
    </div>

    <br>

    <div class="clearfix">
        <br><img class="icon" src="media/doctor_icon.png" alt="Doctor Icon"><br>

        <div class="content">
            Our doctors have been trained for a long time in order to assist you in your consultations. In addition to this, they are also experienced professionals. In addition, <strong>the doctors are generally provide support in Malay, English or Mandarin.</strong> As always, we are ready to be by your side when you need us.
        </div>
    </div>

    <br><br><br><br>

    <div class="header">
        <h2>Our Doctor</h2>
        <br><img class='img_con' src="media/doctors.png" alt="Doctor"><br>
    </div>

    <br><br>


    <button id='hide' style='margin-left: 700px;'>Collapse</button>
    <button id='show'>Show More</button>

    <br><br>

    <ul class="section">
        <?php
        include('conn.php');
        $x = 1;
        $result = mysqli_query($con, "SELECT * FROM doctor");
        $rowcount = mysqli_num_rows($result);
        // <img src='$row[doctor_portrait]' alt='Doctor Image' id='doc'> - line 216 original code
        while ($x <= $rowcount) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['doctor_portrait'] != ""){
                    $doc_img = "src='data:image/jpg;base64," . base64_encode($row['doctor_portrait']);
                } else {
                    $doc_img = "src='media/1234.jpg'";
                }
                echo "
                    <br><br>
                    <div class='row'>
                        <div class='column'>
                            <img $doc_img ' width='250px' height='auto' />
                        </div>
                        <div class='vl'></div>
                            
                        <br><br>

                        <ul>
                        <li>Doctor ID: $row[doctor_id]</li>
                        <li>Name: $row[doctor_name]</li>
                        <li>Specialist $row[doctor_specialist]</li>
                        <li>Education Level: $row[doctor_edu_level]</li>
                        <li>Experience: $row[doctor_experience]</li>
                        <li>About: $row[doctor_about]</li>
                        </ul><br>

                        <a href='choosedatetime.php?doctor_id=$row[doctor_id]'> <div class='btn'>Know more or make an appointment with him/her.</div></a>
                    </div>
                        ";
            }
            $x++;
        }
        ?>
    </ul><br><br>

    <?php include 'header-footer/footer.php'; ?>

</body>

</html>