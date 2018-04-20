<?php
	session_start();  
	include 'config.php';
	$username=$_POST['username_admin'];
	$password=$_POST['password_admin'];
	$encrypt=md5($password);
	
	$sql = 'SELECT * FROM user_admin WHERE  username = :username AND password = :encrypt';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
          $stmt->bindParam(':encrypt', $encrypt, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			$_SESSION["username"] = $username;  
			$_SESSION['signed_in'] = true;
			$_SESSION['isadmin'] = true;
            header("location:home_admin.php");  
          }  
          elseif(!$stmt->rowCount())
          {
			echo '<script>alert("Username atau Password Salah")</script>';	
			echo '<script>window.location="javascript:history.back()"</script>';
          }
?>