<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>footer</title>
    <style>
        * {
            font-family: "Microsoft yahei";
            margin: 0px;
        }
        .footer-container {
            width: 75%;            
            height: 40%;
            display: flex;
            flex-direction: column;
            margin: 0px auto;
        } 
        .footer-logo img {
            height: 70px;
            display: inline-block;
        }
        .footer-link {
            display: flex;
            height: auto;
            width: 100%;
        }
        .footer-link>div {
            width: 30%;
        }
        .footer-link ul {
            padding: 0;
        }
        .footer-link li {
            list-style-type: none;
            line-height: 45px;
        }
        .footer-link a,
        .footer-link a:visited {
            text-decoration: 0;
            color: #275A84;
            height: 45px;
        }
        .footer-link a:hover {
            background-color: lightgray;
            color: black;
        }
        #mostright {
            width: auto;
        }
    </style>
</head>
<body>
    <hr><br>
    <div class="footer-container">
        <div class="footer-logo">
            <a href="index.php"><img id="footerehclogo" src="media/ehclogo.png"></a>
        </div>
        <br>
        <div class="footer-link">
            <div>
                <ul>
                    <li><a disabled>Medical&nbsp;service</a></li>
                    <li><a href="covid19.php">Covid&nbsp;19</a></li>
                    <li><a href="doctor.php">Doctors</a></li>
                </ul>
            </div>
            <div>
                <ul>
                   <li><a href="appointment.php">Appointment</a></li>
                    <li><a href="appointment.php">My&nbsp;appointment</a></li>
                    <li><a href="makeappointment.php">Make&nbsp;appointment</a></li> 
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="aboutus.php">About&nbsp;us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </div>
            <div id="mostright">
                <ul>
                    <li><a disabled>Follow&nbsp;us:</a></li>
                    <li><a href="https://www.facebook.com/chua020727">Facebook</a></li>
                    <li><a href="https://www.instagram.com/blablawhitesheep_chua/">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br><br>
</body>
</html>
