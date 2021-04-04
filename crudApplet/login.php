<?php
    // ini_set("display_errors", 1);
    // error_reporting(E_ALL);
    // error reporting(0);
    session_start(); 
	
		$errMsg=''; 
		// initialize message to display on HTML form
		if (isset($_POST['login']) 
			&& !empty($_POST['email']) 
			&& !empty($_POST['password'])) {
				echo "<p>hello</p>";
				$_POST['email'] = htmlspecialchars($_POST['email']);
				$_POST['password'] = htmlspecialchars($_POST['password']);
				 
				 $email = $_POST['email'];
			# prevent HTML/CSS/JS injection
			// $_POST['username'] = htmlspecialchars($_POST['username']); 
			// $_POST['password'] = htmlspecialchars($_POST['password']);
			
		
			# check "back door" login
			
				
				# check database for legit username 
				require '../database/projectDatabase.php';
				$pdo = Database::connect();
				
				$sql = "SELECT password_salt FROM persons WHERE email=? "; 
				  
				$query=$pdo->prepare($sql);
				$query->execute(Array($email));
				$result = $query->fetch(PDO::FETCH_ASSOC);
				
				$password_salt = $result ["password_salt"];
				$password_hash = MD5($_POST['password'].$password_salt);
				
				$sql = "SELECT id, role, email, password_hash, password_salt FROM persons"
				. " WHERE email =? "
				. " AND password_hash =? "
				. " AND password_salt =? "
				. " LIMIT 1";
				
				$query=$pdo->prepare($sql);


				$query->execute(Array($_POST['email'], $password_hash, $password_salt));
				$result=$query->fetch(PDO::FETCH_ASSOC);
				($result);
				
				# if user typed legit username, verify SALTED password
				
        if($result) {
			
            $_SESSION['email'] = $result['email'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['id'] = $result['id'];
            header("Location: display_list.php");
        }

        else {
            $errMsg="Login Failure: wrong username/password";
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Crud Applet with Login</title>
		<meta charset="utf-8" />
		<!--
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
		-->
	</head>

	<body>
		
		
		<div class="container">
			<h1>Crud Applet with Login</h1>
		    <h2>Login</h2> 
		
			<form action="" method="post">
				
				<input type="text" class="form-control" 
				name="email" placeholder="admin@admin.com" 
				required autofocus /><br />
				
				<input type="password" class="form-control"
				name="password" placeholder="admin" required /><br />
				
				<button class="btn btn-lg btn-primary btn-block" 
				type="submit" name="login">Login</button>
				
				<button class="btn btn-lg btn-secondary btn-block" 
				onclick="window.location.href = 'register.php';";
				type="button" name="join">Join</button>
				
				<p style="color: red;"><?php echo $errMsg; ?></p>
			   
			</form>

		</div> 

	</body>
	
</html>