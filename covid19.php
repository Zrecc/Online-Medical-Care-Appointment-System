<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div#headerspace {
            height: 130px;
        }

        .topic {
            font-family: "Timen News Roman";
            font-style: italic;
            text-align: center;
            color: whitesmoke;
            background-color: red;
            font-size: 22px;
        }

        h1 {
            font-family: "Timen News Roman";
        }

        strong {
            font-family: "Timen News Roman";
            background-color: #CCCCFF;
        }

        .covid {
            width: 850px;
            border-radius: 25px;
            object-fit: cover;
            float: right;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
            border-radius: 25px;
        }

        .content {
            font-size: 18px;
            font-family: "Timen News Roman";
            font-style: oblique;
            line-height: 1.6;
            width: 480px;
            padding: 20px;
            margin: 5%;
            text-align: justify;
        }

        .img_container {
            display: block;
            object-fit: cover;
            max-width: 100%;
            margin-left: 32%;
        }

        .row {
            border-radius: 25px;
            border: 2px solid #73AD21;
            padding: 45px;
            margin-left: 10%;
            margin-right: 10%;
            width: auto;
            height: auto;
            clear: both;
            display: table;
        }

        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
            border-radius: 25px;
        }

        .center {
            clear: both;
            text-align: justify;
            font-size: 22px;
            font-family: "Timen News Roman";
            font-style: italic;
            line-height: 1.6;
            margin-left: 350px;
        }

        .btn {
            text-align: center;
            font-size: 20px;
            font-family: "Timen News Roman";
            font-style: oblique;
            font-weight: 900;
            line-height: 1.6;
            width: 320px;
            padding: 10px;
            border: 3px solid gray;
            border-radius: 25px;
            background-color: #F09819;
            margin-left: 400px;
            cursor: pointer;
            clear: both;
        }
    </style>
    <title>Covid-19</title>
</head>

<body>
    <div id="headerspace"><?php include 'header-footer/header.php'; ?></div>
    <div class="topic">
        <br>
        <h1>&lt;&lt;&lt;Covid-19&gt;&gt;&gt;</h1> <br>
    </div>

    <br>

    <div class="clearfix">
        <img class="covid" src="media/covid.jpg" alt="Covid-19 virus"> <br>

        <div class="content">
            Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus. Most people infected with the virus will develop mild to moderate respiratory illness and recover without the need for special treatment. However, some people will become severely ill and require medical attention. <strong>Older people and people with underlying conditions such as cardiovascular disease, diabetes, chronic respiratory disease or cancer are more likely to develop serious illnesses.</strong> Anyone can become infected with COVID-19 and become seriously ill or die at any age.
        </div>
    </div>

    <br><br><br><br>

    <div class="img_container">
        <img src="media/slide2.jpg" alt="Vaccine">
    </div>

    <br><br><br><br>

    <div class="row">
        <div class="column">
            <img src="media/Stethoscope.jpg" alt="Stethoscope" style="width:98%;border-radius: 25px;">
        </div>
        <div class="column">
            <img src="media/vaccine.webp" alt="Vaccine" style="width:98%;border-radius: 25px;">
        </div>

        <div class="center">
            <br> Select a doctor to have your vaccine or covid test.
        </div>

        <br><br>

        <a href="makeappointment.php"><div class="btn">
            Make Appointment
        </div></a>
    </div>

    <br><br><br><br>

    <?php include 'header-footer/footer.php'; ?>
</body>

</html>