<?php
	include 'config.php';
	session_start();
	$konten=$_POST['konten'];
	$id_post=$_POST['id_post'];
	$id_topik=$_POST['id_topik'];
	
	
	$sql = "UPDATE `post` SET `konten`='$konten'
			WHERE `id_post`='$id_post'";					
			$conn->query($sql);
			
	echo '<script>alert("Berhasil Merubah pesan")</script>';	
	echo "<script>window.location.href='daftar_post.php?id=$id_topik'</script>";

?>