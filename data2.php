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
	
	$theData[$i] = str_replace(' ', '', $theData[$i]);
	
}
fclose($fh);




// Fetch the data
if($count == 1)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0] ORDER BY LayoutDesk ";
$result = mysql_query( $query );
}
else if($count == 2)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1] ORDER BY LayoutDesk  ";
$result = mysql_query( $query );
}
else if($count == 3)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1]  or  PRODUCT =  $theData[2]  ORDER BY LayoutDesk  ";
$result = mysql_query( $query );
}
else if($count == 4)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1]  or  PRODUCT =  $theData[2]  or  PRODUCT =  $theData[3] ORDER BY LayoutDesk" ;
$result = mysql_query( $query );
}
else if($count == 5)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1]  or  PRODUCT =  $theData[2]  or  PRODUCT =  $theData[3]  or  PRODUCT =  $theData[4] ORDER BY LayoutDesk" ;
$result = mysql_query( $query );
}
else if($count == 6)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1] or  PRODUCT =  $theData[2]  or  PRODUCT =  $theData[3]  or  PRODUCT =  $theData[4] or PRODUCT =  $theData[5] ORDER BY LayoutDesk " ;
$result = mysql_query( $query );
}
else if($count == 7)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1] or  PRODUCT =  $theData[2]  or  PRODUCT =  $theData[3]  or  PRODUCT =  $theData[4]  or PRODUCT =  $theData[5] or PRODUCT =  $theData[6] ORDER BY LayoutDesk " ;
$result = mysql_query( $query );
}
else if($count == 8)
{
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[0]  or  PRODUCT =  $theData[1] or  PRODUCT =  $theData[2]  or  PRODUCT =  $theData[3]  or  PRODUCT =  $theData[4] or PRODUCT =  $theData[5]  or PRODUCT =  $theData[6]  or PRODUCT =  $theData[7] ORDER BY LayoutDesk " ;
$result = mysql_query( $query );
}
else { }


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
  echo '  "Product": "' . $row['Product'] . '",' . "\n";
echo '  "LayoutDesk": "' . $row['LayoutDesk'] . '",' . "\n";
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
