<?php
session_start();
$connect=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connect,"register");
$sql1="SELECT*FROM form WHERE EMAIL='{$_SESSION['email']}'";
$query1=mysqli_query($connect,$sql1);
$ed=mysqli_fetch_array($query1);
?>
<html>
<head>
<title>Profile </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid a">
<div class="container">
<div class="row">
<div class="col-md-2">
<h1>PROFILE</h1>
</div>
<div class="col-md-5 col-md-offset-5">
            <nav>
              <ul>
                <li><a href="create.php">Home</a></li>
                <li><a href="message.php">message</a></li>
                <li><a href="profile.php">profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </nav>
         </div>
      </div>
    </div>
</div>
<div class="container-fluid b">
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1>Edit your profile</h1><br/>
<form action="#" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
<input type="text" class="form-control" name="up_firstname" placeholder="First name"  value="<?php echo $ed["FIRST_NAME"];?>">
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="up_lastname" placeholder="Last Name"  value="<?php echo $ed["LAST_NAME"];?>">
</div>
<br/>
<br/>
<br/>
<input type="email" name="email" class="form-control" value="<?php echo $ed["EMAIL"];?>" disabled><br/>
<input type="Password" name="up_password" class="form-control" placeholder="Enter the pssword" value="<?php echo $ed["PASSWORD"];?>"><br/>
<img src="<?php echo $ed["LOCATION"];?>" alt="pic" width="100px" height="100px"> 
<input type="file" name="up_image" value="<?php echo $ed["IMAGE"];?>"><br/><br/>
<button class="btn btn-lg btn-primary btn-block" name="process" type="submit">UPDATE</button>
</form>
</div>
</div>
</div>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST["process"]))
{
	  $up_firstname=$_POST["up_firstname"];
		$up_lastname=$_POST["up_lastname"];
			$up_password=$_POST["up_password"];
			   $up_myimage=$_FILES["up_image"]["name"];
	                  $dir="upload/";
	                    $up_file=$dir.$up_myimage;
	                        move_uploaded_file($_FILES["up_image"]["tmp_name"],$up_file);
                               $sql="UPDATE `register`.`form` SET FIRST_NAME = '$up_firstname', LAST_NAME = '$up_lastname', PASSWORD = '$up_password', LOCATION = '$up_file', IMAGE = '$up_myimage' WHERE `form`.`EMAIL` = '{$_SESSION['email']}'";
                                    $query=mysqli_query($connect,$sql);
}
?>
