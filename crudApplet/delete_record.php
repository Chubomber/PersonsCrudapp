<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
# 1. connect to database
require '../database/projectDatabase.php';
$pdo = Database::connect();

# 2. assign user info to a variable

$id = $_GET['id'];

# 3. assign MySQL query code to a variable
$sql = "DELETE FROM persons WHERE id=$id";

# 4. update the message in the database
$pdo->query($sql); # execute the query
echo "<p>Your info has been deleted</p><br>";
echo "<a href='display_list.php'>Back to list</a>";