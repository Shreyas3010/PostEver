<?php
session_start();

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"instagram")or
 die("Could not select db: " . mysql_error());
	$username=$_POST["username"];
	#echo $username;
	#echo "SELECT * FROM user WHERE username=$username";
	$r1=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
	$n1=mysqli_fetch_array($r1);
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

.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<body>
<!--<a href="customerhomeedit.php"><button class="button button1">Edit</button><a>-->
<center><button class="btt1">Follower <?php echo $n1['follower']; ?></button>
<button class="btt1" style="margin-left:100px;">Following <?php echo $n1['following'];?></button>
</center><br><br>
	<?php
		echo "<div class='imgcontainer'>
		<img src='data:image/png;base64,".base64_encode($n1["imagetmp"])."' alt='Profile Picture' class='avatar' >
		</div>";	
  ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<p><font class="a">Name :</font><font class="b">  <?php echo $n1["name"]; ?></font></p>
<p><font class="a">Email :</font><font class="b">  <?php echo $n1["email"]; ?></font></p>
<?php 
	$result=mysqli_query($con,"SELECT * FROM posts WHERE username='$username' ORDER BY postID DESC ");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:100px;font-size:60px;background-color:black;color:white;">Posts</h1></center>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
	?>
	<br>
	<br>
<!--<font style="margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php ?></font>-->
	<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n["date"]; ?> <sup><?php echo $n["time"]; ?></sup></font></div>
	<?php
		echo "<div>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Picture' class='avatar1' >
		</div>";	
  ?>
  <br>
  <br>
<center><font style="margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["caption"]; ?></font></center>
<hr style="background-color:black;margin-top:50px;margin-left:20px;height:3px;">
	<?php
	}
?>
</body>
</html>


