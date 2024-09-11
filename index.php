<?php
// print_r(PDO::getAvailableDrivers());


$host = "localhost";
$user = "root";
$password = "";
$dbname = "aguadb";
//data source name
$db = "mysql:host=$host;dbname=$dbname";

$connection = new PDO ($db,$user,$password);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

// $statement = $connection->query("SELECT * FROM students_table");
// while($row = $statement->fetch(PDO:: FETCH_OBJ)){
//     echo $row'first_name'."".$row'last_name'."","<br>";
// }


$gender = "Male";

//Posotional Parameters
$sql = "SELECT * FROM students_table WHERE gender = :gender";
$statement = $connection->prepare ($sql);
$statement->execute(['gender' => $gender]);
$users = $statement->fetchAll();
foreach($users as $user){
    echo $user->first_name." ".$user->last_name."-".$user->gender.""."<br>";
}
