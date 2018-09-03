<?php
include('connection.php');
session_start();
include('h1.php');
//check if the login button is pressed
if(isset($_POST['login']))
{

	$sid=$_POST['sid'];
	$pwd=$_POST['pwd'];
$pwd=md5($pwd);
		//fetch data from student registration table 
		$query="select * from student_registration where student_no='$sid' && password='$pwd'";
		$data=mysqli_query($conn,$query);
		$result=mysqli_fetch_assoc($data);
	
		if($result)
		{
	
		$type=$result['TYPE'];
			$leader=$result['LEADER'];
			if($leader==1)
			{
				header("location:login2.php");
			}
			if($leader==2)
			{
				echo "you are not eligible to login ask your leader to log in";
			}
		else if($leader==0)
		{
			
			
	//fetching data of student who is logged in
		$query1="select * from student_details where student_no='$sid'";
$data1=mysqli_query($conn,$query1);
$result1=mysqli_fetch_assoc($data1);
if($data1)
 {
	//create session
		
	$gender=$result1['GENDER'];
	$year=$result1['YEAR'];
	//creating session variables
	
		$_SESSION['sid']=$sid;
		$_SESSION['password']=$pwd;
	$_SESSION['Name']=$result1['NAME'];
	$_SESSION['gender']=$gender;
	$_SESSION['year']=$year;
	$_SESSION['Name']=$result1['NAME'];
	$_SESSION['email']=$result1['EMAIL_ID'];
	$_SESSION['type']=$type;
	//check the room type-single,double,triple
	//if single
	if($type=='S')
	 {
		 $query3="insert into login values('','$sid','','')";
		$data3=mysqli_query($conn,$query3);
		if($data3)
		{
			//update leader=1 where student no is $sid
			$query4="update student_registration set leader=1 where student_no='$sid'";
			$data4=mysqli_query($conn,$query4);
			echo $sid." "."is the leader";
		}
		else
		{	
		echo mysqli_error($conn);
		}
	 }
	 //if double
		if($type=='D')
	 {
			header("location:double.php");
	 }
	 
	//if triple
	 if($type=='T')
	 {
		 header("location:triple.php");
	 }
 } //end of if($data1)
     else
     {
	  echo mysqli_error($conn);
     }	
		} //end of else if($leader==0)
 } //end of if($result) 
	
 //if no data is found in student registration table	
  else
  {
	 echo "no data found";
  }
} //end of isset
?>

<html>
<body background="img/background.jpg">
<center>
<H1>LOG IN</H1><br><br>
</center>
<form name=f1 action="login1.php" align="center" method="POST">
<input type="text" name="sid" value="" placeholder="enter your st no.">

<br><br><br>
<input type="password" name="pwd" placeholder="#########">
<br><br><br>
<input type="submit" name="login" value="login">
<br><br><br>
</form>
</body>
</html>