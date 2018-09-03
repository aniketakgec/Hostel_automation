<?php
include('connection.php');
include('h1.php');
session_start();
//check if the login button is pressed
if(isset($_POST['submit']))
{
	$sid=$_POST['sid'];
	$pwd=$_POST['pwd'];
    $pwd=md5($pwd);
		//fetch data from student registration table 
		$query="select * from student_registration where student_no='$sid' && password='$pwd' and leader=1";
		$data=mysqli_query($conn,$query);
		$result=mysqli_fetch_assoc($data);
	
		if($result)
		{
			$room_choosen=$result['ROOM_CHOOSEN'];
			$_SESSION["type"]=$result['TYPE'];
		   if($room_choosen=="YES")
		   {
			 echo "<script>
			 alert('you have already choosen your Room')
			 </script>";
		   }
	      else
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
	            header("location:clock.php");
		
               } //end of if($data1)          
            else
               {
	            echo mysqli_error($conn);
               }	
	        }
		}
		else
		 {
			echo "invalid user name or password";
		 }
}	
?>

<html>
<body background="background.jpg">
<center>
<H1>LOG IN FOR ROOM ALLOTMENTS</H1><br><br>
</center>
<form name=f1 action="login2.php" align="center" method="POST">
<input type="text" name="sid" value="" placeholder="enter your st no.">
<br><br><br>
<input type="password" name="pwd" placeholder="#########">
<br><br><br>
<input type="submit" name="submit" value="login" >
<br><br><br>
</form>
</body>
</html>