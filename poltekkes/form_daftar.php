<?php
include 'header.php';
echo '
	<table>
	<form method="post" action="daftar.php" enctype="multipart/form-data">
	<tr>
		<td>Nama</td><td>:</td> <td><input type="text" id="nama" name="nama_user"></td>
	</tr>
	<tr>
		<td> Nip</td><td>:</td> <td><input type="text" id="nip" name="nip_user"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>:</td> <td><input type="date" id="tanggal_lahir" name="tanggal_lahir_user"></td>
	</tr>
	<tr>
		<td>Jabatan</td><td>:</td> <td><input type="text" id="jabatan" name="jabatan_user"></td>
	</tr>
	<tr>
		<td>Golongan</td><td>:</td> <td><input type="text" id="golongan" name="golongan_user"></td>
	</tr>
	<tr>
		<td>Pendidikan</td><td>:</td> <td><input type="text" id="pendidikan" name="pendidikan_user"></td>
	</tr>
	<tr>
		<td>Ijazah</td><td>:</td> <td><input type="text" id="ijazah" name="ijazah_user"></td>
	</tr>
	<tr>
		<td>Kontak</td><td>:</td> <td><input type="text" id="kontak" name="kontak_user"></td>
	</tr>
	<tr>
		<td>Username</td><td>:</td> <td><input type="text" id="username" name="username_user"></td>
	</tr>
	<tr>
		<td>Password</td><td>:</td> <td><input type="password" id="password" name="password_user"></td>
	</tr>
	<tr>
		<td>Email</td><td>:</td> <td><input type="email" id="email" name="email_user"></td>
	</tr>
	<tr>
		<td>upload foto profil (jpg/png)</td><td>:</td> <td><input type="file" name="attachment" /></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="Daftar" /> <input type="reset" value="Reset" /></td>
	</tr>
	</table>
';

include 'footer.php';
?>