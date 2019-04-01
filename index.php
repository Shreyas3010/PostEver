<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.navbar {
    overflow: hidden;
    background-color:Transparent; 
}
.navbar a.a2
{
  color:black;
  float:right;
  margin-right:0px;
}
.navbar a.active {
  background-color: #4973AB;
  color: white;
 font-variant: small-caps;
  
}
.subnav a.a1 {
  color:black;
}
.navbar a {
    float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;

}
.subnav a {
    float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;

}

.subnav {
    float: left;
    overflow: hidden;
}

.subnav .subnavbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: black;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}
.navbar a:hover, .subnav:hover .subnavbtn {
    background-color:#C0C0C0;
}

.subnav-content {
    display: none;
    position: absolute;
    left: 0;
  background-color:#555555;
    width: 100%;
    z-index: 1;
}

.subnav-content a {
    float: left;
    color: white;
    text-decoration: none;
}

.subnav-content a:hover {
    background-color:#f44336;;
    color:white;
}

.subnav:hover .subnav-content {
    display: block;
}

</style>
<body>
<div class="navbar">
<a class="active" href="home.php" target="target"> PostEver </a>
  <div class="subnav">
    <button  class="a1 w3-large subnavbtn">User <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
        <a class="a3 w3-large" target="target" href="usersignup.php">Signup</a>
      <a class="a3 w3-large" target="target" href="userlogin.php">Login</a>
    </div>
  </div>
  <a class="a1 w3-large" style="color: black;" target="target" href="adminlogin.php" >Admin</a>
  <a class="a2 w3-large" target="target" href="about.php" >About</a> 
</div>
<div><iframe style="border:none;" src="home.php" width="100%" height="91%" name="target"></iframe></div>
</body>
</html>