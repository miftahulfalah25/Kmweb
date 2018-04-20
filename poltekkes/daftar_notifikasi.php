<?php
include 'header.php';
include 'config.php';
	
	
	if(isset($_SESSION['signed_in'])){
	$username=$_SESSION['username'];
	$sql = "SELECT * FROM topik 
	INNER JOIN notifikasi ON topik.id_topik = notifikasi.notif_pos
	WHERE topik.topik_by ='$username'  AND topik.status_top='1'
	";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	
	echo " Postingan Anda
	<table border='1' width='100%'> 
		<th>Username</th>
		<th>Mengomentari</th>
		<th> Tanggal </th>
		";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		if($username != $row['notif_by'] ){
		echo " 
		
		<tr>
		<td><a href='lihat_profil.php?id=".$row['notif_by']." '>".$row['notif_by']."</a></td>
		<td><h3><a href='daftar_post.php?id=". $row['id_topik'] ."'>" . $row['subyek'] . "</a><h3></td>
		<td>". $row['tanggal'] ."</td>
		</tr>
		"; 
		}
		
		
	}
		echo'</table> <br> <br>';
		
		
	$sql = "
	

	SELECT * FROM post
	INNER JOIN notifikasi ON post.post_topik = notifikasi.notif_pos
	INNER JOIN topik ON post.post_topik = topik.id_topik
	WHERE post.post_by ='$username'
	GROUP BY post_topik, post_by,notif_by;

	
	";
	$stmt = $conn->prepare($sql);
	$stmt->execute();	
		
	echo" berkaitan dengan Anda 
	<table border='1' width='100%'> 
		<th>Username</th>
		<th>Mengomentari</th>
		<th> Tanggal </th>
		";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		if($username != $row['topik_by'] && $username != $row['notif_by'] ){
			
		echo " 
		<tr>
		<td><a href='lihat_profil.php?id=".$row['notif_by']." '>".$row['notif_by']."</a></td>
		<td><h3><a href='daftar_post.php?id=". $row['post_topik'] ."'>" . $row['subyek'] . "</a><h3></td>
		<td>". $row['tanggal'] ."</td>
		</tr>
		"; 
		
		}
		
	}
	echo'</table>';
	
	
	
	}
	
	else{
		echo"Silahkan Login terlebih Dahulu";
	}
	
include 'footer.php';
?>