<?php
session_start();
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = $_SESSION['department'];
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
$table='faculty_'.$_SESSION['id'];
//get matched data from skills table
$query = $db->query("SELECT * FROM $table WHERE studentid LIKE '%".$searchTerm."%' ORDER BY studentid ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['studentid'];
}
//return json data
echo json_encode($data);
?>