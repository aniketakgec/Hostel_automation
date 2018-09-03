<?php
include_once'connection.php';
session_start();


$s= "SELECT count( DISTINCT Name) as name  FROM hostel where gender='$_SESSION[gender]'";
$x=mysqli_query($conn, $s);
$res=mysqli_fetch_assoc($x);
$count= $res["name"];



?>
<?php
for($i=1;$i<=$count;$i++){
if(isset($_POST["submit$i"])){
	

	$_SESSION["name"]=$_POST["submit$i"];
	
$q="select * from hostel where Name='$_SESSION[name]' ";
$res=mysqli_query($conn,$q);
$fetch=mysqli_fetch_array($res);

$t1=($fetch["portal_time"]);
date_default_timezone_set("Asia/kolkata");
$t=time();
$t2=(date('Y-m-d H:i:s',$t));

  
if((strtotime($t2)- strtotime($t1))>=0)
{?><script>
window.location.href="room_portal.php";
</script>
<?php
	
}
else
	echo "portal will not open right now";
}

}



?>