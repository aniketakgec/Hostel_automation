<?php
session_start();
include('connection.php');
include('h1.php');
if(!isset($_SESSION['sid'])){
   header("Location:login1.php");
}
$sid=$_SESSION['sid'];
$gender=$_SESSION['gender'];
//selecting students who have choosen room of same type for partner1
$query1="select * from student_registration where not student_no='$sid' and type='T' and LEADER='0'";
$data1=mysqli_query($conn,$query1);
//creating drop down list of students who have choosen room of same type
if($data1)
{
		echo "<h3>CHOOSE PARTNER 1</h3>";
	echo "<form name='f1' method='post' action=''>
<select name='s1'>";
while($result1=mysqli_fetch_array($data1))
	{
echo "<option value=".$result1['STUDENT_NO'].">".$result1['STUDENT_NO']."</option>";
	}
echo "</select>";
		
	}

else
{
	echo mysqli_error($conn);
}
//selecting students who have choosen room of same type for partner2
$query2="select * from student_registration where not student_no='$sid' and type='T' and LEADER='0'";
$data2=mysqli_query($conn,$query2);

if($data2)
{
	//creating drop down list of students who have choosen room of same type
		echo "<h3>CHOOSE PARTNER 2</h3>";
	echo "<select name='s2'>";
while($result2=mysqli_fetch_array($data2))
	{
echo "<option value=".$result2['STUDENT_NO'].">".$result2['STUDENT_NO']."</option>";
	}
echo "</select><br><br>
<input type='submit' name='save' value='save'>
</form>";
		
	}

else
{
	echo mysqli_error($conn);
}
include('tnext.php');
?>