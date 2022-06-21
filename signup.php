<?php
include("conn.php");
if (isset($_POST['register_btn'])) {
    $email = $_POST['email'];
	$check = "SELECT * from user where user_email = '$email'";
	$result = mysqli_query($con,$check);
	$count = mysqli_num_rows($result);
	
	if ($count > 0){
		echo "<script>";
		echo "alert('Your entered email is exist!!! Please re-enter again.')";
		echo "</script>";
	}
	else{
		if ($_POST['password'] == $_POST['cfm_password']){
		$sql="INSERT INTO user(user_email, user_password, user_first_name, user_last_name, user_gender, user_dob, user_ic_number, 
	user_address_line1, user_address_line2, user_postal_code, user_city, user_state, user_pnumber)
	VALUES
	('$_POST[email]','$_POST[password]','$_POST[f_name]','$_POST[l_name]','$_POST[gender]','$_POST[dob]','$_POST[ic]','$_POST[address1]',
	'$_POST[address2]','$_POST[postcode]','$_POST[city]','$_POST[state]','$_POST[phone_number]')";
		
			
			if (!mysqli_query($con,$sql)) 

					{
				die('Error: ' . mysqli_error($con));
					}
			else 
				{
				echo '<script>alert("1 record added!");
				window.location.href = "login.php";
				</script>';
				}
		
		}
		else {
			echo "<script>alert('Password not match!!! Please re-enter again.');</script>";
		}
}
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	
	<style>
	body{
		background-color: #eeeeee;
	}
	.cssstyle{
		margin: 0px auto;
		border: solid #7393B3;
		border-radius: 20px;
		height: auto;
		width: 500px;
		background-color: #FFFFFF;
		/*color: #FFFFFF;*/
	}
	
	img{
		margin: 0px auto;
		display: block;
		width: 150px;
		height: 100px;
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
	
	table {
        margin: 0px auto;
    }
	
	input[type=text],[type=password], [type=email], [type=tel], [type=date]{
		margin: 5px 5px 5px 0px;
		width: 200px;
		height: 25px;
	}

	a {
		color: dodgerblue;
		text-decoration: none;
	}
	
	div#headerspace {
			height: 130px;
		}
	</style>
</head>

<body>
	<div id="headerspace"><?php include_once("header-footer/header.php");?></div><br><br>
	<div class="cssstyle"><img src="media/ehclogo.png">
	<p style="text-align:center; ">The Elderly Home's Club Signup Form</p>
	<form action="signup.php" method="post" ENCTYPE="multipart/form-data">
		<table>		

			<tr>
				<td>Email</td> 
				<td><input type="email" name="email" required></td>
			</tr>
			
			<tr>
				<td>Password</td> 
				<td><input type="password" name="password" required></td>
			</tr>
			
			<tr>
				<td>Confirm Password</td> 
				<td><input type="password" name="cfm_password" required></td>
			</tr>
			
			<tr>
				<td>First name</td> 
				<td><input type="text" name="f_name" required></td>
			</tr>
			
			<tr>
				<td>Last name</td> 
				<td><input type="text" name="l_name" required></td>
			</tr>
			
			<tr>
				<td>Gender</td>
				<td class="gender">
					<input type="radio" name="gender" value="male" required> Male &nbsp;     
					<input type="radio" name="gender" value="female" required> Female    &nbsp;  
					<input type="radio" name="gender" value="others" required> Others   &nbsp;   
				</td><br><br>
			</tr>
			
			<tr>
				<td>Date of birth</td> 
				<td><input type="date" name="dob" required></td>
			</tr>
			
			<tr>
				<td>IC number</td> 
				<td><input type="text" name="ic" required></td>
			</tr>
			
			<tr>
				<td>Phone number</td> 
				<td><input type="tel" name="phone_number" required></td>
			</tr>
			
			<tr>
				<td>Address line 1</td> 
				<td><textarea type="text" name="address1" required></textarea></td>
			</tr>
			
			<tr>
				<td>Address line 2</td> 
				<td><textarea type="text" name="address2" required></textarea></td>
			</tr>
			
			<tr>
				<td>Postal code</td> 
				<td><input type="number" name="postcode" required></td>
			</tr>
			
			<tr>
				<td>City</td> 
				<td><input type="text" name="city" required></td>
			</tr>
			
			<tr>
				<td>State</td>
				<td><input type="text" name="state" required></td>
			</tr>
		</table>
			
			<div align= "center">	
			<div style="width: 80%;">		
				<input type="checkbox" name="checkbox" value="check" id="agree"> I have read and agree to the <a href>Terms and Conditions</a> and <a href>Privacy Policy</a>.</td><br><br>
				<button class="button" type="register" name="register_btn" id="btn">Register Now</button>
				<button class="button" type="button" name="cancel" onclick="window.location.href= 'index.php'">Cancel</button>
				</div></div>
	</form></div><br><br>
<div><?php include_once("header-footer/footer.php");?></div>
</body>
</html>