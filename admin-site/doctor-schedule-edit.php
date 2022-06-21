<?php
include("../conn.php");

$id = intval ($_GET['doc_schedule_id']);

$result = mysqli_query($con,  "SELECT * FROM doctor_schedule WHERE doc_schedule_id = $id");

while($row_doc_sche = mysqli_fetch_array($result))
{
?>
<!DOCTYPE html>
    <head>
    <style>
        tr {
        height:50px;
        }
        #form{
        height:auto;
        width:400px;
        margin:30px auto 30px auto;
        border:2px #73AD21 solid;
        border-radius:20px;
        padding:0px 20px 20px 20px;
        }
        button{
        border-radius:20px;
        border:2px #73AD21 solid;
        width:100px;
        flex:2;
        height:30px;
        cursor: pointer;
        }
        .blank{
        flex:1;
        }
        .cancel,
        .cancel:visited {
            color: black;
        }
        #container{
        display:flex;
        }
    </style>
    </head>
    <body>
        <form action="admin-action-php1/doctor-schedule-update.php" method="post">
            <div id="form">
                <h1>Edit Doctor Schedule Data (ID <?php echo $row_doc_sche['doc_schedule_id'] ?>)</h1>
                <input type="hidden" name="doc_schedule_id" value="<?php echo $row_doc_sche['doc_schedule_id'] ?>">
                <table>
                    <tr>
                        <td><label for="Doctor"><b>Select Doctor</b></label></td>       
                        <td>
                            <select id="Doctor" name="doctor_id">
                            <?php
                                include("../conn.php");
                                $doctor_detail = mysqli_query($con,"SELECT * FROM doctor");
                                while($row_doc = mysqli_fetch_array($doctor_detail)){
                                    $doc_id = $row_doc['doctor_id'];
                                    $doc_name = $row_doc ['doctor_name'];
                            ?>
                                <option <?php if ($doc_id == $row_doc_sche['doctor_id']){?> selected="selected" <?php }?> value='<?php echo $doc_id; ?>'>
                                <?php   echo $doc_id;
                                        echo ".  " .$doc_name;
                                        echo"</option>";
                                }
                                ?>
                        </select></td>
                    </tr>

                    <tr>
                        <td><label for="Sch_date"><b>Schedule Date</b></label></td>
                        <td><input type="date" name="schedule_date" value="<?php echo $row_doc_sche['schedule_date']?>"></td>
                    </tr>

                    <tr>
                        <td><label for="start_time"><b>Start Time</b></label></td>
                        <td><input type="time" name="sche_start_time" value="<?php echo $row_doc_sche['sche_start_time']?>"></td>
                    </tr>

                    <tr>
                        <td><label for="end_time"><b>End Time</b></label></td>
                        <td><input type="time" name="sche_end_time" value="<?php echo $row_doc_sche['sche_end_time']?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="average_consulting_time"><b>Average consulting time </b></label></td>
                        <td><select id="average_consulting_time" name="average_time_slot">
                                <?php $average_time_slot = $row_doc_sche['average_time_slot']; 
                                    $a = explode(":", $average_time_slot);
                                    echo $a[1];
                                
                                    for($min = 5; $min <60; $min = $min + 5)
                                    {
                                ?>
                                
                                <option <?php if ($a[1] == $min){?> selected="selected" <?php }?> value='<?php echo $min; ?>'>
                                <?php   echo $min . " Minutes";
                                        echo"</option>";
                                }
                                ?>
                        </select></td>
                    </tr>
                </table><br>
                
                <div id="container">
                    <button type="submit" name="Edit"> Modify</button>
                    <div class="blank"></div>
                    <button type="button"><a href="../admin-site/admin_doctor_schedule.php" style="text-decoration: none;" class="cancel">Cancel</a></button>
                </div>
            </div>
        </form>

    </body>
<?php
}
mysqli_close($con);
?>