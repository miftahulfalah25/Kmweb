<?php 



$a = raita("stupid_spring_string", "stu");
print_r($a);


function build_skip_table($string)
{
	$len = strlen($string);

	for ($i = 0; $i < $len; $i++)
		$skip_table[$i] = $len;

	
	for ($i = 0; $i < $len - 1; $i++)
		$skip_table[$string[$i]] = $len - $i - 1;

	return $skip_table;
}

function raita($text, $pattern)
{
	

	$tsize = strlen($text);
	$psize = strlen($pattern);
	$skipt = build_skip_table($pattern);
	
	for ($i = 0; $i < $psize; $i++)
		$skipt[$i] = $psize;
	for ($i = 0; $i < $psize - 1; $i++)
		$skipt[$pattern[$i]] = $psize - $i - 1;

	$first = $pattern[0];
	
	if(($psize%2)==0)
				$imid=$psize/2;
				
			else
				$imid=($psize+1)/2;
	$mid = $pattern[$imid];
	$last = $pattern[$psize - 1];

	$i = 0;
	while ($i <= $tsize - $psize) {
		if ($text[$i + $psize - 1] == $last && $text[$i] == $first && $text[$i + $imid] == $mid) {
			
			for($j=$i+1;$j<($i + $psize - 1);$j++){
				for ($k=1; $k < $psize ; $k++) { 
					if($text[$j]==$pattern[$k])
					{
						return $i;
					}
				}
		}
		
	}
	if (isset($skipt[$text[$i + $psize - 1]])) {

		$i += $skipt[$text[$i + $psize - 1]];

	}
	else{
		$lompat = $psize;
		$i += $lompat;
	}
}

return -1;

}

?>

