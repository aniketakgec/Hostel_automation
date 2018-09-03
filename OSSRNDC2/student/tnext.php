<?php
if(!isset($_SESSION['sid'])){
   header("Location:login1.php");
}
if(isset($_POST['save']))
	{
	
	//check if option is selected
	if(!isset($_POST['s1']))
{
  $errorMessage= "<li>You forgot to select your partner!</li>";
  echo $errorMessage;
}
if(!isset($_POST['s2']))
{
  $errorMessage= "<li>You forgot to select your partner!</li>";
  echo $errorMessage;
}

	$p1=$_POST['s1'];
	$p2=$_POST['s2'];
	//check if both the choosen partner are different or not
	if($p1==$p2)
	{
		echo "please select different values";
	}
else
{
	//getting details of partners
	$query3="select * from student_details where student_no='$p1'";
	$data3=mysqli_query($conn,$query3);
	$result3=mysqli_fetch_assoc($data3);
	$query7="select * from student_details where student_no='$p2'";
	$data7=mysqli_query($conn,$query7);
	$result7=mysqli_fetch_assoc($data7);
	if($result3)
	{
		if($result7)
		{
			$g2=$result7['GENDER'];
		$g1=$result3['GENDER'];
		//check if gender of logged in user and partners are same
		if($g1==$gender && $g2=$gender)
		{
		$query4="insert into login values('',$sid,$p1,$p2)";
	$data4=mysqli_query($conn,$query4);
	if($data4)
    {
		//set leader=1 in student registration table
		$query8="update student_registration set leader=1 where student_no='$sid'";
		$data8=mysqli_query($conn,$query8);
		if($data8)
		{
			echo $sid." "."is the leader<br>";
		}
		//set leader=2 for partners
		$query5="update student_registration set leader=2 where student_no='$p1' || student_no='$p2'";
		$data5=mysqli_query($conn,$query5);
		if($data5)
		{
			echo "<br>".$p1." ".$p2." are now member";
		}
		//destroy session after selecting partners
		session_destroy();
                session_unset();
                header(" refresh:5;location:login1.php");
		
		}
	else
	{
		echo mysqli_error($conn);
	}
	
	}
	
	else
	{
		echo "please select different option";
	}

		}
	
	
	}
else
	{
		echo mysqli_error($conn);
	}
}

} //end of isset
?>