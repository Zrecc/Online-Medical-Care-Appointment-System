<?php

if (isset($_POST['add_doctor_btn'])) {
    include("../conn.php");
	$image = $_FILES['picture']['tmp_name'];
    $img = file_get_contents($image);

	$sql="INSERT INTO doctor (doctor_name, doctor_specialist, doctor_edu_level, doctor_experience, doctor_about, doctor_portrait)
	VALUES
	('$_POST[name]','$_POST[specialist]','$_POST[education_level]','$_POST[year_of_experience]','$_POST[about_doctor]', ?)";

	$stmt = mysqli_prepare($con,$sql);
		mysqli_stmt_bind_param($stmt,"s",$img);
		mysqli_stmt_execute($stmt);
		$check = mysqli_stmt_affected_rows($stmt);
	}
$sql="INSERT INTO doctor_language (doctor_language)
VALUES
('$_POST[language]')";

$lang_array = array($_POST['qualification_1'], $_POST['qualification_2'], $_POST['qualification_3'], $_POST['qualification_4'], $_POST['qualification_5']);
foreach ($lang_array as $element) {
    if ($element != '') {
        include('../conn.php');
        $sql = "INSERT INTO doctor_qualification (doctor_qualification) VALUES '$element'";
        echo $sql;
		mysqli_query($con, $sql);
    }
}

if (!mysqli_query($con,$sql)) 

{
	die('Error: ' . mysqli_error($con));
}

else 
{
echo '<script>alert("1 record added!");
window.location.href= "doctor_list.php";
</script>';
}

mysqli_close($con);
?>