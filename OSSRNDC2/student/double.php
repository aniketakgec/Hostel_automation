
<?php
session_start();
include('connection.php');
include('h1.php');

if(!isset($_SESSION['sid'])){
   header("Location:login1.php");
}
$sid=$_SESSION['sid'];
$gender=$_SESSION['gender'];
//selecting students who have choosen room of same type
$query="select * from student_registration where not student_no='$sid' and type='D' and LEADER='0'";
$data=mysqli_query($conn,$query);
if($data)
{
	//drop down list
		echo "<h3>CHOOSE PARTNER 1</h3>";
	echo "<form name='f1' method='post' action=''>
<select name='s1'>";
while($result=mysqli_fetch_array($data))
	{
		//fetching student no in form of list
echo "<option value=".$result['STUDENT_NO'].">".$result['STUDENT_NO']."</option>";
	}
echo "</select>
<input type='submit' name='ok' value='ok'>
</form>";
		
	}

else
{
	echo mysqli_error($conn);
}

include('dnext.php');

?>