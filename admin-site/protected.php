<?php
session_start();
if(!isset ($_SESSION['mySession'])){
	
header("Location: Admin(login).php");
session_write_close();
exit();
}
?>