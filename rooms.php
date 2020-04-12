<?php
//Get Parameters

$roomname = $_GET['roomname'];

//Connecting to the database
include 'db_connect.php';


//Execute sql to check whether room exists already or not

$sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'";

$result = mysqli_query($conn, $sql);
if($result)
{// Check if room exists
	if(mysqli_num_rows($result) ==0 )
	{
		$message="This room does not exist. Please try firt making this room.";
		echo '<script language ="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://192.168.64.2/chatroom/";';
		echo '</script>';
	}
//throw an error exception if can not connect
}
else
{ // catch exception error
	echo "Error : ". mysqli_error($conn);
}


?>

<!DOCTYPE html>
<html>
 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Welcome to LAMP Stack Chat Service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <link rel="icon" href="img/favicon.png">
    <title>Secertchatrooms.fi</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

        <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


        <style>
	          .bd-placeholder-img {
	            font-size: 1.125rem;
	            text-anchor: middle;
	            -webkit-user-select: none;
	            -moz-user-select: none;
	            -ms-user-select: none;
	            user-select: none;
	          }

	          @media (min-width: 768px) {
	            .bd-placeholder-img-lg {
	              font-size: 3.5rem;
	            }
	          }
	        </style>
	        <!-- Custom styles for this template -->
	        <link href="css/product.css" rel="stylesheet">
		<style>
body {
  margin: 0 auto;
  margin-top: 100px;
  max-width: 800px;
  padding: 0 40px;
  background-color: #c2fff8 ;
}
h2{
	color: #E74C3C;
}

.container {
  border: 2px solid #E74C3C;
  background-color: #F4D03F  ;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #28B463;
  background-color: #F5B7B1 ;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #BA4A00;
}

.time-left {
  float: left;
  color: #283747;
}
#submitmsg{
	 background-color: #ff5c6c;
}
.anyClass{
	height: 350px;
	overflow-y: scroll;
}
</style>
</head>
<body>

<h2>Chat Messages - <?php echo $roomname;?></h2>

<div class="container">
	<div class="anyClass">
	  
  </div>
</div>



<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Write Message"><br>
<button class="btn btn-dfault" name="submitmsg" id="submitmsg">SEND</button>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">

// Check for new messages every 1 second

setInterval(runFunction,1000);
function runFunction()
{
	$.post("htcontent.php",{room:'<?php echo $roomname ?>'},
		function(data, status)
		{
			document.getElementsByClassName('anyClass')[0].innerHTML = data;
		}


		)
}

	//Press enter key code credits to w3 schools
// Get the input field
var input = document.getElementById("usermsg");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});



	// if user submits the form then following Jquery will run
	
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
  $.post("postmsg.php", {text:clientmsg,room:'<?php echo $roomname ?>',ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
  function (data,status){
  	document.getElementsByClassName('anyClass')[0].innerHTML = data;});
  $("#usermsg").val("");
  return false; 
});
</script>

</body>
</html>
