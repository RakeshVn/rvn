<html>
<title>RGUKT Alumni</title>

<head>

<link rel="stylesheet" href="css/slide.css">
<link rel="stylesheet" href="css/header.css">

</head>

<body bgcolor="white">

<!--Header Begins-->
<div class="css-header"><br>
	      <a id="a" href="#"><button id="but">&nbsp;Login &nbsp;</button></a> 
         <a id="a" href="signup.php"><button id="but">Sign Up&nbsp;&nbsp;</button></a>
</div>
<!--Header Ends-->

<!---->
<center>
<form action="login.php" method="post"><br>
<input type="text" name="user" placeholder="Username"><br>
<input type="password" name="pass"placeholder="Password"><br>
<input type="submit" name="submit" value="Submit" >
</form>
</center>
<?php

if(isset($_POST['submit']))
{
	$link=mysql_connect("localhost","root","");
	$Username=$_POST['user'];
	$Password=$_POST['pass'];
	if(strlen($Username)==0&&strlen($Password)==0)
	{
		echo "<center>";
		echo "Please Fill Details Correctly";	
		echo "</center>";
	}
	mysql_select_db("Database");
	$query = "SELECT * FROM Login WHERE username='$Username' and password='$Password'";
      $a = mysql_query($query);
      $n = mysql_num_rows($a);
      if ($n>=1)
		 {
		 	session_start();
         $_SESSION['user_id']=$Username;
			header('Location:logged.php');
		 }

		  else
				echo "<center>";
				echo "Entered Username/Password is incorrect";echo "<br>";
				echo "<a id='butt' href='signup.php'><button style='height:30;width:150;background-color:black;color:white'>Signup Here</button></a>";
				echo "</center>";
}
?>
<!---->

<!--Footer Begins-->
<div class="css-footer"><br>
	      <p id="copyright">  Designed By Rakesh V&nbsp;</p>
</div>
<!--Footer Ends-->


</body>
</html>

