<html>
<title>RGUKT Alumni</title>

<head>

<link rel="stylesheet" href="css/slide.css">
<link rel="stylesheet" href="css/header.css">

</head>

<body bgcolor="white">

<!--Header Begins-->
<div class="css-header"><br>
	      <a id="a" href="login.php"><button id="but">&nbsp;Login &nbsp;</button></a> 
         <a id="a" href="#"><button id="but">Sign Up&nbsp;&nbsp;</button></a>
</div>
<!--Header Ends-->

<!---->
<center>
<form action="signup.php" method="post"><br><br><br>
<img src=images/profile.png height="200" width="200"></img><br><br>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Other">Other<br>	
<input type="text" name="user" placeholder="Username"><br>
<input type="password" name="pass"placeholder="Password"><br>
<input type="submit" name="submit" value="Submit" >
</form>
</center>
<?php

if(isset($_POST['submit']))
{
	session_start();
	session_destroy();
	mysql_connect("localhost","root","");
	$Username=$_POST['user'];
	$Password=$_POST['pass'];
	$Gender=$_POST['gender'];
	$Photo;
	if($Gender=="Male")
		$Photo="profile/male.png";
	if($Gender=="Female")
		$Photo="profile/female.png";
	if($Gender=="Other")
		$Photo="profile/others.png";
	mysql_select_db("Database");
	$query="Insert into Login values ('$Username','$Password','$Photo')";
	mysql_query($query);	
	header('Location:logged.php');
	session_start();
   $_SESSION['user_id']=$Username;
}
?>
<!---->

<!--Footer Begins-->
<div class="css-footer"><br>
	      <p id="copyright"> Designed By Rakesh V &nbsp;</p>
</div>
<!--Footer Ends-->


</body>
</html>

