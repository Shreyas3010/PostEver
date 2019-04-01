<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family:courier;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-size: 30px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<p style="font-family: cursive;font-size:30px;text-align: center;font-weight: 900;">Hashtags</p>
<center>
<table>
<tr>
<th>Hashtag</th>
<th>Count</th>
</tr>
  <?php
  $con=mysqli_connect("127.0.0.1","root","")or
  die("Could not connect: " . mysql_error());
  mysqli_select_db($con,"instagram")or
  mysqli_query($con,"CREATE DATABASE instagram");
  $result=mysqli_query($con,"SELECT * FROM `analyticsofhashtag` WHERE 1");
  while($n=mysqli_fetch_array($result))
  {
    ?>
    <tr>
    <td><?php echo $n['hashtag'] ?></td>
    <td><?php echo $n['count'] ?></td>
    </tr>
 <?php
  }
  ?>
</table>
</center>
</body>