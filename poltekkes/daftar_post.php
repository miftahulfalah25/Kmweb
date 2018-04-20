<?php
include 'header.php';
include 'config.php';
	
	
	$id_topik=$_GET['id'];
	
	$sql = "SELECT * FROM topik WHERE id_topik ='$id_topik'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	echo'<table border="1" width="100%">
	
	';
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<th colspan="3"><h2> Topik : '. $row['subyek'] . ' </h2></th>';
	}
	
	$sql = "SELECT * FROM post LEFT JOIN user ON user.username = post.post_by WHERE post_topik='$id_topik'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			
		//echo  '<h3>' . $row['subyek'] . '</h3>';
		$username = $row['username'];
		$sql1 = "SELECT * FROM user WHERE username ='$username'";
		$stmt1 = $conn->prepare($sql1);
		$stmt1->execute();
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		
		
		echo  '<tr> <td>
		<img src='.$row1['foto'].' style="width:80px;height:80px;">
		<h3> <a href="lihat_profil.php?id='.$row['username'].'">'.$row['username'].'</a></h3></td>';
		echo  '<td><h3>'.$row['konten'].'</h3>';
		if ($row['link_attachment'] != null) {
			echo "<br><a href='".$row['link_attachment']."' >Download Attachment </a>";
		}
		echo '</td>';
		if(isset($_SESSION['signed_in'])){
		if ($row['username']==$_SESSION['username']){
						
				echo' <td> <a href="form_edit_post.php?id='. $row['id_post'] .'&id_topik='.$id_topik.'">ubah pesan</a> ';	
				echo'  <a href="delete_post.php?id='. $row['id_post'] .'&id_topik='.$id_topik.'">hapus pesan</a> </td></tr>';				
			};
		}
		
		
	}
	
	echo'</table>';
		
	echo"<br/><br/><br/><br/>";
	if(isset($_SESSION['signed_in'])){
	$username=$_SESSION['username'];
	
	echo'
	<table>
	<form method="post" action="komentar.php" enctype="multipart/form-data">
	<input type="hidden" value="'.$id_topik.'" name="id_topik" />
	<tr>
		<td><label for="komentar">komentar</td>
		<td>:</td> 
		<td><textarea id="komentar" name="komentar" /></textarea></td>
		</label>
	</tr>
	<tr><td>Attachment</td><td>:</td><td><input type="file" name="attachment" /></td></tr>	
	<tr>
		<td></td> 
		<td></td> 
		<td><input type="submit" name="submit" value="kirim" /></td> 
	</tr>
	</table>	';
	}
	else{
		echo"Silahkan Login terlebih Dahulu untuk menambahkan komentar";
	}

include 'footer.php';
?>