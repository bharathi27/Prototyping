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
$fh = fopen($myFile, 'r');

$count =  count(file($myFile));

for($i = 0 ; $i < $count ; $i++)
{
	$theData[$i] = fgets($fh);
}
fclose($fh);




$data  = str_replace(' ', ' ', $theData[0]);




// Fetch the data
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $data " ;
$result = mysql_query( $query );


// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows´

$prefix = '';
echo "[\n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "UniqueId": "' . $row['UniqueId'] . '",' . "\n";
  echo '  "PageName": "' . $row['PageName'] . '",' . "\n";
echo '  "PageDirector": ' . $row['PageDirector'] . ',' . "\n";
echo '  "LayoutChampApp": ' . $row['LayoutChampApp'] . ',' . "\n";
  echo '  "ClassChamp": ' . $row['ClassChamp'] . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
// Close the connection
mysql_close($link);



?>
