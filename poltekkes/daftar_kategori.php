<?php
include 'header.php';
include 'config.php';
	$sql = "SELECT * FROM kategori where status_kat='1'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	echo'<table border="1" width="100%">
	<th> Nama Kategori </th>
	<th> Deskripsi </th>
	';
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					 
		//echo  '<h3><a href="daftar_topik.php?id='. $row['id_kat'] .'">' . $row['nama_kategori'] . '</a></h3>' . $row['deskripsi'];
	
	
	echo  '
	
	<tr>
	<td><h3><a href="daftar_topik.php?id='. $row['id_kat'] .'">' . $row['nama_kategori'] . '</a></h3></td>
	
	<td>' . $row['deskripsi'].'</td>
	</tr>
	
	';
	}
	echo'</table>';
	
include 'footer.php';
?>