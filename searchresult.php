<?php
session_start();
$username=$_SESSION["USERNAME"];
$ans=$_POST['sresult'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"instagram")or
	mysqli_query($con,"CREATE DATABASE instagram");
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.s1{
	margin-left:140px;
	font-size:25px;
	
}
.s2{
	margin-left:140px;
	font-size:20px;
	
}
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
.avatar1{
    width:640px;
    height: 330px;
}

.a{
	margin-left:550px;
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

.a1{
	margin-left:550px;
	font-size:35px;
	font-weight: bold;
	}
.btn{
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 30px;
	width:200px;
    cursor: pointer;
	margin-top:30px;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}

.dnt{
	float:right;
	margin-top:50px;
	margin-right:10px;
}


</style>
<body>
<?php
if($_POST['whichone']=='2')
{
	$result=mysqli_query($con,"SELECT * FROM user WHERE name='$ans'");
		$i=mysqli_num_rows($result);

    if($i)
	{
				while($n=mysqli_fetch_array($result))
				{
				?>
				<br>
				<br>
				<center>
				<button class="btt1">Follower <?php echo $n['follower']; ?></button>
				<button class="btt1" style="margin-left:100px;">Following <?php echo $n['following'];?></button>
				</center>
				<br>
				<br>
				<?php
				
				echo "<div class='imgcontainer'><img src='data:image/png;base64,".base64_encode($n['imagetmp'])."' alt='Profile Picture'   class='avatar' >
					</div>";	
			  ?>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <form action="searchresultuser.php" method="POST">
			  	<button type="submit" style="background-color: transparent;border: none;cursor:pointer;">
			  		<input type="hidden" name="username" value=<?php echo $n['username']; ?>>
			<p><font class="a">Name :</font><font class="b">  <?php echo $n['name']; ?></font></p>
			<p><font class="a">Email :</font><font class="b">  <?php echo $n['email']; ?></font></p>
				</button></form>
<hr style="background-color:black;margin-top:50px;margin-left:20px;" size="10">		

<?php		
		}	
	}
}else if($_POST['whichone']=='1')
{
			$hash='#';
	$ans=$hash.$ans;
	$analytics2=mysqli_query($con,"SELECT * FROM analyticsofhashtag WHERE hashtag='$ans'");
	$ana2=mysqli_num_rows($analytics2);
	//echo $ana1;

	if($ana2)
	{
		$analytics4=mysqli_fetch_array($analytics2);
		$count1=$analytics4['count'];
		$count1++;
		//echo $count1;
		mysqli_query($con,"UPDATE analyticsofhashtag SET count='$count1' WHERE hashtag='$ans'");
	}
	else
	{

		mysqli_query($con,"INSERT INTO analyticsofhashtag(hashtag,count) VALUES('$ans','1')");

	}
	$r9=mysqli_query($con,"SELECT * FROM posts WHERE 1");
	while($n9=mysqli_fetch_array($r9))
	{
		$postusername=$n9['username'];
		$followingcheck=mysqli_query($con,"SELECT * FROM followtable WHERE follower='$username' AND following='$postusername'");
		$followingcheck1=mysqli_num_rows($followingcheck);
		if($followingcheck1)
		{
			$caption=$n9['caption'];
			if (strpos($caption, $ans))
			{
?>
				<br>
				<br>
				<font style="margin-left:30px;margin-top:50px;font-size:50px;background-color:black;color:white;" ></abbr>  
					<?php echo $n9["username"]; ?></abbr></font>
				<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n9["date"]; ?> <sup><?php echo $n9["time"]; ?>
					
				</sup></font></div>
<?php
				echo "<div>
				<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n9["imagetmp"])."' alt='Profile Picture' class='avatar1' >
				</div>";	
?>
				<br>
				<br>
				<br>
				<div style="margin-left:5%;width: 90%;><p> <font class="a">-</font><font size="6"  >  
					<?php echo $n9["caption"]; ?></font></p></div>
				<hr style="background-color:black;margin-top:50px;margin-left:20px;height:3px;">
<?php
			}
		}		 
	}

}

?>
</body>
</html>