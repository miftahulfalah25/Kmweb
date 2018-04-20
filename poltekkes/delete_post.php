<?php
include 'config.php';
$pk = $_GET['id'];
$sql = "delete FROM post WHERE id_post = '$pk'";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<script>alert("Berhasil dihapus")</script>';	
echo '<script>window.location="javascript:history.back()"</script>';
?>