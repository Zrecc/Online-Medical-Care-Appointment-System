<?php include 'protected.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        h1 {
            background-color: blue;
            color: aliceblue;
            margin-top: 0px;
            font-size: 36px;
            font-family: 'Times New Roman', Times, serif;
        }

        table,
        th,
        td {
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
        }

        th {
            height: 70px;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="headerspace"><?php include_once('adminheader.php');?></div>
    <div id="main-content">
    <div>
        <h1><br>Appointment List</h1>
    </div>

    <table>
        <tr>
            <th>Appointment ID</th>
            <th>User Email</th>
            <th>Doctor Schedule ID</th>
            <th>Appointment Time</th>
            <th>Appointment Status</th>
            <th>User Reason</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($con, "Select * FROM appointment");

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";

            echo "<td>";
            echo $row['appointment_id'];
            echo "</td>";

            echo "<td>";
            echo $row['user_email'];
            echo "</td>";

            echo "<td>";
            echo $row['doc_schedule_id'];
            echo "</td>";

            echo "<td>";
            echo $row['appointment_time'];
            echo "</td>";

            echo "<td>";
            echo $row['appointment_status'];
            echo "</td>";

            echo "<td>";
            echo $row['user_reason'];
            echo "</td>";

            echo "<td><a href=\"../admin-site/admin-action-php1/appointment-delete.php?id=";
            echo $row['appointment_id'];
            echo "\" onClick=\"return confirm('Delete No";
            echo $row['appointment_id'];
            echo " appointment?');\">Delete</a></td></tr>";
        }
        mysqli_close($con);
        ?>
    </table>
    </div>
</body>

</html>