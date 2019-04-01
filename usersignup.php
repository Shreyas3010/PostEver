<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<script type="text/javascript">
  
  function fn() {

   var cap = Math.floor((Math.random()*10000) +1);
  document.getElementById("captcha").value = cap;
  }
  /*function checkcaptch()
  {
    var entercap = document.getElementById("captcha1").value;
    var cap1 = document.getElementById("captcha").value;
    if(entercap != " ")
    {
        if(entercap != cap1)
        {
          document.getElementById("captcha2").value="Captcha does not match";
        }
        else
        {
          document.getElementById("captcha2").value="";
        }  
    }
    else
    {
      document.getElementById("captcha2").value="";
    }
    
  }*/
  // function checkuser()
  // {
  //    //var x = document.getElementById("username").value;
  //    var x="Okay";
  //    if(x!="")
  //    {
  //    <?php

  //       $con=mysqli_connect("127.0.0.1","root","")or
  //       die("Could not connect: " . mysql_error());
  //       mysqli_select_db($con,"instagram")or
  //       die("Could not select db: " . mysql_error());
  //       $username=<script>document.writeln(x);</script>;
  //       echo $username;
  //       $result=mysqli_query($con,"SELECT * FROM user WHERE username=$username");
  //       mysqli_num_rows($result)
  //       if(1)
  //       {

  //         ?>
  //         document.getElementById("username1").innerHTML = x+" "+"is already taken.";
  //         <?php
  //       }
  //       else
  //       {
  //         ?>
  //         document.getElementById("username1").innerHTML = "";
  //         <?php
  //       }
  //    ?>
  //    } 
  //    else
  //    {
  //       document.getElementById("username1").innerHTML = "";

  //    }
  // }
  </script>
<head><title>Sign up</title></head>
<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  width:100%;
}

.btnn {
  color: gray;
  background-color: white;
  padding: 8px 20px;
  font-size:14px;
  font-family:Roboto;
  width:505px;
  height:60px;
  margin-left:1px;
  pointer:;
  
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

.a{
  margin-top:40px;
  text-decoration:none;
}

.b{

  width: 29%;
  padding: 20px;
  font-family: "courier";  
  outline-color:white;  
  outline-style:groove;
  font-weight: 900;
  font-size: 15px;
}
.c{

  width: 13%;
  padding: 20px;
  font-family: "courier";  
  text-align: center;
  outline-color:white;  
  outline-style:groove;
  font-size: 20px;
  font-weight: 900;
  
}
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:32%;
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

a:hover
{
	
	color:#4B33DC;
}
input:hover{
	background:#EAEAEA;	
}
</style>
<body onload="fn()" background="image/bg01.jpg" style="background-size:cover;background-position:center">
<br>
<form name="signup" method="POST" class="a" enctype="multipart/form-data"><center>
<h1 style="color:#F8F8F8;font-family: courier;">Sign Up</h1>
<div><input type="text" name="name" placeholder="Name" class="b" required ></div>
<div><input type="text" id="username" name="username" placeholder="Username" class="b" required ></div><div id="username1" style="position: fixed;bottom: 495px;left:1070px;color: white;"></div>
<div><input type="email" name="email" placeholder="E-mail" class="b" required ></div>

<div><input type="password" name="password" placeholder="Password" class="b" required ></div>

<div><input type="password" name="password1" placeholder="Confirm Password" class="b" required ></div>
<div><input type="number" name="contact" placeholder="Contact Number" class="b"  required pattern="[0-9]{10}"></div>

  <div ><input type="text" name="captcha" class="c" id="captcha" readonly><input type="text" name="captcha1" class="c" id="captcha1" required></div>
  
<div  class="upload-btn-wrapper">
  <button  class="btnn w3-small" style="width:485px;font-family: courier;font-weight: 900;">Upload Profile Image</button>
  <input type="file"  name="profileimage" required>
</div><br>
<button class="button"  name="submit" ><span style="font-family: courier;font-weight: 900;">Sign Up</span></button>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $entercap =$_POST['captcha1'];
    $cap1 =$_POST['captcha'];
        if($entercap != $cap1)
        {
          echo '<script type="text/javascript">alert("Captch does not match !!!"); location="usersignup.php";</script>';
        }
        else
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $username=$_POST['username'];
            $password=md5($_POST['password']);
            //echo "pass:$password";
            $contact=$_POST['contact'];
            $imagename=$_FILES['profileimage']['name'];
            $imagetmp=addslashes(file_get_contents($_FILES['profileimage']['tmp_name']));
            $con=mysqli_connect("127.0.0.1","root","")or
            die("Could not connect: " . mysql_error());
            mysqli_select_db($con,"instagram")or
            mysqli_query($con,"CREATE DATABASE instagram");

            if($name!=NULL)
            {
              $qry = "INSERT INTO `user`(username,email,name,password,contact,imagetmp,imagename) VALUES('$username','$email','$name','$password','$contact','$imagetmp','$imagename')";
              if(mysqli_query($con,$qry))
              {
                echo '<script>alert("Successfully signed up!!!");location="userlogin.php";</script>';
              }
              else
              {
                echo '<script>alert("Error !! Sorry please sign up again.");location="usersignup.php";</script>';
              } 
            }

        }
}
?>
