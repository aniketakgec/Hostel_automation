<?php
include_once 'connection.php';
include('h.php');
if(!isset($_SESSION['sid'])) 
{
   header("Location:login1.php");
}
$count=0;
$q="select * from rooms where Name='$_SESSION[name]' and Type= '$_SESSION[type]' and gender='$_SESSION[gender]'";
$res=mysqli_query($conn,$q);
echo "<form action='room_portal1.php' method='POST'>";
echo "<table cellpadding='4' cellspacing='5' border='1' align='center' >";
$i=1;
while($row=mysqli_fetch_array($res))
{
echo "<tr>"."<th>S.no</th>"."<th>RoomNo</th>"."<th>Lock room</th>"."</tr>"."<tr>"."<td>$i</td>"."<td>$row[RoomNo]</td>"."<td><button type='submit' name='submit$i' value='$row[RoomNo]'>LOCK</button></td>"."</tr>";
$i++;
$count++;	
}
echo"</table>";	
echo "</form>";

for($i=1;$i<=$count;$i++)
{  
 if(isset($_POST["submit$i"]))
 {
  $x=$_POST["submit$i"];
  $query="select * from login where leader='$sid'";
  $data=mysqli_query($conn,$query);
  $result=mysqli_fetch_assoc($data);
   if($result)
    {
     $tid=$result['TID'];
	 $_SESSION['tid']=$tid;
	 $sql1 = "INSERT INTO team_id (id,team_id,RoomNo) VALUES ('', '$tid','$x');";
	 $res=mysqli_query($conn, $sql1); 
	  if($sql1)
	   {
	    $sql="select * from rooms where RoomNo='$x' ";
        $r=mysqli_query($conn,$sql);
          if($r)
            {
	         $sqli="UPDATE rooms SET availability='NO' where RoomNo='$x' AND Name='$_SESSION[name]'";
             $re=mysqli_query($conn,$sqli);
               if($re)
                {
	             $query="update student_registration set room_choosen='YES' where student_no='$sid'";
	             $data=mysqli_query($conn,$query);
				 $email=$_SESSION['email'];
require_once ("PHPMailer_5.2.0/class.phpmailer.php");
$mail=new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug=1;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host="smtp.gmail.com";
$mail->Port=465;
$mail->IsHTML(True);
$mail->Username='aniketpandey353@gmail.com';
$mail->Password='8127436649';
$mail->SetFrom("aniketpandey353@gmail.com");
$mail->Subject="Hello aniket";
$mail->Body="you have alloted ".$x;
$mail->AddAddress($email);
if(!$mail->Send()){
	echo "mail error".$mail->ErrorInfo;
}
else{
	echo "mail successfully sent";
}
                }
               else
                {
	             echo mysqli_error($conn);
                }
              echo "ROOM NO ".$x." IS ALLOTED TO ".$sid;
              session_destroy();
              session_unset();
              header("location:login1.php");
            }
          else
	        echo mysqli_error($conn);
        }
		else
			echo mysqli_error($conn);
    }
 }
}
?>
