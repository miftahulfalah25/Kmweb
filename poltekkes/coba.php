<?php
	include 'config.php';
	
	$nama=$_POST['nama_user'];
	$nim=$_POST['nim_user'];
	
	
	
        
			$sql = "INSERT INTO daftar (nama,nim)
						VALUES ('$nama','$nim')";
			$conn->query($sql);
		
			echo '<script>alert("Pendaftaran Berhasil")</script>';	
			echo "<script>window.location.href='tampil.php'</script>";
		
        
?>