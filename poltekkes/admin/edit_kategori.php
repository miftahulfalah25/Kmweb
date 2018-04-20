<?php
	include 'config.php';
	$id_kategori = $_POST['id_kat'];
	$nama_kategori = $_POST['nama_kategori'];
	$deskripsi = $_POST['deksripsi_kategori'];
	
	$sql = "UPDATE `kategori` SET `nama_kategori`='$nama_kategori' , `deskripsi`='$deskripsi'
			WHERE `id_kat`='$id_kategori'";					
			$conn->query($sql);
			
	echo '<script>alert("Berhasil Merubah kategori")</script>';	
	echo "<script>window.location.href='list_kategori.php'</script>";

	
?>