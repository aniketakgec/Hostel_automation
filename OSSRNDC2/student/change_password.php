<?php
include('h.php');
include('connection.php');
if(!isset($_SESSION['sid'])){
   header("Location:login1.php");
}
echo "<br>";
if (isset($_POST['submit'])) {
    $oldpassword = $_POST['p1'];
	$oldpassword = md5($oldpassword);
    $newpassword = $_POST['p2'];
	$newpassword = md5($newpassword);
    $repeatnewpassword = $_POST['p3'];
	$repeatnewpassword = md5($repeatnewpassword);
    if ($oldpassword == $password) {
        if ($newpassword == $repeatnewpassword) {
            $query = "update student_registration set password='$newpassword' where student_no='$sid';";
            $data = mysqli_query($conn, $query);
            if ($data) {

                session_destroy();
                session_unset();
                header("location:login1.php");
                echo "records updated";

                $_SESSION['password'] = $newpassword;
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo "passwords mismatched";
        }
    } else {
        echo "wrong password";
    }
}

?>


<html>
<form action="" method="post">
    <h3>OLD PASSWORD</h3><input type="password" NAME="p1"><BR><BR>
    <h3>NEW PASSWORD</h3><input type="PASSWORD" NAME="p2"><br><br>
    <h3>REPEAT NEW PASSWORD</h3><input type="PASSWORD" NAME="p3"><br><br>
    <input type="submit" name="submit" value="CHANGE PASSWORD">
</form>
</body>
</html>
