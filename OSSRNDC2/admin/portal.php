<?php   
session_start();
include_once 'connection.php'; 
if(!isset($_SESSION["sid"])){
	?>
	<script type="text/javascript">
	window.location="registration.php";
	</script>
	
	
	<?php
}

?><html>
<head>
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<style>
h1{
	font-family: 'Cookie', cursive;
	font-size:50px;
}
button{margin-top:20px;
	margin-left:650px;
	border-radius:10px;
	width:200px;
}
</style>
</head>
<body>
<h1 align="center">Choose hostel</h1>
</body>
</html>
<?php
$s= "SELECT * FROM hostel where gender='$_SESSION[gender]'";
$x=mysqli_query($conn,$s);

$i=1;
while($res=mysqli_fetch_assoc($x))
{ 
	echo "<form action='hostel_portal.php' method='POST'>";
 echo "<button type='submit' name='submit$i' value='$res[Name]' >$res[Name]</button>"."<br><br>";
 echo "</form>";
$i++;

}

?>

