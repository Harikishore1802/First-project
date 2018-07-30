<?php
session_start();
$connect=mysqli_connect("Localhost","root","");
   $db=mysqli_select_db($connect,"register");
       $sql = "SELECT * FROM message";
	     $query=mysqli_query($connect,$sql);
		  
?>
<html>
<head>
<title>Messages</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
<link href="css/message.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid a">
<div class="container ">
<div class="row">
<div class="col-md-3">
<h1>EXEL</h1>
</div>
<div class="col-md-6 col-md-offset-3">
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
<div class="container-fluid g">
<div class="container ">
<div class="row">
<?php
 while($fetch=mysqli_fetch_array($query))
		{
		$e  = $fetch["EMAIL"];
		$a  = $fetch["CONTENT"];
		$b  = $fetch["SUBJECT"];
		$c  = $fetch["TOPIC"];
		$s  = date("h:i:sa");
		$t  = date("d-m-y");
		   
		?>
<div class="col-md-12">
<div class="b"> <!-- for email-->
<h3>
<?php
 if(isset($e))
{
echo $e;	
}
?></h3>
</div>
<div class="c"><!-- for topic-->
<h4>
<?php
 if(isset($c))
{
echo $c;	
}?>
</h4>
</div>
<div class="d"><!-- for subject -->
<h4>
<h4>
SUBJECT :
<?php
if(isset($b))
{
 echo $b;	
}
?>
</h4>
</div>
<div class="e"><!-- for message-->
<h4>
<p>
<?php
if(isset($a))
{
	echo $a;
}
echo $s."  ".$t;
?>
</p>
<a href="edit.php?id=<?php echo $fetch['ID']?>">edit</a>
</div>
		<?php } ?>
</div>
</div>
</div>
</div>
</body>
</html>
