<?php 
  require "data.php";
  require "function.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    deleteEmployee($_POST['employee_id']);
    
  }

  header("Location: index.php");