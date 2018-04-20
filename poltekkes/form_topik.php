<?php
include 'header.php';
if(isset($_SESSION['signed_in'])){
include 'config.php';
	$sql = "SELECT * FROM kategori where status_kat='1'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	
	echo '
	<table>
	<form method="post" action="topik.php" enctype="multipart/form-data">
    <tr>      
		<td>Subyek</td><td>:</td><td> <input type="text" name="topic_subject" /></td>
    </tr>
	<tr>	
		<td>Kategori</td><td>:</td>'; 
                 
    echo '<td><select name="kat_topik">';
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<option value="' . $row['id_kat'] . '">' . $row['nama_kategori'] . '</option>';
	}
        echo '</select></td>
	</tr>'; 
        echo '
	<tr>
		<td>Pesan</td><td>:</td><td> <textarea name="post_content" /></textarea></td>
	</tr>
	<tr><td>Attachment</td><td>:</td><td><input type="file" name="attachment" /></td></tr>	
    <tr><td></td>
		<td></td>
		<td><input type="submit" value="Create topic" /></td>
	</tr>
	</table>
          </form>';
}
else {
	echo"Silahkan Login terlebih Dahulu";
}
include 'footer.php';
?>