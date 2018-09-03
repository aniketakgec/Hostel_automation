 <?php
 include_once 'connection.php';
 session_start();
 ?><html>
 <head>
 <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
 <link type="text/css" href="../css/adminstyle.css" rel="stylesheet">
 
</head>
<body>
<h1 align="center">Admin home</h1>
<form action="adminhome.php" method="POST" align="center">
<button  type="submit" name="submit1" >ADD HOSTEL</button>
<button  type="submit" name="submit2" >ADD ROOMS</button>
<button  type="submit" name="submit3" >UPDATE ROOMS</button>
<button  type="submit" name="submit4" >SET HOSTEL OPEN TIMINGS</button>
<button  type="submit" name="submit8" >SET MAIN PORTAL TIMMINGS</button>
</form>
</body> 
</html>
<?php

if(isset($_POST["submit1"]))
{   
?><form align="center" action="adminhome.php" method="POST">
    <input type="text" name="hname" placeholder="HOSTEL NAME"><br>
	 <input type="number" name="RPF" placeholder="ROOMS PER FLOOR"><br>
	  <input type="text" name="year" placeholder="YEAR"><br>
	   <input type="text" name="gender" placeholder="HOSTELER'S GENDER"><br>
	<br><button  type="submit" name="submit" >Create Hostel</button>
    </form>
	
	


<?php
}
?>
 <?php  
 if(isset($_POST["submit"]))
 { date_default_timezone_set("asia/kolkata");
$time = time();
$createdate= date('Y-m-d H:i:s', $time);

$sql = "INSERT INTO hostel(id, Name, RPF, year, gender,updated_at) VALUES ('','$_POST[hname]','$_POST[RPF]','$_POST[year]','$_POST[gender]','$createdate')";

if(mysqli_query($conn, $sql)){
    echo "Hostel created successfully";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
	
	 
 } 
 
 
 ?>
 
 
 
 
 
 <?php

if(isset($_POST["submit2"]))
{   
?><form align="center" action="adminhome.php" method="POST">
    <select name="hname" >
<?php
$query="select * from hostel ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
	echo "<option>".$row['Name']."</option>";
}
?>
</select><br>
	<input type="text" name="Qrooms" placeholder="Quantity of rooms"><br>
	<input type="text" name="roomtype" placeholder="type of rooms"><br>
  <label for='gen'>GENDER:</label><select name="gen" id='gen'>
  <option value='M'>M</option>
  <option value='F'>F</option>
  </select>
	
	<br><button  type="submit" name="submit5" >Create Rooms</button>
    </form>


<?php
}
?>
 <?php  
 if(isset($_POST["submit5"]))
 {
 $q=$_POST["Qrooms"];
$t=$_POST["roomtype"]; 
$g=$_POST["gen"];
$s= "SELECT *FROM hostel WHERE Name ='$_POST[hname]'";
$x=mysqli_query($conn, $s);
$r=mysqli_fetch_assoc($x);
if($_POST["gen"]!=$r["gender"]){
 ?>  
 <script>
 alert("enter correct gender");</script>


<?php
}
else{
	$num=100;
$index=$num;
 	$count=0;
 if($q<=$r["RPF"])
 {
  for($i=0;$i<$q;$i++){
	     $z=$index+$i;
		$sql = "INSERT INTO rooms (id,RoomNo,Name,Type,gender,teamid,Availability) VALUES ('', '$z','$_POST[hname]','$t','$g','','yes');";
		$res=mysqli_query($conn, $sql);
		
  }
 
 }
 
 
  else{
	  while($q>$r["RPF"]){
		 
		  
		  for($i=0;$i<$r["RPF"];$i++){
	     $z=$index+$i;
		$sql = "INSERT INTO rooms (id,RoomNo,Name,Type,gender,teamid,Availability) VALUES ('', '$z','$_POST[hname]','$t','$g','','yes');";
		$res=mysqli_query($conn, $sql);

		
  }
	 $q=$q-$i;	  
	 		 $index=intval($z/100);
$index++;
$index*=100;
	
	  }
	  
	    for($i=0;$i<$q;$i++){
	     $z=$index+$i;
	  $sql = "INSERT INTO rooms (id,RoomNo,Name,Type,gender,teamid,Availability) VALUES ('', '$z','$_POST[hname]','$t','$g','','yes');";
		$res=mysqli_query($conn, $sql);


		}
	  
	  
	  
  }
 }
 }?>
 
 
 <?php

