<?php
	if (isset($_POST['add_doctor']))
	{
		include("../conn.php");
        $total_qualification = $_POST['total_qualification'];
		for($i=1;$i<=$total_qualification;$i++){
			$doc_qualification[] = $_POST['qualification'.$i];  
		}

        $image = $_FILES['picture']['tmp_name'];
        $img = file_get_contents($image);

		$sql= "INSERT INTO doctor (doctor_name, doctor_specialist, doctor_edu_level, doctor_experience, doctor_about, doctor_portrait)
        VALUES
        ('$_POST[name]','$_POST[specialist]','$_POST[education_level]','$_POST[year_of_experience]','$_POST[about_doctor]', ?)";
        
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,"s",$img);
        mysqli_stmt_execute($stmt);

            $last_id = $con->insert_id;

            foreach ($_POST['language'] as $value) {
				$sql = "INSERT INTO doctor_language (doctor_id, doctor_language) VALUES ('$last_id', '$value')";
				if (!mysqli_query($con, $sql)){
					die('Error: ' . mysqli_error($con));
				}
			}
			
			foreach ($doc_qualification as $value) {
				$insertqualification = "INSERT INTO doctor_qualification (doctor_id, doctor_qualification) VALUES ($last_id, '$value')";
				if (!mysqli_query($con,$insertqualification)){
					die('Error: ' . mysqli_error($con));
				}
			
			echo '<script>alert("1 record added!"); window.location.href= "../add_doctor.php"; </script>';
			
		}
		
	}
?>
