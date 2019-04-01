<?php
session_start();

session_destroy();
echo '<script>
    alert("Logout!");
    location="index.php";
  </script>'

?>
