<?php 
    session_start();
?>
<!DOCTYPE html>
    <head>
        <title>Elderly Home's Club</title>

        <style>
        div#headerspace {
                height: 130px;
        }
        .main_page_img {
            display:block;
            margin:10px auto;
            width:1000px;
            max-width: 100%;
            height: auto;
            border-radius:10px;
        }
        div.h1{
            font-family: "Microsoft yahei";
            font-size:30px;
            font-weight: 900;
            text-align:center;
        }
        .container{
            display:flex;
            margin:0px 50px 10px 50px;
            flex-wrap:wrap;
        }
        .container div{
            padding:10px;
            width:auto;
            height:auto;
            margin:20px;
        }
        .img-col{
            flex:2;
        }
        .img-col img{
            max-width: 100%;
            max-height: 100%;
            min-width:100px;
        }
        .text-col{
            flex:3;
            line-height:1.5;
            text-align: justify;
        }
        .text-col p{
            color: #999999;
            font-family: 'Cabin', sans-serif;
        }
        .center{
            text-align:center;
        }
        .box{
            border-radius:15px;
            background-color:#275A84;
            max-width:350px;
        }
        .patientview{
            flex-direction:column;
        }
        /* star style */
        .star{
            color:orange;
        }
        </style>
        
        <!-- header -->
        <div id="headerspace"><?php include_once("header-footer/header.php"); ?> </div>
    </head>

    <body>
        <!-- font type -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital@1&display=swap" rel="stylesheet">

        <!-- img -->
        <img class="main_page_img" src="media/mainpage_picture1.png" alt="Picture1"><br><br>
        
        <!-- About Us -->
        <div class="h1"> About Us </div>
        <div class="container">
            <div class="text-col">
                <h2>What we do?</h2>
                <p> The Elderly Home's Club is a social welfare organisation that provides shelter, support and medical services to the elderly in need. As our slogan says, 
                    "We're Right Where You Need Us". We will always be ready to look after your health. We are a non-profit organisation. 
                    Our hope is that the poor and homeless will now have a place to call home where they too can enjoy a better quality of life. <br><a href="aboutus.php">Learn more</a></p>
            </div>
            <div class="img-col" style><img src="media/ehclogo.png" alt=""></div>
        </div>
        
        <div class="container">
            <div class="img-col"><img src="media/map.png" alt=""></div>
            <div class="text-col">
                <h2>Where we are?</h2>
                <p> We are based in Bukit Jalil Kuala Lumpur, Malaysia. All the managers of our Elderly's Home Club will be in Kuala Lumpur to serve the elderly. 
                    Based on this location, our primary focus is to help those elderly people who live in Kuala Lumpur.</p>
            </div>
        </div><br><br>

        <!-- Step -->
        <div class="h1">How to make an appointment</div>
        <div class="container">
          <!-- step 1 -->
            <div class="img-col center">
              <img src="media/circle1.png" alt=""><br>
              <img src="media/step-img1.png" alt="" style="height:auto; max-width:100%"><br>
              Get an account
            </div>
            <!-- step 2 -->
            <div class="img-col center">
              <img src="media/circle2.png" alt="">
              <img src="media/step-img2.png" alt="" style="height:auto; max-width:100%"><br>
              Go make appointment page
            </div>
            <!-- step 3 -->
            <div class="img-col center">
              <img src="media/circle3.png" alt="">
              <img src="media/step-img3.png" alt="" style="height:auto; max-width:100%"><br>
              Choose your doctor, preferred date and time
            </div>
            <!-- step 4 -->
            <div class="img-col center">
              <img src="media/circle4.png" alt="">
              <img src="media/step-img4.png" alt="" style="height:auto; max-width:100%"><br>
              Done. Your appointment is confirmed
            </div>
        </div><br><br>
        <!-- make an appointment -->
        <?php 
                if (isset($_SESSION['user'])) { ?>
                <div class="container" style="justify-content:center">
                    <div class="text-col center box"><a href="makeappointment.php" style="color:white;">Make an Appointment</a></div>
                </div><br><br><br>
                <?php 
                } else { ?>
                    <div class="container" style="justify-content:center">
                        <div class="text-col center box"><a href="login.php" style="color:white;">Make an Appointment</a></div>
                        <div class="center">Or</div>
                        <div class="text-col center box"><a href="login.php" style="color:white;">Login | Sign up</a></div>
                    </div><br><br><br>
                <?php } ?>

        <!-- patient reviews -->
        <div class="container" style="border-radius:10px; border: 2px solid #73AD21;" >
            <div class="text-col center"><h2>Patient Review</h2>
                <div class="container" >
                    <div class="img-col center patientview">
                        <img src="media/review-img1" alt="" style="height:auto; max-width:100%">
                        <div class="text-col center">4 / 5<br>
                            <i aria-hidden="true" class="fa fa-star star"></i>
                            <i aria-hidden="true" class="fa fa-star star"></i>
                            <i aria-hidden="true" class="fa fa-star star"></i>
                            <i aria-hidden="true" class="fa fa-star star"></i>
                            <i aria-hidden="true" class="fa fa-star-o star"></i></div>
                            <p>The services that I receive from EHC is excellent. The doctor and the staff are friendly and ensure that I am properly informed about my health and care. 
                                I would have no qualms in recommending them to friendly and friends.</p>
                    </div>
                    
                    <div class="img-col center patientview">
                            <img src="media/chua" alt="" style="margin:65px 0; height:auto; max-width:100%">
                            <div class="text-col center">4.5 / 5<br>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star-half-full star"></i></div>
                            <p>The doctor is incredible. Not only has she taken great care of my health, but also she is lovely to speak with at every appointment. 
                                It’s rare to find a doctor that combines such personal touches and care for a patient as a person with outstanding quality of medical care. 
                                I highly recommend becoming her patient!</p>
                    </div>
                    
                    <div class="img-col center patientview">
                            <img src="media/review-img1" alt="" style="height:auto; max-width:100%">
                            <div class="text-col center">4 / 5<br>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star star"></i>
                                <i aria-hidden="true" class="fa fa-star-o star"></i></div>
                                <p>The doctor was terrific. Knowledgeable, sensitive, informative… 
                                    I immediately felt at ease – and felt confident in my receiving expert medical care. Staff was great, too. 
                                    Walked away, very impressed w. the overall experience. HIGHLY recommend.</p>
                    </div>
                </div>
            </div>
        </div><br><br>
        <!-- Follow us   -->
        <div class="h1">Follow us on social media</div><br>
        <div class="center"><h2>The Elderly Home's Club<h2></div><br>
        <div class="container text-col"><p>&emsp;&emsp;&emsp;We are a non-profit organization who .....The process of accruing instruction through a pipeline is called pipelining. Pipelining processing allows instruction to be stored and executed in an orderly process. In the course of execution, a technique where various instructions are overlapped is called pipelining. The pipeline is separated into groups where instructions enter from one end and exit from another end and these groups are linked with one another to produce a pipe-like structure.</div><br><br>
        <div class="container" style="justify-content:center">
            <div class="text-col center box"><a target="_blank" href="https://www.instagram.com/blablawhitesheep_chua/" style="color:white">Follow us on Instagram</a></div>
            <div class="center">Or</div>
            <div class="text-col center box"><a target="_blank" href="https://www.facebook.com/chua020727" style="color:white">Follow us on Facebook</a></div>
        </div><br><br>
        <!-- footer -->
        <div><?php include_once("header-footer/footer.php"); ?></div>
    </body>
</html>