<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


// database connection
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
	echo "$conn->connrct_error";
	die("Connection Failed : ". $conn->connect_error);
}
else{
	$stmt = $conn->prepare("insert into collageform(name, email, subject, message) values(?, ?, ?, ?)");
	$stmt->bind_param("ssss", $name, $email, $subject, $message);
	$execval = $stmt->execute();
    echo $execval;
	echo "Registration Succesfull...!";
	$stmt->close();
	$conn->close();
}
?>