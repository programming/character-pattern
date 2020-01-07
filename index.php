<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Character Pattern Generator</title>
</head>
<body>
<h1>Character Pattern Generator</h1>
<form action="" method="get">
<p><input maxlength="4" style="text-transform:uppercase" type="text" name="type" placeholder="CVCV" /> <input type="submit" value="Generate" /></p>
</form>

<?php

$type = $_GET['type'];

if ($type != '') {
$l['characters'] = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
$l['letters']    = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$l['consonants'] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
$l['vowels']     = array('a','e','i','o','u');
$l['numbers']    = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

preg_match_all('/./si', $type, $matches);

function type ($letter) {
	$letter = strtolower($letter);
	if     ($letter == 'l') return 'letters';
	elseif ($letter == 'c') return 'characters';
	elseif ($letter == 'd') return 'consonants';
	elseif ($letter == 'v') return 'vowels';
	elseif ($letter == 'n') return 'numbers';
}

$one   = type($matches[0][0]);
$two   = type($matches[0][1]);
$three = type($matches[0][2]);
$four  = type($matches[0][3]);

$output .= '<pre>';

if (strlen($type) == 4) {
	foreach ($l[$one] as $a)
		foreach ($l[$two] as $b)
			foreach ($l[$three] as $c)
				foreach ($l[$four] as $d)
					$output .= $a . $b . $c . $d ."\n";
} elseif (strlen($type) == 3) {
	foreach ($l[$one] as $a)
		foreach ($l[$two] as $b)
			foreach ($l[$three] as $c)
				$output .= $a . $b . $c ."\n";
} elseif (strlen($type) == 2) {
	foreach ($l[$one] as $a)
		foreach ($l[$two] as $b)
			$output .= $a . $b ."\n";
} elseif (strlen($type) == 1) {
	foreach ($l[$one] as $a)
		$output .= $a ."\n";
} else {
  $output .= '';
}

echo $output . '</pre>';
}
?>

</body>
</html>
