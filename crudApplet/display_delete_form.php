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
$sql = "SELECT * FROM messages WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();

?>
<h1>Delete existing message</h1>
<form method='post' action='delete_record.php?id=<?php echo $id ?>'>
    message: <input name='msg' type='text' value='<?php echo $result['message']; ?>' ><br />
    <input type="submit" value="Submit">
</form>