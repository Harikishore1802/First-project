<?php
	if(isset($_POST["submit"]))
	{
		$email=$_POST["email"];
		$password=$_POST["password"];
		$connect=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($connect,"register");
		$sql="SELECT * FROM form WHERE EMAIL='$email' AND PASSWORD='$password'";
		$query=mysqli_query($connect,$sql);
		$fetch=mysqli_fetch_array($query);
		if((!empty($fetch["EMAIL"])=='$email')&&(!empty($fetch["PASSWORD"])=='$password'))
		{
			session_start();
			$_SESSION['email']=$email;
			header("Location:create.php");
		}
		else
		{
			$s="Email or Password are incorrect";
		
		}
	}
	?>
<html>
<head>
<title>LOGIN</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
 <script src="js/ie-emulation-modes-warning.js"></script>
</head>
<body>
<?php
session_start();
if((isset($_SESSION['email']))&&(isset($_SESSION['loginpass'])))
  {
	header("Location:create.php");
    exit;
  }
?>
<div class="container-fluid a">
   <div class="container ">
      <div class="row">
        <div class="col-md-5">
            <h1>EXEL</h1>
        </div>
      </div>
    </div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
<div class="container">
    <div class="b">
	   <div class="row">
		  <div class="col-md-3 col-md-offset-4 ">
             <form class="form-signin" action="#" method="POST">
                 <input type="email" id="inputEmail" class="form-control" placeholder="E-Mail" name="email"><br/>
                   <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"></br>
                      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">LOGIN</button><br/>
		                 <button class="btn btn-lg btn-success btn-block" type="submit" name="register">Register</button>
						 <?php
						  if(isset($s))
						  {
							  echo $s;
						  }
						 ?>
             </form>
	     </div>
       </div>
	</div>
</div>
</div>
        			
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
	if(isset($_POST["register"]))
	{
			header("Location:home.php");
	}
?>