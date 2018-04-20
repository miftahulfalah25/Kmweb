<?php 
include 'header_admin.php';  

if(isset($_SESSION['isadmin'])){ ?>
	<h3>Selamat datang di halaman Admin</h3>
	
<?php }
else {
	echo "<script>window.location.href='form_login_adm.php'</script>";
	exit();
}
?>
<?php include 'footer.php'; ?>



