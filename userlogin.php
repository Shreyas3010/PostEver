<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    background-image: url("image/info1.jpg");
    height:100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.container {
    background:rgba(0,0,0,0.5);
    margin: auto;
    width: 470px;
    border: 4px solid black;
    padding: 10px;
}
input[type=text], input[type=password] {
    width:100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    font-weight: 900;
    font-size: 30px;
    color: black;
    font-family: "courier";
    background-color:Transparent;
}

input[type=text]:focus, input[type=password]:focus {
    width:100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: 2px solid black;
    font-weight: 900;
    font-size: 30px;
    color: black;
    font-family: "courier";
}
input[type=text]:hover, input[type=password]:hover {
    background-color:Transparent;
    border: 2px solid black;
}
 .button {
       border-radius: 4px;
    position: relative;
    background-color:Transparent;
    padding: 16px 20px;
    border: none;
    width: 100%;
    font-size: 30px;
    color: #FFFFFF;
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

input:hover{
    background:#EAEAEA; 
}
.home1
{
    margin-left:91%;
    background-color:Transparent;
    border: none;
    color: black;
    padding: 12px 16px;
    font-size:40px;
    cursor: pointer;    
}
.home1:hover
{
    color:white;
}
::-webkit-input-placeholder{
    font-weight: 900;
    font-size: 30px;
    color: black;
    font-family: "courier";
}
</style>
</head>
<body>
<div class="bg-img">
    <br><br><br><br><br><br><br>
  <form  method="post" class="container" target="_top">
    <center><h1 style="font-size: 40px;"><b>Login</b></h1></center>
    <br>
    <input type="text"   placeholder="Email" name="email" required>
    <input type="password"  placeholder="Enter Password" id="password" name="password" required>
<button class="button" name="login"  type="submit" ><span style=" color:black;">Login </span></button>
<br>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
    $con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    session_start();
    //Select Database
    mysqli_select_db($con,"instagram")or
    die("Could not select db: " . mysql_error());


    $email=$_POST['email'];
    $password=md5($_POST['password']);
    if($password!=NULL && $email!=NULL)
    {
        $result=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND password='$password'");
        $i=mysqli_num_rows($result);
        if($i)
        {
            $n=mysqli_fetch_array($result);
            $_SESSION["IMAGENAME"]=$n["imagename"];
            $_SESSION["IMAGECONTENT"]=$n["imagetmp"];
            $_SESSION["NAME"]=$n["name"];
            $_SESSION["EMAIL"] = $email;
            $_SESSION["USERNAME"]=$n["username"];
            $_SESSION["USERID"]=$n["useID"];
            header("Location:userindex.php")or
            die("Could not select db: " . mysql_error());
        }
        else 
        {
            echo '<script type="text/javascript">alert("Invalid Username or Password!!!"); location="index.php";</script>';

        }
    }
}
?>