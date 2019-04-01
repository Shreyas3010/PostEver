<?php

session_start();
$username=$_SESSION['USERNAME'];
$caption=$_POST['caption'];
$imagename=$_FILES['postimage']['name'];
$d=date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$t=date("H:i:sa");
$imagetmp=addslashes(file_get_contents($_FILES['postimage']['tmp_name']));
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"instagram")or
        mysqli_query($con,"CREATE DATABASE instagram");

	   if($caption!=NULL)
	   {
$qry = "INSERT INTO `posts`(username,caption,date,time,imagetmp,imagename) VALUES('$username','$caption','$d','$t','$imagetmp','$imagename')";
#echo $qry;
if(mysqli_query($con,$qry))
{
	echo '<script>alert("Successfully posted!!!");location="userinfo.php";</script>';
}
else
{
   	echo '<script>alert("Error !! Sorry please write it again.");location="usertopost.php";</script>';
}	
}
?>
