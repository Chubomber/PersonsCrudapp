<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
echo "<h1>Create/add new message</h1>";
?>
<form method='post' action='insert_record.php'>
    message: <input name='msg' type='text' ><br />
    <input type="submit" value="Submit">
</form>