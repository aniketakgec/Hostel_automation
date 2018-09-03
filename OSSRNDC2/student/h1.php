<html>
<head>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>HOME</TITLE>
    <style>
        {
            box-sizing:border-box;
        }
        header
        {
			width:100%;
            background-color: black;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            color: white;
        }
		h2
		{
			font-size:30px;
			color:black;
		}
		input[type=text]
{
width:20%;
padding:15px;
margin:6px 0;
box-sizing:border-box;
border:2px solid lightgrey;
border-radius:3px;
box-shadow:12px 3px 15px grey;
-webkit-transition:0.5s;
transition:0.5s;
}
input[type=text]:focus
{
border:3px solid darkblue;
}
input[type=password]
{
width:20%;
padding:15px;
margin:6px 0;
box-sizing:border-box;
border:2px solid lightgrey;
border-radius:10px;
box-shadow:12px 3px 15px grey;
-webkit-transition:0.5s;
transition:0.5s;
}
input[type=password]:focus
{
border:3px solid darkblue;
}

H3
{
color:darkblue;
font-style:serif;
}
H1
{
font-family: 'sancreek';font-size: 50px;
text-shadow:4px 4px lightpink;
color:black;
}
input[type=submit]
{
width:9%;
padding:10px;
margin:4px 0;
box-sizing:border-box;
background-color:black;
color:white;
border:2px solid lightgrey;
border-radius:14px;
box-shadow:5px 5px 14px grey;
-webkit-transition:0.5s;
transition:0.5s;
}
input[type=submit]:focus
{
border:3px solid darkblue;
background-color:black;
color:white;
}
input[type=button]
{
width:10%;
padding:8px;
margin:2px 0;
box-sizing:border-box;
background-color:black;
color:white;
border:2px solid black;
border-radius:10px;
box-shadow:8px 8px 12px grey;
-webkit-transition:0.5s;
transition:0.5s;
}
input[type=button]:focus
{
border:3px solid darkblue;
background-color:white;
color:black;
}

    </style>

</head>
<body>
<header>
    <input type="button" value="ROOM LOCKING" ONCLICK="window.location.href='login2.php'"/>
    <input type="button" value="CHOOSE PARTNERS" ONCLICK="window.location.href='login1.php'"/>
    <input type="button" value="REGISTER" ONCLICK="window.location.href='registration.php'"/>
	<input type="button"value="BACK" ONCLICK="history.go(-1);"/>
</header>
</body>
</html>