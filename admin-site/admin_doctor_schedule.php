<?php include('protected.php');?>
<!DOCTYPE html>
<html>
    <head><title>Doctor Schedule</title>
    <style>
        .button {
            height:20px;
            width:25px;
            color:#7393B3;
        }
        .button:hover{
            color:green;
        }
        table, td{
            border: 2px solid white;
            border-collapse:collapse;
            padding-left:5px;
        }
        td{
            height:40px;
            color:black;
        }
        #doc_sch_list{
            display:flex;
            justify-content: space-between;
            position:relative;
        }
        #add_icon{
            color:green;
            padding:25px 10px 0;
            flex:1;
        }
        #search_bar{
            padding:23px 10px 0;
        }
        #add_icon:hover{
            color:yellow;
        }
        #headerspace{
            position:fixed;
            display: inline-block;
            width: 12%;
        }
        #main-content{
            width:88%;
            display: inline-block;
            margin-left:12%;
        }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <div id="headerspace"><?php include_once("adminheader.php"); ?></div>
    </head>
    <body>
        <div id="main-content">
        <h1> Doctor Schedule Management </h1><hr>
        <div>
            <div id="doc_sch_list">
                <h3 style="color:darkblue; flex:9">Doctor Schedule List</h3>
                <form method="post" id="search_bar" style="flex:2">
                    <input type="text" name="search_key" placeholder="search doctor name">
                    <button name="searchbtn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>

                <a href="add_doc_sche.php"><i class="fa fa-plus-circle" id="add_icon" aria-hidden="true"></i></a>
            </div>
            <!-- call data -->
            <?php
                include("conn.php");
                $result = mysqli_query($con,"SELECT * FROM doctor_schedule");

            // search
                if(isset($_POST['searchbtn'])){ 
                    $search_key = $_POST['search_key']; 
                    $result = mysqli_query($con,"SELECT * FROM doctor_schedule inner JOIN doctor 
                    ON doctor_schedule.doctor_id = doctor.doctor_id 
                    WHERE doctor.doctor_name LIKE '%$search_key%' 
                    ORDER BY doctor_schedule.doc_schedule_id");
                }
            ?>

            <table width="100%">
                <tr bgcolor="#7393B3">
                    <td>Doctor schedule id</td>
                    <td>Doctor id</td>
                    <td>Doctor Name</td>
                    <td>Schedule date</td>
                    <td>Schedule start time</td>
                    <td>Schedule end time</td>
                    <td>Average time slot (Min)</td>
                    <td>Action</td>
                </tr>

                <?php

                while($row = mysqli_fetch_array($result))
                {
                    echo"<tr bgcolor=\"gainsboro\">";

                    echo"<td>";
                    echo $row['doc_schedule_id'];
                    echo"</td>";

                    echo"<td>";
                    $doc_id =$row['doctor_id'];
                    echo $row['doctor_id'];
                    echo"</td>";

                    $sql = "SELECT * FROM doctor WHERE doctor_id = $doc_id";
                    $table_doc = mysqli_query($con, $sql);
                    $doc = mysqli_fetch_array($table_doc);
                    echo"<td>";
                    echo $doc['doctor_name'];
                    echo"</td>";

                    echo"<td>";
                    echo $row['schedule_date'];
                    echo"</td>";

                    echo"<td>";
                    echo $row['sche_start_time'];
                    echo"</td>";

                    echo"<td>";
                    echo $row['sche_end_time'];
                    echo"</td>";

                    echo"<td>";
                    echo $row['average_time_slot'];
                    echo"</td>";

                    // edit
                    echo"<td><a href=\"../admin-site/doctor-schedule-edit.php?doc_schedule_id=";
                    echo $row['doc_schedule_id'];
                    echo"\"><i  class=\"far fa-edit button\" alt=\"edit\"></i></a>";  
                    
                    // delete
                    echo"<a href=\"../admin-site/admin-action-php1/doctor-schedule-delete.php?doc_schedule_id=";
                    echo $row['doc_schedule_id'];
                    echo "\" onClick=\"return confirm('Delete Doctor Schedule ID ";
                    echo $row['doc_schedule_id'];
                    echo" details?');\"><i  class=\"fa fa-trash button\" alt=\"delete\"></i></td></tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </div>
        </div>
    </body>
</html>