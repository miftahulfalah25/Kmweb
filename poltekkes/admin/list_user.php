<?php
include 'header_admin.php';
include 'config.php';
	$sql = "SELECT * FROM user";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	?>
	<table border="1" width="100%">
	<tr>
	<th> Nama  </th>
	<th> NIP </th>
	<th> Tanggal Lahir </th>
	<th> Jabatan </th>
	<th> Golongan </th>
	<th> Pendidikan </th>
	<th> Ijazah </th>
	<th> Kontak </th>
	<th> Username </th>
	<th> Aksi </th>
	</tr>
	<?php 
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
	<tr>
		<td><?= $row['nama'] ?></td>
		<td><?= $row['nip'] ?></td>
		<td><?= $row['tanggal_lahir'] ?></td>
		<td><?= $row['jabatan'] ?></td>
		<td><?= $row['golongan'] ?></td>
		<td><?= $row['pendidikan'] ?></td>
		<td><?= $row['ijazah'] ?></td>
		<td><?= $row['kontak'] ?></td>
		<td><?= $row['username'] ?></td>
		<td><a href="hapus.php?jenishapus=user&pk=<?= $row['id_user'] ?>">Hapus</a></td>
	</tr>
<?php	} ?>
	</table>

<?php 
include 'footer.php';
?>
