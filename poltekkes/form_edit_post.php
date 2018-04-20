<?php
include 'header.php';

include 'config.php';

$id_post=$_GET['id'];
$id_topik=$_GET['id_topik'];

	$sql = "SELECT * FROM post WHERE id_post ='$id_post'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	echo'
	
	<table>
	<form method="post" action="edit_post.php">
    <tr>      
		<td>konten</td><td>:</td><td> <textarea id="konten" name="konten" /> '. $row['konten'] .'</textarea></td>
    </tr>
	<input type="hidden" name="id_post" value='. $id_post .'>
	<input type="hidden" name="id_topik" value='. $id_topik .'>
	<tr><td></td>
		<td></td>
		<td><input type="submit" value="ubah" /></td>
	</tr>
	</table>
    
	
	</form>';
	
	
	
	};



include 'footer.php';
?>