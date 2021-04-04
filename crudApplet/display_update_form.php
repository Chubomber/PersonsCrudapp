<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}

# connect
require '../database/projectDatabase.php';
$pdo = Database::connect();
 
 if($_POST) {

        $role = $_POST['role'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];

        $role = htmlspecialchars($role);
        $fname = htmlspecialchars($fname);
        $lname = htmlspecialchars($lname);
        $email = htmlspecialchars($email);
        $address = htmlspecialchars($address);
        $address2 = htmlspecialchars($address2);
        $city = htmlspecialchars($city);
        $state = htmlspecialchars($state);
        $zip_code = htmlspecialchars($zip_code);
		
# put the information for the chosen record into variable $results 
$id = $_GET['id'];
  $sql = "SELECT id FROM persons WHERE email =? ";
        $query=$pdo->prepare($sql);
        $query->execute(Array($email));
        $result=$query->fetch(PDO::FETCH_ASSOC);
		
$sql = "SELECT email FROM persons WHERE id=?";
$query=$pdo->prepare($sql);
$query->execute(Array($email));
$result = $query->fetch(PDO::FETCH_ASSOC);

$email_check = $result2['email'];


        if($result != '' && ($email != $result2['email'])) {
            echo "<p> Email $email is already in use!</p><br>";
        }

        //Email check gotten from: https://www.w3schools.com/php/php_form_url_email.asp
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            echo "<p>ERROR: Email is not formatted properly </p><br>";
        }

        elseif($email == '') {
            echo "<p> Email field has been left empty!</p><br>";
        }

        else {

            $_SESSION['update_post_array'] = $_POST;

            //ERROR: Trying to pass the id like this dosnt work
            header('Location: update_record.php?id= '. $id);
        }

    }
	
	 $id = $_GET['id'];
    $sql = "SELECT * FROM persons WHERE id=" . $id;
    $query=$pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch();
}
?>
<h1>Update existing message</h1>
<form method='post' action='update_record.php?id=<?php echo $id ?>'>
    message: <input name='msg' type='text' value='<?php echo $result['message']; ?>' ><br />
    <input type="submit" value="Submit">
</form>