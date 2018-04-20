<?php
function brute_force_matching($pattern, $subject) 
{
    $subject = strtolower($subject);
    $pattern = strtolower($pattern);
    //$pattern = implode(explode(" ",$pattern));
    
	$n = strlen($subject);
	$m = strlen($pattern);
 
	for ($i = 0; $i < $n-$m; $i++) {
		$j = 0;
		while ($j < $m && $subject[$i+$j] == $pattern[$j]) {
			$j++;
		}
		if ($j == $m) return $i;
	}
	return -1;
}

?>