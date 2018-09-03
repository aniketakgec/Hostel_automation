<?php 
session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/clock.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1 >ROOM LOCKING WILL START IN</h1>
<h2 id="demo" align="center"></h2>

<script>

var countDownDate = new Date("<?php echo $_SESSION['time'];?>").getTime();


var x = setInterval(function() {

    
    var now = new Date().getTime();
    
    
    var distance = countDownDate - now;
    
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    
    document.getElementById("demo").innerHTML =  hours + "h "+":"+
    + minutes + "m " +":"+ seconds + "s ";
    
   
    if (distance <0) {
        window.location.href="portal.php";
        
    }
}, 1000);
</script>


</body>
</html>

            
    
    </body>
</html>
