<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

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
.avatar {
    width:640px;
    height: 330px;  
    margin-top:30px; 
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
	$rmain=mysqli_query($con,"SELECT * FROM analyticsofphoto WHERE 1");
	while($n=mysqli_fetch_array($rmain))
	{	
	$postID=$n['postID'];
	$count= $n['count'];
		$rmain1=mysqli_query($con,"SELECT * FROM posts WHERE postID=$postID");
		$n1=mysqli_fetch_array($rmain1);
			?>

			<br>
			<br>
			<font style="margin-left:30px;margin-top:50px;font-size:50px;background-color:black;color:white;" ><abbr>  <?php echo $n1["username"]; ?></abbr></font>
			<font style="margin-left:10px;margin-top:50px;font-size:50px;" ><abbr>Count:  <?php echo $count;  ?></abbr></font>
			<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n1["date"]; ?> <sup><?php echo $n1["time"]; ?></sup></font></div>
				<?php
				echo "<div>
				<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n1["imagetmp"])."' alt='Profile Picture' class='avatar' >
				</div>";	
				
  			?>
  <br>
  <br>
  <br>
<div style="margin-left:5%;width: 90%;><p><font class="a">-</font><font size="6"  >  <?php echo $n1["caption"]; ?></font></p></div>
</button>
</form>
<hr style="background-color:black;margin-top:50px;margin-left:20px;height:3px;">
		<?php
	}
?>
</body>
</html>
