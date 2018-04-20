<?php
	session_start();  
	include 'config.php';
	$username=$_POST['username_user'];
	$password=$_POST['password_user'];
	$encrypt=md5($password);
	
	$sql = 'SELECT * FROM login WHERE  username = :username AND password = :encrypt';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
          $stmt->bindParam(':encrypt', $encrypt, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			$_SESSION["username"] = $username;  
			$_SESSION['signed_in'] = true;
            header("location:daftar_kategori.php");  
          }  
          elseif(!$stmt->rowCount())
          {
			echo '<script>alert("Username atau Password Salah")</script>';	
			echo '<script>window.location="javascript:history.back()"</script>';
          }
?>