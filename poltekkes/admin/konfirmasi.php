<?php
include 'config.php';

$jenis=$_GET['jenis'];
$pk = $_GET['pk'];

switch ($jenis) {
	case 'kategori':
	$sql = "UPDATE `kategori` SET `status_kat`='1' 
			WHERE `id_kat`='$pk'";					
	break ;
	
	case 'topik':
	$sql = "UPDATE `topik` SET `status_top`='1' 
			WHERE `id_topik`='$pk'";					
	break ;
	}
			
	$conn->query($sql);
	echo '<script>alert("Konfirmasi Berhasil ")</script>';	
	echo '<script>window.location="javascript:history.back()"</script>';

	
?>