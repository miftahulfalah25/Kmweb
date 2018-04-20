<?php
// include 'header.php';


//------------------

// function raita($text, $pattern)
// {
// 	$skipt[256];

// 	$tsize = strlen($text);
// 	$psize = strlen($pattern);
// //	skipt = build_skip_table(pattern, psize);
// 	/* fill table with max jump */
// 	for ($i = 0; $i < 256; $i++)
// 		$skipt[$i] = $psize;
// 	for ($i = 0; $i < $psize - 1; $i++)
// 		$skipt[$pattern[$i]] = $psize - $i - 1;

// 	$first = $pattern[0];
// 	$mid = $pattern[$psize/2];
// 	$last = $pattern[$psize - 1];

// 	$i = 0;
// 	while ($i <= $tsize - $psize) {
// 		if ($text[$i + $psize - 1] == $last && $text[$i] == $first && $text[$i + $psize/2] == $mid) {
// 			// if (memcmp($pattern + 1, $text + i + 1, $psize - 2) == 0) {
// 			if (strcmp($pattern + 1, $text + $i + 1) == 0) {
// 				return $i;
// 			}
// 		}
// 		$i += $skipt[$text[$i + $psize - 1]];
// 	}

// 	return -1;

// }
// //------------------

// $a = raita("stupid_spring_string", "string");
// print_r($a);
// include 'footer.php';
?>
<?php
include 'header.php';
include 'config.php';
	
	$sql = "SELECT * FROM topik where `subyek` LIKE '%pat%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	echo "<h3>Pencarian dengan keyword : pat</h3><br>";
	echo "<table> <tr>";
	echo' <th>daftar topik</th>
		<th>tanggal posting</th></tr>
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