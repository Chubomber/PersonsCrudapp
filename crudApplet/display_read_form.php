<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
# connect
require '../database/projectDatabase.php';
$pdo = Database::connect();

# put the information for the chosen record into variable $results 
$id = $_GET['id'];
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();

?>
<h1>Read/view existing message</h1>
<form method='post' action='display_list.php'>
    Role: <input name='role' type='text' value='<?php echo $result['role']; ?>' disabled><br><br>
    ID: <input name='id' type='text' value='<?php echo $result['id']; ?>' disabled><br><br>
    First Name: <input name='fname' type='text' value='<?php echo $result['fname']; ?>' disabled><br><br>
    Last Name: <input name='lname' type='text' value='<?php echo $result['lname']; ?>' disabled><br><br>
    Email: <input name='email' type='text' value='<?php echo $result['email']; ?>' disabled><br><br>
    Address: <input name='address' type='text' value='<?php echo $result['address']; ?>' disabled><br><br>
    Address2: <input name='address2' type='text' value='<?php echo $result['address2']; ?>' disabled><br><br>
    City: <input name='city' type='text' value='<?php echo $result['city']; ?>' disabled><br><br>
    State: <input name='state' type='text' value='<?php echo $result['state']; ?>' disabled><br><br>
    Zip Code: <input name='zip_code' type='text' value='<?php echo $result['zip_code']; ?>' disabled><br><br>
    
    <button class="btn btn-lg btn-primary" type="submit"
                name="list">Back to Display List</button>
				</form>
