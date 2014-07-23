<?php 
// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', 'sqlpy' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'test', $link );
if ( !$db ) {
  die ( 'Error selecting database \'test\' : ' . mysql_error() );
}

$myFile = "testFile.txt";
$fh = fopen($myFile, 'w');

	$ch1 = 'unchecked';
	$ch2 = 'unchecked';
	$ch3 = 'unchecked';
	$ch4 = 'unchecked';
	$ch5 = 'unchecked';
	$ch6 = 'unchecked';
	$ch7 = 'unchecked';
	$ch8 = 'unchecked';	

if (isset($_POST['Submit1'])) {

	if (isset($_POST['ch1'])) {
		$ch1 = $_POST['ch1'];

		if ($ch1 == 'Adresseavisen') {
			$ch1 = "'Adresseavisen' \n";			
			fwrite($fh, $ch1);
		}
	}

	if (isset($_POST['ch2'])) {
		$ch2 = $_POST['ch2'];

		if ($ch2 == 'Avisa-ST') {
			$ch2 = "'Avisa-ST'  \n";
			fwrite($fh, $ch2);
		}
	}
	if (isset($_POST['ch3'])) {
		$ch3 = $_POST['ch3'];

		if ($ch3 == 'TronderBladet') {
			$ch3 = "'TronderBladet'  \n";
			fwrite($fh, $ch3);
		}
	}
	if (isset($_POST['ch4'])) {
		$ch4 = $_POST['ch4'];

		if ($ch4 == 'Hjem') {
			$ch4 = "'Hjem'  \n";
			fwrite($fh, $ch4);
		}
	}
	if (isset($_POST['ch5'])) {
		$ch5 = $_POST['ch5'];

		if ($ch5 == 'FosnaFolket') {
			$ch5 = "'FosnaFolket'  \n";
			fwrite($fh, $ch5);
		}
	}
	if (isset($_POST['ch6'])) {
		$ch6 = $_POST['ch6'];

		if ($ch6 == 'Uke-Adressa') {
			$ch6 = "'Uke-Adressa'  \n";
			fwrite($fh, $ch6);
		}
	}
	if (isset($_POST['ch7'])) {
		$ch7 = $_POST['ch7'];

		if ($ch7 == 'Verdalingen') {
			$ch7 = "'Verdalingen'  \n";
			fwrite($fh, $ch7);
		}
	}
	if (isset($_POST['ch8'])) {
		$ch8 = $_POST['ch8'];

		if ($ch8 == 'Nye-Uke-Adressa') {
			$ch8 = "'Nye-Uke-Adressa'  \n";
			fwrite($fh, $ch8);
		}
	}
}
fclose($fh);


// Close the connection
mysql_close($link);

include("pgap2.html")

?>
