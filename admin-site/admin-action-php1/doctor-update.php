<?php
	include("../conn.php");
	if (isset($_POST['add_doctor_btn']))
	{
		$id = $_POST['id'];		
        $doc_specialist = $_POST['specialist'];
		$doc_edu = $_POST['education_level'];
		$doc_exp = $_POST['year_of_experience'];
        $doc_about = $_POST['about_doctor'];
        $total_qualification = $_POST['total_qualification'];
		for($i=1;$i<=$total_qualification;$i++){
			$doc_qualification[] = $_POST['qualification'.$i];  
		}

        $image = $_FILES['picture']['tmp_name'];
        $img = file_get_contents($image);

		$sql= "UPDATE doctor SET 
        doctor_name='$_POST[name]',
        doctor_specialist='$_POST[specialist]',
        doctor_edu_level='$_POST[education_level]',
        doctor_experience='$_POST[year_of_experience]',
        doctor_about='$_POST[about_doctor]',
        doctor_portrait= ?
        WHERE doctor_id=$id";

        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,"s",$img);
        mysqli_stmt_execute($stmt);

		//delete all qualification and language
		$delete_all_qualification = mysqli_query($con,"DELETE FROM doctor_qualification WHERE doctor_id=$id");
		$delete_all_language = mysqli_query($con,"DELETE FROM doctor_language WHERE doctor_id=$id");
		
        foreach ($_POST['language'] as $value) {
            $sql = "INSERT INTO doctor_language (doctor_id, doctor_language) VALUES ('$id', '$value')";
            if (!mysqli_query($con, $sql)){
                die('Error: ' . mysqli_error($con));
            }
        }
        
        foreach ($doc_qualification as $value) {
            $insertqualification = "INSERT INTO doctor_qualification (doctor_id, doctor_qualification) VALUES ('$id', '$value')";
            if (!mysqli_query($con,$insertqualification)){
                die('Error: ' . mysqli_error($con));
            }
        }
        echo '<script>alert("Record Updated!"); window.location.href= "../doctor_list.php"; </script>';
    }
?>