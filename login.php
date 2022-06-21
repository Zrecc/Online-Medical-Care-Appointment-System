<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <style>
            * {
                font-family: "Microsoft yahei";
                margin: 0;
            }
            div#headerspace {
                height: 130px;
            }
            /* header */
           
            .header2 {
                background-color: white;
                border-bottom: #96968F;
                border-bottom-style: solid;
                border-bottom-width: 1px;
                height: 70px;
            }
            #ehclogo, 
            .headernav {
                display: inline-block;
                height: 70px;
            }
            #ehclogo {
                position: relative; 
                width: 110px;
                left: 8%;
            }
            .headernav {
                position: absolute;
                right: 8%;
                line-height: 70px;
                
            }
            .headernav>a {
                padding: 10px 20px;
                color:#275A84;
                border:2px solid #73AD21;
                border-radius:20px;
                height:30px;
                text-align:center;
                margin-bottom:10px;
                text-decoration:none;

            }
            .headernav>a:hover {
                background:lightgrey;
                border:2px solid #3CB3C0;
            }
            #fixedheader {
                position: fixed;
                width: 100%;
            }
            /* login and sign up */
            .container{
                height:auto;
                width:600px;
                margin:30px auto 30px auto;
                border:2px #73AD21 solid;
                display:flex;
                border-radius:20px;
            }
            .Login-col{
                padding:20px;
                line-height:1.5;
                text-align: justify;
            }
            .center-line {
                border-right:1px solid #73AD21
            }
            .Signup-col{
                padding:20px;
                line-height:1.5;
                text-align:center;
            }
            .input_box{
                width:280px; 
                border-radius:5px;
                border: 2px solid #73AD21;
                height:30px;
            }
            .input_box:hover{
                width:280px; 
                border-radius:5px;
                border: 2px solid #3CB3C0;
                height:30px;
            }
            .box{
            border: 2px solid #73AD21;
            border-radius:15px;
            width:150px;
            display:block;
            margin:0px auto;
            text-align:center;
            padding:5px;
            height:24px;
            }
            .box>a{
                text-decoration:none;
                color:black;
                text-align:center;
                font-size: 18px;
            }
            .box:hover{
            border: 2px solid #3CB3C0;
            }
            .message{
                color:red;
            }
        </style>

    </head>
    <body>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital@1&display=swap" rel="stylesheet">
        <!-- header -->
        <div id="headerspace">
            <div id="fixedheader">
                <div class="header2">
                    <a href="index.php"><img id="ehclogo" src="media/ehclogo.png"></a>
                    <nav class="headernav">
                        <a href="admin-site/Admin(login).php">Login as Admin</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- login -->
        <!-- php -->
        <?php
        if(isset($_POST["login"])) {
            include('conn.php');
            $sql = "SELECT * FROM user WHERE user_email = '" . $_POST["email"] . "' AND user_password = '" . $_POST["password"] . "'";
            if ($result=mysqli_query($con,$sql)) {
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($result);
            }
                if($rowcount==1) {
                    session_start();
                    $_SESSION["user"] = $_POST['email'];
                    if(!empty($_POST["remember"])) {
                    // 7 days; 24 hours; 60 mins; 60 secs                        
                        setcookie ("user_email",$_POST["email"], time() + (86400 * 30), "/"); 
                    } else{
                        unset($_COOKIE['user_email']); 
                        setcookie('user_email', NULL , -1, '/'); 
                    }
                    header('location: index.php');
                } 
                else {
                    $message = "Invalid Login, Please try again";
                }
        }
        ?>
        <!-- interface -->
        <form action="login.php" method="post">     
            <div class="container" >
                <table>
                    <tr>
                        <td class="center-line">
                            <div class="Login-col">
                                <h2>Login</h2><br>
                                <div style="font-family: 'Cabin', sans-serif;color: #999999; font-size:20px;">Welcome back</div>
                        </td>
                        <td>
                            <div class="Signup-col">
                                <h3>Does not have an account?</h3><br>
                                <p>Sign up now</p>
                            </div>
                        </td>
                    </tr>    

                    <tr>
                        <td class="center-line">
                            <div class="Login-col">
                                <br>Email<br><input class="input_box" type="email" name="email" required value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>">
                                <br><br>Password<br><input class="input_box" type="password" name="password" required value="">
                                <br><br><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_email"])) { ?> checked <?php } ?> /> Remember
                            </div>
                        </td>

                        <td>
                            <div class="Signup-col">
                              <br>
                              <br>  
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="center-line">
                            <div class="Login-col">
                                <br><br><div class="box"><input type="submit" name="login" value="Login" style="border:0px; color:black; text-align:center; font-size: 18px; "></div>
                                <br><br><stricpt><div style="color:red;"><?php if(isset($message)) { echo $message; } ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="Signup-col">
                                <div class="box"><a href="signup.php" >Sign Up</a></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>