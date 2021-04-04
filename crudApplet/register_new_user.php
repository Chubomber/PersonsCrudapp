<head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>


<?php
# This process inserts a record. There is no display.
# This process inserts a NEW USER into mes_person table

# 1. connect to database
require '../database/projectDatabase.php';
$pdo = Database::connect();

# 2. assign username / password info to variables
$role = $_POST['role'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$password = $_POST['password'];
$zip_code = $_POST['zip_code'];

$role = htmlspecialchars($role);
$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);
$password = htmlspecialchars($password);
$password_salt = MD5(microtime()); 
$password_hash = MD5($password . $password_salt);
$address = htmlspecialchars($address);
$address2 = htmlspecialchars($address2);
$city = htmlspecialchars($city);
$state = htmlspecialchars($state);
$zip_code = htmlspecialchars($zip_code);

// Check to make sure username is not there
$sql = "SELECT id FROM persons WHERE email=?";
$query=$pdo->prepare($sql);
$query->execute(Array($email));
$result = $query->fetch(PDO::FETCH_ASSOC);

if($result) { 
	echo "<p>Username $email already exists.</p><br>";
    echo "<a href='register.php'>Back to REGISTER</a>";
}
else {
	
	# 3. assign MySQL query code to a variable
	$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$query=$pdo->prepare($sql);
	$query->execute(Array("user",$fname,$lname, $email, $phone, $password_hash, $password_salt, $address, $address2, $city, $state, $zip_code));

	# 4. insert the message into the database
	
	echo "<p>Your info has been added. You can now log in.</p><br>";
	echo "<a href='login.php'>Back to LOGIN</a>"; 
	
}







