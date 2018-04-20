<?php
include 'header_admin.php';
include 'config.php';

if (isset($_GET['kat'])) {
	$id_kat = $_GET['kat'];
	$sql = "SELECT topik.*, kategori.nama_kategori  
	from topik 
	join kategori on topik.topik_kat=kategori.id_kat
	where topik.topik_kat='$id_kat'";
}
else {
	$sql = "SELECT topik.*, kategori.nama_kategori 
	from topik 
	join kategori on topik.topik_kat=kategori.id_kat";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<table border="1" width="100%">
	<tr>
		<th> Judul  </th>
		<th> Tanggal </th>
		<th> Kategori </th>
		<th> Pembuat Topik </th>
		<th> Aksi </th>
	</tr>
	<?php 
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?= $row['subyek'] ?></td>
			<td><?= $row['tanggal'] ?></td>
			<td><?= $row['nama_kategori'] ?></td>
			<td><?= $row['topik_by'] ?></td>

			<td> 
			<?php 
			if( $row['status_top']!=1){ ?>
			<a href="konfirmasi.php?jenis=topik&pk=<?= $row['id_topik'] ?>">Konfirmasi </a><br><br>
			
			<?php	
			}
			?>
			
			<a href="hapus.php?jenishapus=topik&pk=<?= $row['id_topik'] ?>">Hapus</a>
			</td>
		</tr>
		<?php	} ?>
	</table>

	<?php 
	include 'footer.php';
	?>
