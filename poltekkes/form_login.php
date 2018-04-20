<?php
include 'header.php';
	echo'
	<table>
		<form method="post" action="login.php" enctype="multipart/form-data">
		<tr>
			<td>Username </td>
			<td>:</td> 
			<td><input type="text" id="username" name="username_user"></td>
		</tr>
		<tr>
			<td>Password </td>
			<td>:</td> 
			<td><input type="password" id="password" name="password_user"></td>
			
		</tr>
		<tr>
		<td></td> 
		<td></td>
		<td><input type="submit" name="submit" value="Login" /></td>
		</tr>
	</table>';
include 'footer.php';
?>