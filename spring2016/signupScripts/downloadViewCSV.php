<?php 

include_once 'DBHelperClass.php';

// create helper
$db = new DBHelperClass();

// get participants
$participants = $db->getParticipants();
//echo '<pre>'.print_r($participants, true).'</pre>'; die();

// get mentors
$mentors = $db->getMentors();
//echo '<pre>'.print_r($mentors, true).'</pre>'; die();

// close helper
$db->close();




// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

/*
// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

// fetch the data
mysql_connect('localhost', 'username', 'password');
mysql_select_db('database');
$rows = mysql_query('SELECT field1,field2,field3 FROM table');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) 
	fputcsv($output, $row);
*/

fputcsv($output, array("Participants"));

$headers = true;
foreach($participants as $personKey => $person) {
	if($headers) {
		$columns = array();
		foreach($person as $column => $value)
			$columns[] = $column;
		fputcsv($output, $columns);
		$headers = false;
	}
	
	$row = array();
	foreach($person as $key => $value) {
		$row[] = $value;
	}
	fputcsv($output, $row);
}




fputcsv($output, array("Mentors"));
$headers = true;
foreach($mentors as $personKey => $person) {
	if($headers) {
		$columns = array();
		foreach($person as $column => $value)
			$columns[] = $column;
		fputcsv($output, $columns);
		$headers = false;
	}
	
	$row = array();
	foreach($person as $key => $value) {
		$row[] = $value;
	}
	fputcsv($output, $row);
}






?>