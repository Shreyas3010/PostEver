<?php
$postID=$_POST['postID'];

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"instagram")or
 die("Could not select db: " . mysql_error());
if(isset($_POST['edit']))
{
	//echo "edit";
	$caption=$_POST['caption'];
	$d=date("Y-m-d");
	date_default_timezone_set("Asia/Kolkata");
	$t=date("H:i:sa");
	$qry = "UPDATE posts SET caption='$caption', time ='$t', date ='$d' WHERE postID=$postID;";
 	if(mysqli_query($con,$qry))
 	{
 		echo '<script>alert("Successfully edited !!");location="userinfo.php";</script>';
 	}

}
else if(isset($_POST['delete']))
{
	//echo "delete";
	if(mysqli_query($con,"DELETE FROM posts WHERE postID=$postID"))
	{
		echo '<script>alert("Successfully deleted !!");location="userinfo.php";</script>';
	}
}
?>