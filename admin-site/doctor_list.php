<?php
include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>

		<title>Doctor Information List</title>
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

			#doctor {
			border-collapse: collapse;
			width: 100%;
			}
			#doctor td, #doctor th {
			border: 1px solid #ddd;
			padding: 8px;
			}
			#doctor tr{
				background-color: #f2f2f2;
			}
			
			
			#doctor th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #48b1bd;
			color: white;
			}
			
			.box {
				display: flex;
				justify-content: space-between;
				margin: 20px;
			}
			
			button{
				padding: 10px 20px;
			}
			
			a{
				text-decoration: none;
				display: block; 
				width: 100px;
				text-align: center;
				line-height: 40px;
				height: 40px; 
				color: white;
				border-radius: 7px;
			}
			
			a:visited{
				color: white;
			}
		</style>
</head>

<body>
	<div id="headerspace"><?php include_once('adminheader.php');?></div>
    <div id="main-content">
	<form method="post"> 
		<div class="box">
			<a style='background-color:#808080; cursor: pointer;' name="addnewbtn" type="button" href='add_doctor.php'>Add New</a>
			<div>
				Search <input type="text" name="search_key">
				<button name="searchbtn" type="submit">Search</button>
			</div>
		</div>

		<?php 
			include("conn.php");
			$result=mysqli_query($con,"SELECT* FROM doctor");
		?>

		<?php
		$search_key = ""; 
		if(isset($_POST['searchbtn']))
		{ 
			$search_key = $_POST['search_key']; 
		}
		$result = mysqli_query($con,"SELECT * FROM doctor WHERE doctor_name LIKE '%$search_key%'");
		?>


		<table id="doctor">
			<tr>
				<th>Doctor ID</th>
				<th>Doctor Name</th>
				<th>Specialist</th>
				<th>Education Level</th>
				<th>Year of Experiences</th>
				<th>View More</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php 
			while($row = mysqli_fetch_array($result))
			{
			echo"<tr bgcolor=\"#99FF66\">";

			echo"<td>";
			echo $row['doctor_id'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_name'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_specialist']; 
			echo"</td>";

			echo"<td>";
			echo $row['doctor_edu_level'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_experience'];
			echo"</td>";


			echo"<td ><a style='background-color:#89CFF0;' class='button' href=\"view_doctor.php?doctor_id="; 
			echo $row['doctor_id'];
			echo"\">View More</a></td>";

			echo"<td><a style='background-color:#FFA500;' class='button' href=\"edit_doctor.php?doctor_id="; 
			echo $row['doctor_id'];
			echo"\">Edit</a></td>";

			echo"<td><a style='background-color:#FF0000;' class='button' href=\"admin-action-php1/doctor-delete.php?doctor_id="; 
			echo $row['doctor_id']; 
			echo"\" onClick=\"return confirm('Delete ";
			echo $row['doctor_name'];echo" details?');\">Delete</a></td></tr>";
			}
			mysqli_close($con);
			?>
		</table>
	</form>
</body>
</html>