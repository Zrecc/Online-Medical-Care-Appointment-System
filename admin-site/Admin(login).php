<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = mysqli_real_escape_string($con,$_POST['uname']); 
	$password = mysqli_real_escape_string($con,$_POST['psw']); 

	$check = "SELECT * FROM admin WHERE admin_username='$username' and admin_password='$password'";
	if ($result = mysqli_query($con,$check)){
	  $rowcount = mysqli_num_rows($result);	  
	}
	
		if($rowcount==1)  {
            session_start();
			$_SESSION['mySession'] = $username;
			if(!isset ($_POST['remember'])) {
			setcookie("admin_login", $_POST['uname'], time() + (86400 * 30), "/");
			}
			else{
				unset($_COOKIE['admin_login']);
				setcookie('member_login', null, -1, '/');
			}
			header("location: doctor_list.php");
		} 
		
	else  {
		echo "<script>alert('Your Login Name or Password is invalid. Please re-login');</script>";
	}
	mysqli_close($con);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
    <style>
        body {
            font-family: "Timen News Roman";
        }

        .box {
            margin-left: 35%;
        }

        form {
            border: 3px solid #f1f1f1;
            width: 45%;
            height: 750px;
            border-radius: 25px;
        }

        .topic {
            font-size: 30px;
            font-weight: 900;
            text-align: center;
        }

        section {
            font-size: 18px;
            font-weight: 400;
            font-style: oblique;
            text-align: center;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 25px;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 25px;
        }

        button:hover {
            opacity: 0.8;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.logo {
            width: 50%;
            border-radius: 20%;
        }

        #loginbtn {
            width: 250px;
            margin-left: 20%;
        }

        .container {
            padding: 16px;
            border-radius: 20%;
        }

        .input-container {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="box">
	
        <br>
        <form action="Admin(login).php" method="post">
            <div class="imgcontainer">
                <img src="../media/ehclogo.png" alt="Logo" class="logo">
            </div>

            <div class="topic">
                <p>Admin Login</p>
                <section>Welcome back</section>
            </div>

            <br><br>

            <div class="container">
                <i class="fa fa-user icon"></i>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" value="<?php if(isset($_COOKIE["admin_login"])){
				echo $_COOKIE["admin_login"]; }?>" required>

                <i class="fa fa-key icon"></i>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
				
				<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["admin_login"])) { ?> checked <?php } ?> /> Remember
                <br><br><br>
				
                <div id="loginbtn">
                    <button type="submit" name="login" value="login">Login</button>
                    <button style="background-color:#c0c0c0; color:black;" class="button" name="cancel" onclick="document.location='../index.php'">Cancel</button><br><br>
                </div>
                
            </div>
        </form>
        <br><br>
    </div>
</body>

</html>