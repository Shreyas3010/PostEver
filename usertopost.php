<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  margin-top:60px;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size:20px;
  padding: 20px;
  width: 140px;
  transition: all 0.5s;
  cursor: pointer;
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
input[type=text], input[type=email] {
    width:40%;
    padding: 15px;
    margin: 10px 0 2px 20px;
    border: none;
    background:white;
}

</style>
<body bgcolor="#E6E6FA">
<center><p style="margin-top:30px;font-family:BankFuturistic;font-size:30px;font-weight:900;margin-top:50px;">Post</p></center>
<form action="usertopost01.php" enctype="multipart/form-data" method="post">
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">IMAGE :<input style="margin-left:57px;" type="file" name="postimage" id="postimage" required></p>
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">CAPTION :<TEXTAREA style="margin-left:20px;" name="caption" COLS="63" ROWS="4" placeholder="Write something..."required></TEXTAREA></p>
<!--<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">SOURCE :<input style="margin-left:88px;" type="text" name="slink" id="slink"></p>-->
<center><button class="button" type="submit"><span>UPLOAD </span></button></center>
		</form>
</body>
</html>