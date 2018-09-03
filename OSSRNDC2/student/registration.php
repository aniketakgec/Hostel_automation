<?php
include('h1.php');
//check if submit button is clicked or not
if(isset($_POST["submit"]))
{
	//making connection with database
	include("connection.php");
	//fetching values from form
$student_no=$_POST['sid'];
$pwd=$_POST['pwd'];
$pass=md5($pwd);
   $room = $_POST['room'];
   //check whether student exist or not or having any DA
	$query="select * from student_details where STUDENT_NO='$student_no' and DA_STATUS='0'";
	$data=mysqli_query($conn,$query);
	$result=mysqli_fetch_assoc($data);
	if($result)
		//inserting data in student_registration table
  {	
    $query1="insert into student_registration(ID,STUDENT_NO,PASSWORD,TYPE,LEADER,ROOM_CHOOSEN) values('','$student_no','$pass','$room','','')";
	$data1=mysqli_query($conn,$query1);
	if($data1)
	{
		echo "registered successfully";
	
}
else
 {
	//student with wrong student no or having DA are termed as invalid details
	echo "invalid details";
 }
}
}
 ?>

<html>
<head>
    <title>sign up system</title>
</head>
<body>
<center><h1><u> SIGN UP </u></h1></center>
<form method="post" action="">

        <br>
		 <i><h3>ENTER STUDENT NUMBER:</h3></i>
        <input type="text" name="sid" value="" placeholder="student no"><BR><BR>
  
    <i><h3>ENTER PASSWORD:</h3></i>
        <input type="password" name="pwd" value="" placeholder="#############"><br><br>
 <i><h3>ROOM TYPE:</h3></i>
 <label><input type="radio" name="room" value="S">Single</label>
        <label><input type="radio" name="room" value="D">Double</label>
        <label><input type="radio" name="room" value="T">Triple</label><br><br>
    
<br>
        <input type="submit" name="submit" value="SIGN UP">
    <br><br>
</form>
<H3>
    IF ALREADY A MEMBER:<BR>
</H3>
    <input type="button" value="LOGIN" onclick="window.location.href='login1.php'">
</form>
</body>
</html>
