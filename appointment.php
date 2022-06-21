<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Appointment</title>

    <style>
        *  {
            margin: 0;
            font-family: "Microsoft yahei";
        }
        div#headerspace {
            height: 130px;
        }
        #title {
            color: #2c2c2c;
            text-align: center;
            background-color: rgba(211, 212, 209, 0.5);
        }
        #phptitle {
            font-size: 30px;
            text-align: center;
            color: #373b44;
        }
        div#appointment_details {
            text-align: center;
            height: auto;
        }
        div#appointment_details table { 
            border-collapse: collapse;
            width: 95%;           
            background-color: white;  
            margin: 0px auto;
            height: auto;
        }        
        div#appointment_details th, td {
            color: #2c2c2c;
            border: solid 0.5px gray;
        }
        div#appointment_details tr:nth-child(odd) {
            background-color: white;
        }
        div#appointment_details tr:nth-child(even) {
            background-color: rgba(211, 212, 209, 0.5);
        }
        div#appointment_details th, td {
            font-size: 16px;
            width: 200px;
            height: 35px;                
        }
        div#appointment_details td {
            font-size: 14px;
            color: black;
        }
        td a, td a:visited {
            background-color: red; 
            display: inline-block;
            width: 70px;
            height: 20px;
            border:none;
            border-radius: 5px;
            color: white;
        }
        #appointment_banner {
            height: 450px;
            width: 100%;
        }
        a#appointment_link {
            display: block;
            height: 60px;
            width: 280px;
            text-align: center;
            margin: 0px auto;
            color: white;            
            background: linear-gradient(to right, #373b44, #4286f4);
            border-radius: 12px;
            line-height: 60px;
        }
    </style>

</head>
<body>
        <div id="headerspace"><?php include_once('header-footer/header.php');?></div>
        <br><br><br>

        <h1 id="title">My Appointment List</h1> <br><br><br>
        <?php if(isset($_SESSION['user'])) {
            include('conn.php');
            $user_email = $_SESSION['user'];
            $sql = "SELECT d.doctor_name,  ds.schedule_date, a.*, u.user_first_name, u.user_last_name
                    FROM doctor_schedule ds, appointment a, doctor d, user u
                    WHERE a.doc_schedule_id = ds.doc_schedule_id AND d.doctor_id = ds.doctor_id 
                    AND a.user_email = u.user_email AND u.user_email = '$user_email' AND a.appointment_status = 'booked'
                    ORDER BY ds.schedule_date";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_fetch_array($result);
            if ($rows == 0) {
                echo "<div id='phptitle'>
                    You have no appointment to show, make an appointment now.
                </div>";
            }
            else { ?>
                <div id="appointment_details">
                    <table>
                        <tr id="table_header">
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Appointment Status</th>
                            <th>Cancel</th>
                        </tr>
                <?php foreach ($result as $rows) 
                {
                ?>
                    <tr>
                        <td><?php echo $rows['appointment_id']?></td>

                        <td>
                            <?php 
                                echo $rows['user_first_name']. " " . $rows['user_last_name'];
                            ?>
                        </td>

                        <td>
                            <?php echo $rows['doctor_name']?>
                        </td>
                        <td>
                            <?php echo $rows['schedule_date']?>
                        </td>
                        <td><?php echo $rows['appointment_time']?></td>
                        <td><?php echo $rows['appointment_status']?></td>
                        <td>
                        <?php echo "<a href=\"action-php1/appointment-cancel.php?appointment_id=";
                            echo $rows['appointment_id'];
                            echo "\" onClick=\"return confirm('Cancel this appointment?');\">Cancel</a>";?>
                        </td>
                    </tr>
                <?php }?>
            <?php  mysqli_close($con); }?>

        <?php } else {
            echo "<div id='phptitle'>
                Please login to see your appointment list.
            </div>";
        }
        ?>
                    </table> 
                </div> <br><br><br><br>
        <img src="media/appointment_banner.jpg" alt="" id="appointment_banner"><br><br><br>

        <a href="makeappointment.php" id="appointment_link">Make appointment now</a><br><br><br>
        
        <?php include_once('header-footer/footer.php') ;?>

</body>
</html>