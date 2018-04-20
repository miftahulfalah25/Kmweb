<?php 
include 'header_admin.php';  

if(isset($_SESSION['isadmin'])){ ?>
	<h3>Selamat datang di halaman Admin</h3>
	
	<?php }
	else {
		session_start();  
		session_destroy(); 
		header("location:form_login.php"); 
	// echo "<script>window.location.href='admin/form_login_adm.php'</script>";
		exit();
	}
	?>
	<?php include 'footer.php'; ?>



