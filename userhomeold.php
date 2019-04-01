<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.avatar {
    width:640px;
    height: 330px;   
}
.dnt{
	float:right;
	margin-top:50px;
	margin-right:10px;
}

.s1{
	margin-left:140px;
	font-size:25px;
	
}
.s2{
	margin-left:140px;
	font-size:20px;
	
}
.b{

  width: 13%;
  padding: 10px;
  font-family: "Roboto";  
  outline-color:black;  
  outline-style:groove;
  margin-left:140px;
  
}
.b1{

  width: 35%;
  padding: 10px;
  font-family: "Roboto";  
  outline-color:black;  
  outline-style:groove;
  
}
.button3 {
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}
.button3:hover {
    background-color: #f44336;
    color:white;
	border: 2px solid white;
}
</style>
<body>

<?php 
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"instagram")or
 die("Could not select db: " . mysql_error());
	session_start();
	$username=$_SESSION["USERNAME"];
	$rmain=mysqli_query($con,"SELECT * FROM followtable WHERE follower='$username'");
	$followinglist=array();
	while($nmain=mysqli_fetch_array($rmain))
	{
		array_push($followinglist,$nmain['following']);
	}
	$result=mysqli_query($con,"SELECT * FROM posts ORDER BY postID DESC ");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:40px;font-size:60px;background-color:black;color:white;">Posts</h1></center>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
		$flag=0;
		foreach ($followinglist as $value) 
		{
			if($value==$n['username'])
			{
				$flag=1;
				break;
			}
		} 
		if($flag)
		{	
			$postID=$n['postID'];
			?>

			<br>
			<br>
			<font style="margin-left:30px;margin-top:50px;font-size:50px;background-color:black;color:white;" ></abbr>  <?php echo $n["username"]; ?></abbr></font>
			<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n["date"]; ?> <sup><?php echo $n["time"]; ?></sup></font></div>
		
				<?php
				$imagetmp=$n["imagetmp"];
				echo "<div><a onclick='analyticsFun(`".$postID."`)' href='data:image/png;base64,".base64_encode($n["imagetmp"])."' download>
				<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' ></a>
				</div>";	
				
  			?>
  <br>
  <br>
  <br>
<div style="margin-left:5%;width: 90%;><p><font class="a">-</font><font size="6"  >  <?php echo $n["caption"]; ?></font></p></div>
</button>
</form>
<hr style="background-color:black;margin-top:50px;margin-left:20px;height:3px;">
			<?php
			}
		
	}
?>
<form method="POST">
	<input type="hidden" name="postID" id="postID" value="">
	<button type="submit" style="visibility: hidden;" id="submit" name="submit"></button>

	
</form>
<script type="text/javascript">
	function analyticsFun(p1)
	{
		document.getElementById("postID").value=p1;
		 document.getElementById("submit").click();
	}
</script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
//	echo "HERE";
//	echo '<script>alert("Successfully !!");</script>';
            $postID1=$_POST['postID'];
            //echo $postID1;
            //echo '<script>alert(`".$postID1."`);</script>';
       //     echo "SELECT * FROM analyticsofphoto WHERE postID='$postID1'";
	$analytics1=mysqli_query($con,"SELECT * FROM analyticsofphoto WHERE postID='$postID1'");
	$ana1=mysqli_num_rows($analytics1);
	//echo $ana1;
	if($ana1)
	{
		$analytics4=mysqli_fetch_array($analytics1);
		$count1=$analytics4['count'];
		$count1++;
		mysqli_query($con,"UPDATE analyticsofphoto SET count='$count1' WHERE postID=$postID1");
	}
	else
	{

		mysqli_query($con,"INSERT INTO analyticsofphoto(postID,count) VALUES('$postID1','1')");

	}
}