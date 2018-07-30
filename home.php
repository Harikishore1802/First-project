<?php
if(isset($_POST["process"])){
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$image=$_FILES["myimage"]["name"];
	$dir="upload/";
	$up_file=$dir.$image;
	move_uploaded_file($_FILES["myimage"]["tmp_name"],$up_file);
    $connect=mysqli_connect("Localhost","root","");
    $db=mysqli_select_db($connect,"register");
	$sq="SELECT * FROM form WHERE EMAIL='$email'";
	$query=mysqli_query($connect,$sq);
	$fetch=mysqli_fetch_array($query);
	if(isset($fetch['EMAIL'])=='$email')
	{
		$s="Email already exists";
		echo $s;
	}
	else
	{
    $sql="INSERT INTO `register`.`form` (`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `LOCATION`, `IMAGE`) VALUES ('$firstname', '$lastname', '$email', '$password', '$up_file', '$image')";
    $query1=mysqli_query($connect,$sql);
	header("Location:login.php");
	
}}?>
<html>
<head>
<title>Register</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/registration.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
</head>
<body>
<div class="container-fluid a">
<div class="container">
<div class="row">
<div class="col-md-4 ">
<h1>REGISTER</h1>
</div>
</div>
</div>
</div>
<div class="container-fluid b">
<div class="container">
<div class="row">
<div class="col-md-5 col-md-offset-3">
<h1>REGISTRATION FORM</h1><br/><br/><br/>
<form action="#" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
<input type="text" class="form-control" name="firstname" placeholder="First name">
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="lastname" placeholder="Last Name">
</div>
<br/>
<br/>
<br/>
<br/>
<input type="email" name="email" class="form-control" placeholder="@gmail.com"><br/><br/>
<?php if(isset($s)){echo $s;}?>
<input type="Password" name="password" class="form-control" placeholder="Enter the pssword"><br/><br/>
<input type="file" name="myimage" >
<br/><br/><br/>
<button class="btn btn-lg btn-primary" name="process" type="submit">SUBMIT</button>
<button class="btn btn-lg btn-success" name="back" type="submit">CANCEL</button>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["back"]))
{
		header("Location:login.php");
	
}

?>