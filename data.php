<?php 

  $dsn = "mysql:host=localhost;dbname=hr_system"; //database sourse
  $username = "root";
  $password = "mysql4Lynn!";

  try{
    $db = new PDO($dsn, $username, $password);
  }
  catch(PDOException $e){
    $error_message = $e->getMessage();
    echo "Error connecting to databse: {$error_message}";
    exit();
  }

 
 // Fetch departments
  $sql = "SELECT * FROM department";
  $stmt = $db->query($sql);
  $departments = $stmt->fetchAll(PDO::FETCH_COLUMN, 1); // Fetching the first column, which is 'name'