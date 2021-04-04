<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
 echo "<h1>Messages List</h1>";
# connect
require '../database/projectDatabase.php';
$pdo = Database::connect();

# display link to "create" form
echo "<a href='display_create_form.php'>Create</a> ";
# dispaly link to "logout" form
echo "<a style='color:orange;' href='logout.php'>Logout</a> ";
echo "<br><br>";

# display all records
$sql = 'SELECT id, fname, lname FROM persons';
foreach ($pdo->query($sql) as $row) {
	$str = "";
	$str .= ' (' . $row['id'] . ') ' . $row['fname']. " ". $row['lname']. " ";
	$str .= "<a href='display_read_form.php?id=" . $row['id'] . "'>Read</a> ";
	$str .= "<a href='display_update_form.php?id=" . $row['id'] . "'>Update</a> ";
	$str .= "<a href='display_delete_form.php?id=" . $row['id'] . "'>Delete</a> ";
	$str .=  '<br>';
	echo $str;
}
echo '<br />';
