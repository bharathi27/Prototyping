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
$prefix = '';
echo "[\n";
for($i=0;$i<$count;$i=$i+2)
{
$j = $i + 1;
$query = "  SELECT *   FROM sol3  WHERE  PRODUCT = $theData[$i] and LAYOUTDESK= $theData[$j]  ORDER BY LayoutDesk ";
$result = mysql_query( $query );
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
}
echo "\n]";

// Close the connection
mysql_close($link);
