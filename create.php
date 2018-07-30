<html>
<head>
<title>HOME</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
<link href="css/create.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid a">
   <div class="container">
      <div class="row">
        <div class="col-md-5">
            <h1>EXEL</h1>
        </div>
		<div class="col-md-5">
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
		   <div class="col-md-5 col-md-offset-3">
		   <h1>Whats is in your mind?</h1><br/><br/>
               <form action="#" method="POST">
                  <input type="text" name="subject" placeholder="Subject" class="form-control"><br/><br/>
                  <label>Topic</label>
                  <select name="topic">
                    <option>Social</option>
                    <option>Health</option>
                    <option>Political</option>
                  </select></br><br/></br><br/>
                  <textarea name="content" placeholder="Type your content here "></textarea><br/><br/>
                  <button class="btn btn-lg btn-primary" name="post" type="submit">POST</button>
                </form>
			</div>
		</div>
	</div>
</div>	
</body>
</html>
<?php
session_start();

if(isset($_POST["post"]))
{
	  $subject=$_POST["subject"];
		$topic=$_POST["topic"];
			$content=$_POST["content"];
				$connect=mysqli_connect("Localhost","root","");
                     $db=mysqli_select_db($connect,"register");
                        $sql="INSERT INTO `register`.`message` (`EMAIL`, `SUBJECT`, `TOPIC`, `CONTENT`) VALUES ('{$_SESSION['email']}', '$subject', '$topic', '$content')";
                               $query=mysqli_query($connect,$sql);
                                   echo"successfully posted";							   
                                    							   
}
if(isset($_POST["message"]))
{
	header("Location:message.php");
}
?>

