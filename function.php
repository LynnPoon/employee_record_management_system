<?php
  require "data.php";

function getEmployee(){
  global $db;
  $sql = "SELECT * FROM employee";
  $result = $db->query($sql);
  $employees = $result->fetchAll(PDO::FETCH_ASSOC); // Fetch all columns as an associative array

  return $employees;
}


function showEmployee($id){
  global $db;
  $sql = "SELECT * FROM employee WHERE employee_id = $id";
  $result = $db->query($sql);
  $employee = $result->fetch(PDO::FETCH_ASSOC); // Fetch only one row as an associative array

  return $employee;
}


function getDepartmentName($employee){
  global $db;
  $sql = "SELECT name FROM department WHERE department_id = " . $employee['department_id'];
  $result = $db->query($sql);
  $dept_name = $result->fetch(PDO::FETCH_COLUMN);
  return $dept_name;
}


function addEmployee($data){
  global $db;

  $dept_id_sql = "SELECT department_id FROM department WHERE name = :name";
  $dept_id_stmt = $db->prepare($dept_id_sql);
  $dept_id_stmt->execute(["name" => $data["department"]]);
  // Fetch the department_id from the query result
  $dept_result = $dept_id_stmt->fetch(PDO::FETCH_ASSOC);
  $dept_id = $dept_result['department_id'];

  $sql = "INSERT INTO employee (first_name, last_name, position, department_id, date_of_employment, salary, phone_num) VALUES (:first_name, :last_name, :position, :department_id, :date_of_employment, :salary, :phone_num)";
  $stmt = $db->prepare($sql);

  $stmt->execute([    
    
    "first_name" => $data["fname"],
    "last_name" => $data["lname"],
    "position" => $data["position"],
    "department_id" => $dept_id,
    "date_of_employment" => $data["date_of_employment"],
    "salary" => $data["salary"],
    "phone_num" => $data["phone_num"]
]);

  header("Location: index.php");
}


function updateEmployee($data){
  global $db;

  $dept_id_sql = "SELECT department_id FROM department WHERE name = :name";
  $dept_id_stmt = $db->prepare($dept_id_sql);
  $dept_id_stmt->execute(["name" => $data["department"]]);
  // Fetch the department_id from the query result
  $dept_result = $dept_id_stmt->fetch(PDO::FETCH_ASSOC);
  $dept_id = $dept_result['department_id'];

  $sql = "UPDATE employee SET 
                first_name = :first_name, 
                last_name = :last_name, 
                position = :position, 
                department_id = :department_id, 
                date_of_employment = :date_of_employment, 
                salary = :salary, 
                phone_num = :phone_num
            WHERE employee_id = :employee_id";

  $stmt = $db->prepare($sql);

  $stmt->execute([    
    "first_name" => $data["fname"],
    "last_name" => $data["lname"],
    "position" => $data["position"],
    "department_id" => $dept_id,
    "date_of_employment" => $data["date_of_employment"],
    "salary" => $data["salary"],
    "phone_num" => $data["phone_num"],
    "employee_id" => $data["employee_id"]
]);

  header("Location: index.php");

}


function deleteEmployee($id){
  global $db;

  $sql = "DELETE FROM employee WHERE employee_id = :id";
  $stmt = $db->prepare($sql);
  $stmt->execute(['id' => $id]);

  return $stmt->rowCount();
}