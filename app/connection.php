<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "practice";
$dsn = "mysql:host=$host;dbname=$dbname";

$pdo = new PDO($dsn, $user ,$password);



// $stmt = $pdo->query("Select * From usertable");

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row['email']. " ".$row['username'];
// }


?>