<?php
session_start();
include('db.php');

if (isset($_POST['login'])) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if(empty($username)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user = '$username'");
		
        if ($stmt->execute()){
            $row = $stmt->fetch();

            if($row['user'] === $username && password_verify($password, $row['pass'])) {
                $_SESSION['user'] = $row['user'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorrect username or password");
		        exit();
			}
        }else{
			header("Location: index.php?error=Incorrect username or password");
	        exit();
		}
	}
}else{
	header("Location: index.php");
	exit();
}
?>
