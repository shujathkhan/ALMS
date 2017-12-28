<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'it';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM faculty_10000 WHERE studentid LIKE '%".$searchTerm."%' ORDER BY studentid ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['studentid'];
}
//return json data
echo json_encode($data);
?>