if(isset($_POST["submit3"]))
{   
?><form align="center" action="adminhome.php" method="POST">
    <input type="text" name="hname" placeholder="HOSTEL NAME"><br>
	 <input type="text" name="roomn" placeholder="Room Number"><br>
	  <input type="text" name="type" placeholder="TYPE"><br>
	<br><button  type="submit" name="submit6" >Update</button>
    </form>


<?php
}
?>
<?php

if(isset($_POST["submit6"])){
	
$query="UPDATE $_POST[hname] SET Type= $_POST[type]  WHERE RoomNo=$_POST[roomn]";
		$condition=mysqli_query($conn, $query);

if ($condition) {
    echo "room updated successfully";
} else {
    echo "ERROR: Could not able to execute $condition. " . mysqli_error($conn);
}
	
	}


?>



<?php

if(isset($_POST["submit4"]))
{   
?><form align="center" action="adminhome.php" method="POST">
<select name="hname" >
<?php
$query="select * from hostel ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
	echo "<option>".$row['Name']."</option>";
}
?>
</select><br>
     
        <input type="date"  name="date" value="2018-07-22" min="2018-08-24" max="2018-12-31" />
		
		     <label for="id1">hrs</label>
        <select id="1" name="hrs" >
		   <?php
		   for($i=0;$i<24;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
	</select>
		     <label for="id2">min</label>
        <select id="id2" name="min">
		 <?php
		   for($i=0;$i<59;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
		
		
		</select>
		     <label for="id3">sec</label>
        <select id="id3" name="sec" >
		<?php
		   for($i=0;$i<59;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
		
		</select>
	<br><button  type="submit" name="submit7" >Set time</button>
    </form>
	
	
	


<?php
}
?>

<?php

if(isset($_POST["submit7"])){
	
$hrs=$_POST["hrs"];
$min=$_POST["min"];
$sec=$_POST["sec"];
	function addzero($x){
		return ($x < 10) ? "0". $x : $x;		
}
$time=addzero($hrs).":".addzero($min).":".addzero($sec);
	
	$query="UPDATE hostel SET portal_time=' $_POST[date] $time ' WHERE Name='$_POST[hname]'";
		$condition=mysqli_query($conn, $query);

	
	
	}


?>


<?php

if(isset($_POST["submit8"])){
	?><form align="center" action="adminhome.php" method="POST">
     <label for="start">Start</label>
        <input type="date" id="start" name="date" value="2018-07-22" min="2018-08-24" max="2018-12-31" />
		
		     <label for="id1">hrs</label>
        <select id="1" name="hrs" >
		   <?php
		   for($i=0;$i<24;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
	</select>
		     <label for="id2">min</label>
        <select id="id2" name="min">
		 <?php
		   for($i=0;$i<59;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
		
		
		</select>
		     <label for="id3">sec</label>
        <select id="id3" name="sec" >
		<?php
		   for($i=0;$i<59;$i++)
		 echo "  <option value='$i'>$i</option>";
	?>
		
		</select>
	<br><button  type="submit" name="submit9" >Set time</button>
    </form>
	
<?php
}
?> 
  
 
 
 
<?php

if(isset($_POST["submit9"])){
		
$hrs=$_POST["hrs"];
$min=$_POST["min"];
$sec=$_POST["sec"];
	function addzero($x){
		return ($x < 10) ? "0". $x : $x;		
}
$time=gmdate('F j, Y', strtotime($_POST["date"]+1))." ".addzero($hrs).":".addzero($min).":".addzero($sec);
$_SESSION["time"]=$time;

	
}
?>








