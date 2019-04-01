<?php
$postID=$_POST['postID'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"instagram")or
 die("Could not select db: " . mysql_error());
$result=mysqli_query($con,"SELECT * FROM posts WHERE postID='$postID' ");
$n=mysqli_fetch_array($result);
?>
<html>
<style type="text/css">
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:black;
    border: none;
    font-size: 30px;
    color: #FFFFFF;
    padding: 15px;
    width:200px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background:#c6c0c0;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>
<br>
	<br>
	<form action="editpost01.php" method="POST">
		<input type="hidden" name="postID" value="<?php echo $n['postID'];?>">
<!--<font style="margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php ?></font>-->
	<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n["date"]; ?> <sup><?php echo $n["time"]; ?></sup></font></div>
	<?php
		echo "<div><a href='data:image/png;base64,".base64_encode($n["imagetmp"])."' download>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' ></a>
		</div>";	
	
  ?>
  <br>
  <br>
<center>
<div style="font-family:Courier;margin-top:50px;font-size:40px;background-color:black;color:white;width:80%;">CAPTION :<TEXTAREA style="font-family:Courier;margin-top:50px;font-size:30px;background-color:black;color:white;" name="caption" COLS="50" ROWS="4" required><?php echo $n["caption"]; ?></TEXTAREA></div>
</center>
<button class="button"  style="margin:60px 00px 00px 440px; " name="edit" type="submit" ><span style="font-family: courier;">Edit</span></button>
<button class="button"  style="margin:60px 00px 00px 230px; " name="delete" type="submit" ><span style="font-family: courier;">Delete</span></button>

</form>
</html>