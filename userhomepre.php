<?php
session_start();
$username=$_SESSION["USERNAME"];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"instagram")or
	mysqli_query($con,"CREATE DATABASE instagram");
	$tags='';
	$result=mysqli_query($con,"SELECT * FROM followtable WHERE follower='$username'");
		while($n=mysqli_fetch_array($result))
		{
			$following=$n['following'];
    $result1=mysqli_query($con,"SELECT * FROM posts WHERE username='$following'");
    while($n1=mysqli_fetch_array($result1))
    {
      $caption=$n1['caption'];
      $in=0;
      $start=0;
      $end=0;
      $flag1=0;
      $length=strlen($caption);
        //echo $caption;
      while($in<$length)
      {
          if($flag1==0 and $caption[$in]=='#')
          {
            $start=$in+1;
            $flag1=1;
          }

          if($flag1==1 and $caption[$in]=='#')
          {
            $end=$in-1;
            $flag1=3;
          }

          if($flag1==1 and ($in+1==$length or $caption[$in+1]==' '))
          {
            $end=$in;
            $flag1=2;
          }
          if($flag1==2)
          {
            $tmptags='';
            $tmpin=$start;
            while($tmpin<=$end)
            {
              $tmptags.=$caption[$tmpin++];
            }
                $flag1=0;
                $tags.="$tmptags,";
            //echo $tags;
          }
          if($flag1==3)
          {
            $tmptags='';
            $tmpin=$start;
            while($tmpin<=$end)
            {
              $tmptags.=$caption[$tmpin++];
            }
                $flag1=1;
                $start=$in+1;
                $tags.="$tmptags,";
            //echo $tags;
          }
          $in++;
      }
    } 

		}
  //echo $tags;	
	
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
.b1{
	margin-top:30px;
	width:160px;
	height:43px;
	padding: 12px 20px 12px 10px;
	background-color:green;
	font-size:20px;
	border:none;
	color:white;
	font-style: oblique;
	font-weight: bold;
	font-variant: small-caps;
	opacity:.6;
	
}
::placeholder {
	font-style: oblique;
	font-weight: bold;
	font-size:1.2em;
	color:green;
	font-variant: small-caps;
}

</style>
</head>
<body><center>
<div  class="autocomplete"  style="width:600px;">
<form autocomplete="off" action="searchresult.php" target="target1" method="POST">
<input type="hidden" value="1" name="whichone">
  <center><input id="myInput" type="text" name="sresult" placeholder="Search.."></div>
    <button class="w3-large b1" type="submit">Search</button></center>
</form></center>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries ="<?php echo $tags;?>".split(',');

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

<div><iframe style="border:none;" src="userhome.php" width="100%" height="80%" name="target1"></iframe></div>
</body>
</html>