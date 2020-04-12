<?php
//Getting the value of the post parameters
$room = $_POST['room'];




// Checking the size of the string of the room name
if(strlen($room) > 30 or strlen($room)<2)
{
	$message="Please choose a name between 2-30 characters";
	echo '<script language ="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://192.168.64.2/chatroom/";';
	echo '</script>';
}



//Checking whether room name is alphanumeric
elseif (!ctype_alnum($room)) {
	# code...
	$message="Please choose an alphanumeric room name";
	echo '<script language ="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://192.168.64.2/chatroom/";';
	echo '</script>';
}

else{
	//When if everything is alright connect to the database

	include 'db_connect.php';

}

$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn,$sql);
if($result)
{
	if(mysqli_num_rows($result) > 0) 
	{
		$message="Please choose an other room. This room is already taken.";
		echo '<script language ="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://192.168.64.2/chatroom/";';
		echo '</script>';

	}

	else
	{
		$sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', CURRENT_TIMESTAMP);";
		if(mysqli_query($conn,$sql))
		{
			$message="Your Room is Ready Now and you can start chatting.";
				echo '<script language ="javascript">';
				echo 'alert("'.$message.'");';
				echo 'window.location="http://192.168.64.2/chatroom/rooms.php?roomname=' .$room. '";';
				echo '</script>';
		}
	}
}
else
{
	echo "Error: ".mysqli_error($conn);
}

?>