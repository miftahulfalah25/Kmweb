<?php
include 'header.php';
include 'config.php';


	
	$id_kat=$_GET['id'];
	
	$sql = "SELECT * FROM kategori WHERE id_kat ='$id_kat'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	echo'<table border="1" width="100%">
	
	';
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<h2> Daftar Topik Pada kategori : '. $row['nama_kategori'] . ' </h2>';
	}
	
	$sql = "SELECT * FROM topik WHERE topik_kat='$id_kat'  AND status_top='1'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	
	echo' <th>daftar topik</th>
		<th>tanggal posting</th>
	';
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			
		//echo  '<h3>' . $row['subyek'] . '</h3>';
		//echo  '<h3><a href="daftar_post.php?id='. $row['id_topik'] .'">' . $row['subyek'] . '</a></h3>';
		echo'
		<tr>
		<td><h3><a href="daftar_post.php?id='. $row['id_topik'] .'">' . $row['subyek'] . '</a><h3></td>
		<td>'. $row['tanggal'] .'</td>
		</tr>'
		;
	}
	echo'</table>';

include 'footer.php';
?>