<?php
	include 'config.php';
	
	$nama_kategori=$_POST['nama_kategori'];
	$deksripsi_kategori=$_POST['deksripsi_kategori'];
	
	
	
        
			$sql = "INSERT INTO kategori (nama_kategori,deskripsi)
						VALUES ('$nama_kategori','$deksripsi_kategori')";
			$conn->query($sql);
		
			echo '<script>alert("Berhasil Menambah Kategori")</script>';	
			echo "<script>window.location.href='form_topik.php'</script>";
?>