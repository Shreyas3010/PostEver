<?php
session_start();
$following=$_POST['following'];
$cnt=$_POST['cnt'];
//echo $cnt;
$cnt++;
$follower=$_SESSION['USERNAME'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"instagram")or
        mysqli_query($con,"CREATE DATABASE instagram");
		mysqli_query($con,"INSERT INTO followtable (follower,following) VALUES('$follower','$following')");
		mysqli_query($con,"UPDATE user SET follower='$cnt' WHERE username='$following'");
		
		$n=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user WHERE username='$follower'"));
		$followingcnt=$n['following'];
		$followingcnt++;
		mysqli_query($con,"UPDATE user SET following=$followingcnt WHERE username='$follower'");

		echo '<script>alert("Followed!");location="userlist.php";</script>'
?>