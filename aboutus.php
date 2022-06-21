<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        div#headerspace {
            height: 130px;
        }

        .nav {
            position: fixed;
            top: 35%;
        }

        #doctor {
            display: block;
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 25px;
        }

        div.about_us {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
        }

        div.Headquarter {
            background-image: url("https://images.pexels.com/photos/92225/pexels-photo-92225.jpeg?cs=srgb&dl=pexels-zukiman-mohamad-92225.jpg&fm=jpg");
            background-size: cover;
            border-radius: 50%;
            display: block;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
        }

        #about_us {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
        }

        .text {
            text-align: justify;
            font-size: 19px;
            font-family: "Timen News Roman";
            font-style: oblique;
            line-height: 1.6;
            margin-right: 370px;
            margin-left: 370px;
        }

        #hq {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
            color: #ffff00;
        }

        #ps {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
        }

        #awards {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-style: italic;
        }

        strong {
            font-family: "Timen News Roman";
            background-color: #CCCCFF;
        }

        div.nav {
            margin-left: 30px;
            float: left;
            border-radius: 25px;
            border: 2px solid #73AD21;
            padding: 15px;
            width: auto;
            height: auto;
        }

        ul.boxes {
            list-style-type: none;
            margin: 0;
            padding: 0;
            font-family: "Timen News Roman";
            font-style: italic;
            font-size: 16px;
            cursor: pointer;
            line-height: 1.5;
        }

        #text {
            text-align: center;
            color: whitesmoke;
            font-size: 20px;
            font-family: "Timen News Roman";
            line-height: 1.6;
            padding: 150px;
        }

        em {
            font-family: "Timen News Roman";
            background-color: #7B68EE;
        }

        #hlogo {
            display: block;
            width: 600px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10%;
        }

        #plogo {
            display: block;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10%;
        }

        #ac1 {
            object-fit: cover;
            width: 330px;
        }

        #ac2 {
            object-fit: cover;
            width: 350px;
        }

        #ac3 {
            object-fit: cover;
            width: 330px;
        }

        a,
        h2 {
            font-family: "Timen News Roman";
            font-size: 20px;
            font-weight: 900;
        }
    </style>
    <title>The Elderly Home's Club </title>
</head>

<body>

    <div id="headerspace"><?php include 'header-footer/header.php'; ?></div>

    <img src="media/doctors.png" alt="Doctors" id="doctor">
    <br>

    <div class="nav">
        <ul class="boxes">
            <section>
                <h2>About Us</h2>
                <a href="#doctor">Introduction</a><br>
                <a href="#about_us">Headquarter</a><br>
                <a href="#ps">Partnerships</a><br>
                <a href="#awards">Awards</a>
            </section>
        </ul>
    </div>

    <div class="about_us">
        <h1 id="about_us">About us</h1>
        <br>
        <p class="text">
            The Elderly Home's Club is a social welfare organisation that provides shelter, support and medical services to the elderly in need. <strong>As our slogan says, "We're Right Where You Need Us". </strong>We will always be ready to look after your health. We are a non-profit organisation. Our hope is that the poor and homeless will now have a place to call home where they too can enjoy a better quality of life.
        </p>
    </div>

    <br><br>

    <div class="Headquarter">
        <br><br>
        <h1 id="hq">Headquarter</h1>
        <br><br><br><br>
        <div>
            <p id="text">We are based in <em>Bukit Jalil Kuala Lumpur, Malaysia. </em>All the managers of our Elderly's Home Club will be in Kuala Lumpur to serve the elderly. Based on this location, our primary focus is to help those elderly people who live in Kuala Lumpur.</p>
        </div>
    </div>

    <br><br>

    <div class="pships">
        <br><br>
        <h1 id="ps">Partnerships</h1>
        <div class="images_container">
            <img src="media/hospital.jpg" alt="Gleneagles Hospital Kuala Lumpur" id="hlogo">
            <img src="media/pantai.png" alt="Pantai Hospital Kuala Lumpur" id="plogo">
        </div>
        <div>
            <br>
            <p class="text">Since 2017, Gleneagles Hospital Kuala Lumpur and Pantai Hospital Kuala Lumpur are our medical partner. We provide each other with medical information and medical assistance when we need it. In addition, both hospitals have agreed that patients can visit either hospital when they need help. </p>
        </div>
    </div>

    <br><br>

    <div class="awards">
        <br><br><br>
        <h1 id="awards">Awards</h1><br>
        <div style="display:block; margin-left: 250px; margin-right: 75px;">
            <img src="media/cert1.png" alt="Award Certification 1" id="ac1">
            <img src="media/cert2.jpg" alt="Award Certification 2" id="ac2">
            <img src="media/cert3.jpg" alt="Award Certification 3" id="ac3">
        </div>
        <div>
            <br>
            <p class="text">Over the years, we have worked hard to provide a reliable and safe service for everyone. We are very proud that the media and others in the health sector have recognised our efforts. Here is a photo of our club's award-winning accreditation.</p>
        </div>
        <br>
    </div>

    <?php include 'header-footer/footer.php'; ?>


</body>

</html>