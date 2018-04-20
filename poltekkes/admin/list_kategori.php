<?php
include 'header_admin.php';
include 'config.php';
	$sql = "SELECT kategori.*, (select group_concat(topik.subyek) 
		from topik 
		where topik.topik_kat=kategori.id_kat
		) as topik from kategori";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	?>
	<table border="1" width="100%">
	<tr>
	<th> Nama Kategori  </th>
	<th> Deskripsi </th>
	<th> Isi Kategori </th>
	<th> Aksi </th>
	</tr>
	<?php 
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
	<tr>
		<td><?= $row['nama_kategori'] ?></td>
		<td><?= $row['deskripsi'] ?></td>
		<td><ul><?php $i = 0; 
		$topik = explode(',',$row['topik']);
		while($i<count($topik)){
			echo '<li>'.$topik[$i].'</li>';
			$i++;
		} ?>
		</ul></td>
		
		<td>
			<?php 
			if( $row['status_kat']!=1){ ?>
			<a href="konfirmasi.php?jenis=kategori&pk=<?= $row['id_kat'] ?>">Konfirmasi </a><br><br>
			
			<?php	
			}
			?>
			
			<a href="form_edit_kategori.php?kat=<?= $row['id_kat'] ?>"> Kelola Kategori </a><br><br> 
			<a href="hapus.php?jenishapus=kategori&pk=<?= $row['id_kat'] ?>">Hapus </a>
			
		</td>
	</tr>
<?php	} ?>
	</table>

<?php 
include 'footer.php';
?>
