<?php
	include('protected.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor Info</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/select2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="javascript/bootstrap.min.js"></script>
	<script>
		function add_qualification()
		{
		  var total_text=document.getElementsByClassName("input_text");
		  total_text=total_text.length+1;
		  document.getElementById("total_qualification").value=total_text;
		  document.getElementById("field_div").innerHTML=document.getElementById("field_div").innerHTML+
		"<p id='input_text"+total_text+"_wrapper'><input style='width:300px; height:30px;' type='text' class='input_text' id='input_text"+total_text+"' name='qualification"+total_text+"'><br><input style='width:120px; height:45px;' type='button' value='Remove' onclick=remove_qualification('input_text"+total_text+"');></p>";
		  
		}
		function remove_qualification(id)
		{
		  document.getElementById(id+"_wrapper").innerHTML="";
		}
	</script>
	<style>
		.logo{
			margin: 0 48%;
			display: block;
			width: 150px;
			height: 100px;
		}
		
        p{
			margin-left: 100px;
        	 text-align: center; 
             font-weight: solid;
             font-size: 25px;
             font-weight: bold;
        }

		.button{
		padding: 10px 12px;
		margin: 8px 0;
		border: 1px solid;
		border-radius: 5px;
		cursor: pointer;
		width: 150px;
		opacity: 0.9;
		}

		.flex-container{
			display: flex;
			margin-left: 100px;
			justify-content: space-around;
			font-weight: bold;
			font-family: "Microsoft Yahei";
			padding: 0 150px;
		}

		input[type=text], [type=number]{
			border-radius: 5px;
            width: 350px;
            height: 5%;
		}
		
		textarea {
			width: 100%;
			height: 150px;
		}

		#doc_qualification {
			height: 20px;
		}

		.selectpicker{
			width: 350px;
		}
    </style>
	
</head>

<body>
	<div id="headerspace"><?php include_once('adminheader.php');?></div>
    <div id="main-content">
	<div class="cssstyle"><img class="logo" src="../media/ehclogo.png">
	<p style="text-align:center">Add Doctor Information</p>
	<form action="admin-action-php1/doctor-insert.php" method="post" ENCTYPE="multipart/form-data">
		<div class="flex-container">
			<div class="flex1">
				Name<br>
				<input type="text" name="name" placeholder="Enter Doctor Name" required><br><br>

				Specialist<br>
				<input type="text" name="specialist" placeholder="Enter Docotr Specialist" required><br><br>

				Education Level<br>
				<input type="text" name="education_level" placeholder="Enter Doctor Education level" required><br><br>
			
				Year of Experiences<br>
				<input type="number" name="year_of_experience" placeholder="Enter a number" required><br><br>
			
				Language<br>
				<select name="language[]" class="selectpicker"  multiple required>
					<option value="English">English</option>
					<option value="Chinese">Chinese</option>
					<option value="BM">Bahasa Melayu</option>
					<option value="Tamil">Tamil</option>
					<option value="Others">Others</option>
				</select><br><br>

				About Doctor<br>
				<textarea type="text" name="about_doctor" placeholder="Doctor Descriptions..." required></textarea><br><br>
			</div>

			<div class="flex2">
				<div id="wrapper">
					<div id="field_div">
						Employee Qualification<input style='height:30px;'type="button" value="Add Qualification" onclick="add_qualification();">
					</div>
				</div>
				<input type="hidden" id="total_qualification" name="total_qualification" value="">
				
				<div id="doc_qualification"></div>
			
				Upload Image<br>
				<input type="file" name="picture"><br><br>
			</div>
		</div>
		
        <br>
        <div style="text-align: center; margin-left: 12%;">
        <button class="button"  name="add_doctor" value="add_doctor_btn">Add Doctor</button>
		<button onclick="document.location='doctor_list.php'" class="button" type="cancel" name="cancel">Cancel</button><br><br>
      	</div>
	</form>

	</div>
	<script>
		$(document).ready(function(){
			$(".selectpicker").select2({
				placeholder: "Select language",
				tags: true,
				tokenSeperators: ['/',',',','," "]
		});
		})
	</script>
	</div>
</body>
</html>