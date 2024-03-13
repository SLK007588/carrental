<?php
    $city = $_POST['city'];
    $pickupDate = $_POST['pickupDate'];
    $returnDate = $_POST['returnDate'];
    $kilometers = $_POST['kilometers'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

	// Database connection
	$conn = new mysqli('localhost','root','','car');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(city, pickupDate, returnDate, kilometers, name, email, tel) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $city, $pickupDate, $returnDate, $kilometers, $name, $email, $tel);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>