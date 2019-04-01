<?php
session_start();
?>
<html>
<style>
.btt1 {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	font-variant: small-caps;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.avatar {
    width:600px;
    border-radius:50%;

}
.a1{
	margin-left:550px;
	font-size:35px;
	font-weight: bold;
	}
.a{
	margin-left:350px;
	font-size:25px;
	font-weight: bold;
	}
.b{
	font-size:25px;
	
}

.c{
	font-size:25px;
	margin-left:660px;
}
</style>
<body>

<?php 
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"instagram")or
 die("Could not select db: " . mysql_error());
	$username=$_SESSION["USERNAME"];
	
	$result=mysqli_query($con,"SELECT * FROM user ");
	while($n=mysqli_fetch_array($result))
	{
		if($n["username"]==$username)
		{
			
		}
		else
		{
		   
		   ?>
	<br>
	<br>
<font style="margin:50px 00px 00px 50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["username"]; ?></font>
<br>
	<center><button class="btt1">Follower <?php echo $n['follower']; ?></button>
	<button class="btt1" style="margin-left:100px;">Following <?php echo $n['following'];?></button>
</center>
<br>
	<?php 
		
		$tmp=$n['username'];
		$q1="SELECT * FROM followtable WHERE follower='$username' AND following='$tmp'";
		//echo $q1;
		$r2=mysqli_query($con,$q1);
		$i2=mysqli_num_rows($r2);
	if($i2)
	{
		?>
		<form action="unfollow.php"  method="POST"><input type="hidden" name="follower" value=<?php echo $username;?> >
		<input type="hidden" name="following" value=<?php echo $n['username'];?> >
		<input type="hidden" name="cnt" value=<?php echo $n['follower'];?> >
		<center><button  class="btt1">unFollow</button></form></center>
		<?php
		
	}
	else
	{
		?>
		<form action="follow.php"  method="POST"><input type="hidden" name="follower" value=<?php echo $username;?> >
		<input type="hidden" name="following" value=<?php echo $n['username'];?> >
		<input type="hidden" name="cnt" value=<?php echo $n['follower'];?> >
		<center><button class="btt1">Follow</button></form></center>
		<?php
	}
	//echo($tmp);
			echo "<div class='imgcontainer'>
		<img  style='margin-left:40px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' height=600 alt='Profile Picture' class='avatar' >
		</div>";	
	
	
  ?>
  <br>
  <br>
  <br>
<p><font class="a">Name :</font><font class="b">  <?php echo $n["name"]; ?></font></p>
<p><font class="a">Email :</font><font class="b">  <?php echo $n["email"]; ?></font></p>
<hr style="background-color:black;margin-top:50px;margin-left:20px;" size="10">
	<?php
		   
		   
		}
	}
?>

</body>
</html>