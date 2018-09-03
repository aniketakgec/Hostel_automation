<?php
if(!isset($_SESSION['sid'])){
   header("Location:login1.php");
}
//check if button is clicked
if(isset($_POST['ok']))
{
	
	//check if any option is choosen or not
	if(!isset($_POST['s1']))
{
  $errorMessage= "<li>You forgot to select your partner!</li>";
  echo $errorMessage;
}
else
{
	//get selected value of partner
$partner1=$_POST['s1'];
//get details of partner from student detail table
$query1="select * from student_details where student_no='$partner1'";
$data1=mysqli_query($conn,$query1);
$result1=mysqli_fetch_assoc($data1);
if($data1)
{
	$g=$result1['GENDER'];
	//check if logged in user and partner choosen have same gender
	if($g==$gender)
	{
		//check if student have already choosen partner
		$query2="select * from login where leader=$sid";
		$data2=mysqli_query($conn,$query2);
		$result2=mysqli_fetch_assoc($data2);
		$rows2=mysqli_num_rows($data2);
		if($rows2>0)
		{
			$p1=$result2['PARTNER_1'];
		if($p1==$partner1)
		{
			echo "partner is already choosen";
		}

		}
	else
	{
		$query3="insert into login values('','$sid','$partner1','')";
		$data3=mysqli_query($conn,$query3);
		if($data3)
		{
		$query4="update student_registration set leader=1 where student_no='$sid'";
		$data4=mysqli_query($conn,$query4);
		if($data4)
		 {	
			echo $sid." "."is the leader<br>";
		 }
		}
		else
		 {
			echo mysqli_error($conn);
		 }
		$query5="update student_registration set leader=2 where student_no='$partner1'";
		$data5=mysqli_query($conn,$query5);
		if($data5)
		{
			echo "<br>".$partner1." "."is now member";
		}
		//after selecting partner session destroy
	session_destroy();
                session_unset();
                header("refresh:20;location:login1.php");
	
	}

}
else
{
	echo "<br>please select different student_no";
}

} //end of if($data1)
}
} //end of isset($_POST['ok'])
?>