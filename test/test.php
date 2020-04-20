<?php
if (PHP_SAPI != 'cli') {
	echo "<pre>";
}

$strings = array(
	1 => 'Iwan akan menang pilkada',
	2 => 'Indro penista agama, tidak pantas jadi gubernur',
	3 => 'kamu sudah makan?',
	4 => 'Yusuf janji bawa indonesia lebih baik',
	5 => 'jalanan ke kampung utan rusak berat, tolong perbaiki dong',
);

require_once __DIR__ . '../../autoload.php';
$sentiment = new \PHPInsight\Sentiment();

$i=1;
foreach ($strings as $string) {

	$scores = $sentiment->score($string);
	$class = $sentiment->categorise($string);

	if (in_array("pos", $scores)) {
	    echo "Got positif";
	}

	echo "\nData: ".$i;
	echo "\nKalimat: <b>$string</b>\n";
	echo "Arah sentimen: <b>$class</b>, nilai: ";
	// var_dump($scores);
	foreach ($scores as $skor) {
		echo $skor;
	}
	echo "\n";
	$i++;
}
