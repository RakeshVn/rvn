<?php
	 session_start();
	 if($_SESSION['user_id']=$_SESSION['user_id']){
	 $Username=$_SESSION['user_id'];
    mysql_connect("localhost","root","") or die("Can not connect to database");
    mysql_select_db("Database");
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["uploadedimage"]["name"]);
    $extension = end($temp);
    if ((($_FILES["uploadedimage"]["type"] == "image/gif")
            || ($_FILES["uploadedimage"]["type"] == "image/jpeg")
            || ($_FILES["uploadedimage"]["type"] == "image/jpg")
            || ($_FILES["uploadedimage"]["type"] == "image/pjpeg")
            || ($_FILES["uploadedimage"]["type"] == "image/x-png")
            || ($_FILES["uploadedimage"]["type"] == "image/png"))
        && ($_FILES["uploadedimage"]["size"] <=1161895)
        && in_array($extension, $allowedExts)) 	 {
	    if (!empty($_FILES["uploadedimage"]["name"])) 
		 {
   	     $file_name=$_FILES["uploadedimage"]["name"];
   	     $temp_name=$_FILES["uploadedimage"]["tmp_name"];
   	     $imgtype=$_FILES["uploadedimage"]["type"];
   	     $imagename=$_FILES["uploadedimage"]["name"];
   	     $file="./profile/$file_name";//Path for checking images
   	     if(move_uploaded_file($temp_name,$file)) //upload file,directory
   	     $query_upload = "UPDATE Login SET photos='$file' WHERE username='$Username' ";
   	     if(mysql_query($query_upload))
						header('Location:logged.php');
		 }
	  }
	  else
	  {

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
         <a id='a' href='Logout.php'><button id='but'>Log Out</button></a>
</div>
<!--Header Ends-->

<center>
<br><br><br>
<img class='my-picture' src='$Photo' height='200' width='200'></img><br><br>
<p>Welcome $Username</p>
<p>Please upload a file of format jpg (or) png (or) gif (or) jpeg and less than 10MB</p>
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
";
 
}
?>
