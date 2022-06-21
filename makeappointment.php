<?php 
session_start() 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Make appointment</title>
    <style>
        * {
            font-family: "Microsoft yahei";
            margin: 0;
        }
        body {
            background: linear-gradient(to right, #2c3e50, #bdc3c7);
        }
        div#headerspace {
            height: 130px;
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
            display: flex;
            justify-content: space-between;
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
        .search {
            line-height: 80px;
            margin-right: 200px;
        }
        .search-box {
            height: 35px;
            border-radius: 10px;
        }
        button[type="submit"] {
            border-radius: 6px;
        }
        .flex-container {
            display: flex;
            flex-direction: column;
            width: 70%;
            margin: 0px auto;
            height: auto;
        }
        .outer-box {
            background-color: #2c2c2c;
            border: 1.5px solid #8ec7b7;       
            width: 100%;
            height: 330px;               
            margin-bottom: 30px;            
            border-radius: 30px;  
        }
        .doctor-information {
            display: flex;
            color: #96968F;
            font-size: 15px;
        }
        .doctor-information>div {
            height: 270px;
            display: inline-block;
        }
        .doctor-column1 {
            width: 20%;
        }
        .doctor-column1>img {
            display: block;
            width: 80%;
            height: auto;
            margin: 40px auto;
        }
        .doctor-column2 {
            height: 100%;
            width: 40%;
        }
        a.select-doctor-button,
        a.select-doctor-button:visited {
            display: block;
            background: linear-gradient(to right, #373b44, #4286f4);
            color: white;
            margin: 0px auto;
            height: 35px;
            width: 100px;
            border-radius: 10px;
            text-align: center;
            line-height: 35px;
            font-size: 16px;
        }
        .doctor-column3 {
            width: 40%;
            margin-right: 20px;
            box-sizing: border-box;
        }
        ul {
            list-style: none;
        }
        .doctor-data {
            font-size: 20px;
            color: white;
        }
        #pagination {
            display: flex;
            justify-content: center;
            margin: 0px auto;
        }
        #pagination a {
            color: white;
            background-color: #2c2c2c;
            padding: 8px 16px;
            text-decoration: none;
        }
        #pagination a.active, a:hover {
            background-color: #4CAF50;
            color: white;
        }

    </style>
</head>
<body>
    <div id="headerspace"><?php include('header-footer/header.php')?></div> <br><br><br>

    <h1>Make appointment</h1> <br>
    <h1 class="title2">2 steps to make an appointment</h1> <br><br>

    <div class="instruction1">
        <div>
            <img src="media/instruction_icon1.png">
            <div class="instruction-text">Choose a doctor</div> 
        </div>
        <div>
            <form action="makeappointment.php" method="get" class="search">
                <input type="text" name="search" class="search-box" placeholder="&nbsp;&nbsp;Search"> 
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div> <br>
    
    <div class="flex-container"> 
        <?php include "conn.php";
        $results_per_page = 3;
        $sql = "SELECT * FROM doctor";
        if (isset($_GET['search'])){    //Search function
            $search = $_GET['search'];
            $search = preg_replace("#[^0-9a-z]#i","", $search);
            $sql = "SELECT * FROM doctor WHERE doctor_name LIKE '%$search%'";
        }  
        $result = mysqli_query($con, $sql);
        $number_of_results = mysqli_num_rows($result);  // get total number of result from all or search


        $number_of_pages = ceil($number_of_results/$results_per_page);  // define need how many pages, search will be less
        if (!isset($_GET['page'])) {    // set default page
            $page = 1;
        } else {
            $page = $_GET['page'];
        }        
        $this_page_first_result = ($page - 1) * $results_per_page;  // work with mySQL LIMIT syntax


        if (isset($_GET['search'])){    // sql for display the corresponding page result
            $sql = "SELECT * FROM doctor WHERE doctor_name LIKE '%$search%'
            LIMIT " . $this_page_first_result. ',' . $results_per_page;
        } else {
            $sql = "SELECT * FROM doctor LIMIT " . $this_page_first_result. ',' . $results_per_page;
        }
        $result = mysqli_query($con, $sql);
        while ($rows = mysqli_fetch_array($result)) 
        {
        ?>
            <div class="outer-box">
                <div class="doctor-information">

                    <div class="doctor-column1">
                        <?php  
                        if ($rows['doctor_portrait'] != ""){
                            echo '<img src="data:image/jpg;base64,' . base64_encode($rows['doctor_portrait']) . 
                            '" width="100px" height="auto" />'; 
                        } else {
                            echo  "<img src='media/1234.jpg'/>";
                        } ?>
                    </div>

                    <div class="doctor-column2">
                        <ul> <br><br>
                            <li>Name:</li>
                            <li class="doctor-data"><?php echo $rows['doctor_name'] ?></li> <br>
                            <li>Specialist:</li>
                            <li class="doctor-data"><?php echo $rows['doctor_specialist'] ?></li>
                        </ul>
                    </div>

                    <div class="doctor-column3">
                        <ul> <br><br>
                            <li>Education:</li>
                            <li class="doctor-data"><?php echo $rows['doctor_edu_level'] ?></li> <br>
                            <li>Language:</li>
                            
                            <li class="doctor-data"><?php $sql = "SELECT * FROM doctor_language WHERE doctor_id = '".$rows['doctor_id']."' ";
                                                    $lang_result = mysqli_query($con, $sql);
                                                    $lang_result_array = array();
                                                    while ($language_rows = mysqli_fetch_array($lang_result)) {
                                                        array_push($lang_result_array, ucfirst($language_rows['doctor_language']));
                                                    }
                                                    echo implode(", ", $lang_result_array);
                                                    ?>
                            </li> <br>
                            
                            <li>Experience:</li>
                            <li class="doctor-data"><?php echo $rows['doctor_experience'] ?> years</li> <br>
                        </ul>
                    </div>
                </div>
                <a class="select-doctor-button" href='choosedatetime.php?doctor_id=<?php echo $rows['doctor_id']?>'>Select</a>
            </div>
        <?php }?> 
    </div>
    <br><br>
        <div id="pagination">
            <?php for ($page = 1; $page <=$number_of_pages; $page++) {
                if (isset($_GET['search'])) {
                    echo '<a href="makeappointment.php?page=' .$page. '&search='. $search .'">' . $page . '</a>';
                } else {
                    echo '<a href="makeappointment.php?page=' .$page. '">' . $page . '</a>';
                }
            }
            ?>
        </div>
<br><br>
    <div id="footer"><?php include('header-footer/footer.php')?></div>
</body>
</html>