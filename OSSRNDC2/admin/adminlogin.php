<?php
include('connection.php');

if(isset($_POST['submit']))
{

	$uid=$_POST['uid'];
	$pwd=$_POST['pwd'];

		//fetch data from student registration table 
		$query="select * from admin where username='$uid'";
		$data=mysqli_query($conn,$query);
		$res=mysqli_fetch_assoc($data);
		
	$hashedcheckpassword=password_verify($pwd,$res["password"]);
		
		if($hashedcheckpassword=true)
		{
			header("location:adminhome.php");
		}
		else{
			echo "wrong username password";
		}
	
		
			
	
}		

?>

<html>
<body background="img/background.jpg">
<center>
<H1>ADMIN LOG IN</H1><br><br>
</center>
<form name=f1 action="adminlogin.php" align="center" method="POST">
<input type="text" name="uid" placeholder="Username">
<br><br><br>
<input type="password" name="pwd" placeholder="#########">
<br><br><br>
<input type="submit" name="submit" >
<br><br><br>
</form>
</body>
</html>