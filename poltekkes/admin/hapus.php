<?php
include 'config.php';

$jenishapus=$_GET['jenishapus'];
$pk = $_GET['pk'];

switch ($jenishapus) {
	case 'user':
	$sql = "SELECT username FROM user WHERE  id_user = '$pk'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$username=$row['username'];
	$sql1 = "delete FROM login WHERE username = '$username'";
	
	$sql = "delete FROM user WHERE id_user = '$pk'";
	break;
	
	case 'topik':
	$sql = "delete FROM topik WHERE id_topik = '$pk'";
	$sql1 = "delete FROM post WHERE post_topik = '$pk'";
	break;
	
	case 'kategori':
	$sql = "SELECT id_topik FROM topik WHERE  topik_kat = '$pk'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$id_topik=$row['id_topik'];
	$sql1 = "delete FROM post WHERE post_topik = '$id_topik'";
	$sql2 = "delete FROM topik WHERE topik_kat = '$pk'";
	$stmt = $conn->prepare($sql2);
	$stmt->execute();
	$sql = "delete FROM kategori WHERE id_kat = '$pk'";
	
	
	
	
	
	break;

	default:
	$sql = "";
	break;
}
$stmt = $conn->prepare($sql1);
$stmt->execute();

$stmt = $conn->prepare($sql);
$stmt->execute();

echo '<script>alert("Berhasil dihapus")</script>';	
echo '<script>window.location="javascript:history.back()"</script>';
?>