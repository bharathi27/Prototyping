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
	

if (isset($_POST['Submit1'])) {

	if (isset($_POST['ch1'])) {
		$ch1 = $_POST['ch1'];

		if ($ch1 == 'Hjem') {
			$ch1 = "'Hjem' \n";			
			fwrite($fh, $ch1);
			
			 
		}
	}

	if (isset($_POST['ch2'])) {
		$ch2 = $_POST['ch2'];

		if ($ch2 == 'TronderBladet') {
			$ch2 = "'Tronder Bladet'  \n";
			fwrite($fh, $ch2);
		}
	}
}
fclose($fh);


// Close the connection
mysql_close($link);

include("pgap2.html")

?>
