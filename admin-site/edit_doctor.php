<?php include('protected.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctor</title>
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
		"<p id='input_text"+total_text+"_wrapper'><input type='text' class='input_text' id='input_text"+total_text+"' name='qualification"+total_text+"'><input type='button' value='Remove' onclick=remove_qualification('input_text"+total_text+"');></p>";
		  
		}
		function remove_qualification(id)
		{
		  document.getElementById(id+"_wrapper").innerHTML="";
		}
	</script>
	<style>
		.logo {
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
			margin-left: 200px;
			justify-content: space-around;
			font-weight: bold;
			font-family: "Microsoft Yahei";
			padding: 0px 100px;
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
	
	<div class="cssstyle">
	<img class="logo" src="../media/ehclogo.png">
	<p style="text-align:center">Edit Doctor Information</p>
    
	<?php
    include("conn.php");
    $id = $_GET['doctor_id']; 
    $result = mysqli_query($con,"SELECT * FROM doctor WHERE doctor_id=$id");
    while($row = mysqli_fetch_array($result))
    {
    ?>
	<form action="admin-action-php1/doctor-update.php" method="post" ENCTYPE="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="flex-container">
		<div class="flex1">
				Name<br>
				<input type="text" name="name" value="<?php echo $row["doctor_name"] ?>" placeholder="Enter Doctor Name" required><br><br>

				Specialist<br>
				<input type="text" name="specialist" value="<?php echo $row["doctor_specialist"] ?>" placeholder="Enter Docotr Specialist" required><br><br>
			
				<t>Education Level</t><br>
				<input type="text" name="education_level" value="<?php echo $row["doctor_edu_level"] ?>" placeholder="Enter Doctor Education level" required><br><br>
				
				Year of Experiences<br>
				<input type="number" name="year_of_experience" value="<?php echo $row["doctor_experience"]?>" placeholder="Enter a number" required><br><br>
			
			
				Language<br>
				<select name="language[]" class="selectpicker"  multiple required>
					<?php 
					$doctor_language = "SELECT * FROM doctor_language WHERE doctor_id = '$id'";
					$doc_lang_result = mysqli_query($con, $doctor_language);
					$doc_lang = array();
					while ($e = mysqli_fetch_array($doc_lang_result)) {
						array_push($doc_lang, ucfirst($e['doctor_language']));
					}
					
					$all_lang = array("English", "Chinese", "BM", "Tamil", "Others");
					foreach ($all_lang as $lang) {
						if (in_array($lang, $doc_lang)) {
							echo '<option value="'.$lang.'" selected>';
							echo $lang.'</option>';
						} else {
							echo '<option value="'.$lang.'" >';
							echo $lang.'</option>';
						}
					}
					?>
				</select><br><br>
			
				About Doctor<br>
				<textarea type="text" name="about_doctor" placeholder="Doctor Descriptions..." required><?php echo $row["doctor_about"]?></textarea><br><br>
			</div>

			<div class="flex2">
				<div id="wrapper">
					<div id="field_div">
						Doctor Qualification<input type="button" value="Add Qualification" onclick="add_qualification();">
						<?php
						$selectqualification = mysqli_query($con, "SELECT * FROM doctor_qualification WHERE doctor_id=".$id);
						$i = 1;
						while ($qualification=mysqli_fetch_array($selectqualification)) {
							echo '<p id="input_text'.$i.'_wrapper"><input style="width:300px; height:30px;" type="text" class="input_text" value="'.$qualification['doctor_qualification'].'" id="input_text'.$i.'" name="qualification'.$i.'"><input style="width:120px; height:45px;" type="button" value="Remove" onclick="remove_qualification(\'input_text'.$i.'\');"></p>';
							$i++;
						}
						?>
					</div>
				</div>
				<input type="hidden" id="total_qualification" name="total_qualification" value="">

				<div id="doc_qualification"></div>
			
				Upload Image<br>
					<input type="file" name="picture" value=""><br><br>
				</div>
			</div>
					</div>
		
	</form></div><br><br>

	<div style="text-align: center">
		<button class="button" type="add_doctor" name="add_doctor_btn">Update</button>
		<button onclick="document.location='doctor_list.php'" class="button" type="cancel" name="cancel">Cancel</button><br><br>
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
	<?php
	}
	mysqli_close($con);
	?>
</body>
</html>