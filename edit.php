<?php
$id=$_GET['id'];
$connect=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connect,"register");
$sq="SELECT * FROM message WHERE ID='$id'";
$query=mysqli_query($connect,$sq);
$fetch=mysqli_fetch_array($query);
?>
<html>
<head>
<title>EDIT</title>
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
               <form action="#" method="POST">
                  <input type="text" name="up_subject" placeholder="Subject" class="form-control" value="<?php echo $fetch["SUBJECT"];?>"><br/><br/>
                  <label>Topic</label>
                  <select name="up_topic" value="<?php echo $fetch["TOPIC"];?>">
                    <option>Social</option>
                    <option>Health</option>
                    <option>Political</option>
                  </select></br><br/></br><br/>
                  <textarea name="up_content" placeholder="Type your content here " value="<?php echo $fetch["CONTENT"];?>"></textarea><br/><br/>
                  <button class="btn btn-lg btn-primary" name="update" type="submit">UPDATE</button>
                </form>
			</div>
		</div>
	</div>
</div>	
</body>
</html>
<?php
if(isset($_POST["update"]))
{
	$up_subject = $_POST["up_subject"];
	   $up_topic   = $_POST["up_topic"];
	     $up_content = $_POST["up_content"];
	        $sql1   = "UPDATE `register`.`message` SET SUBJECT = '$up_subject',TOPIC = '$up_topic',CONTENT='$up_content' WHERE ID='$id'";   
	          $query1 = mysqli_query($connect,$sql1); 
	
}


?>