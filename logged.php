<?php
session_start();
$_SESSION['user_id']=$_SESSION['user_id'];
if(!$_SESSION['user_id']){
    header('Location:login.php');
}
else{
	$link=mysql_connect("localhost","root","");
	mysql_select_db("Database");
	$Username=$_SESSION['user_id'];
	$Query=mysql_query("SELECT photos FROM Login WHERE username='$Username'");
	$a=mysql_fetch_array($Query);
	$Photo=$a[0];
	}
echo "
<html>
<title>RGUKT Alumni</title>

<head>

<link rel='stylesheet' href='css/slide.css'>
<link rel='stylesheet' href='css/header.css'>

</head>

<body bgcolor='white'>

<!--Header Begins-->
<div class='css-header'><br>
			<img class='op-profile' src='$Photo' height='50' width=50></img>
         <a id='a' href='Logout.php'><button id='but'>Log Out</button></a>
</div>
<!--Header Ends-->

<center>
<br><br><br>
<img class='profile' src='$Photo' height='200' width='200'></img><br><br>
<p>Welcome $Username</p>
<form action='profile.php' method='post' enctype='multipart/form-data'>
<input type=\"file\" name=\"uploadedimage\" value=\"Choose file\"><sub></sub><br><br>
<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" id=\"submit\">Upload</button>
</center>

<!--Footer Begins-->
<div class='css-footer'><br>
	      <p id='copyright'> Designed By Rakesh V&nbsp;</p>
</div>
<!--Footer Ends-->


</body>
</html>
"
?>
