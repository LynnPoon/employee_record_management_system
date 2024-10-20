<?php 
  require "data.php";
  require "function.php";

  $employeeList = [];
  
  $employeeList = getEmployee();
  
  if (isset($_POST['search_id']) && $_POST['search_id'] !== '') {
    $employee_id = $_POST['search_id'];
    $employee = showEmployee($employee_id);
    if($employee){
      $employeeList = [$employee]; //wrap the result in an array for table rendering
    }else{
      $employeeList = []; //when user typed an unvalid employee id
    }
  } else {
    $employeeList = getEmployee();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Poon Pak Nin">
    <meta name="email" content="poon0040@algonquinlive.com">
    <meta name="date" content="2024-05-13">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
    <title>HR System</title>
</head>
<body class="container py-4">
  <h1 class="mb-4">Employee Records</h1>

  <div class="d-flex justify-content-end mb-3">
    <form action="add.php" method="get">
      <button class="btn btn-link">Register Employee</button>
    </form>
  </div>

  <form action="index.php" method="post" class="mb-3">
    <div class="row align-items-end">
      <div class="col-auto">
        <label for="search_id" class="form-label">Search by Employee ID:</label>
      </div>
      <div class="col-auto">
        <input type="text" id="search_id" name="search_id" class="form-control" style="width: 200px;">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-light">Search</button>
      </div>
    </div>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Department ID</th>
        <th>Date of Employment</th>
        <th>Salary</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($employeeList) === 1): ?>
          <tr onclick="window.location='update.php?id=<?php echo $employeeList[0]['employee_id']; ?>'">
            <td><?php echo $employeeList[0]['employee_id']; ?></td>
            <td><?php echo $employeeList[0]['first_name']; ?></td>
            <td><?php echo $employeeList[0]['last_name']; ?></td>
            <td><?php echo $employeeList[0]['position']; ?></td>
            <td><?php echo $employeeList[0]['department_id']; ?></td>
            <td><?php echo $employeeList[0]['date_of_employment']; ?></td>
            <td><?php echo $employeeList[0]['salary']; ?></td>
            <td><?php echo $employeeList[0]['phone_num']; ?></td>
          </tr>
      <?php else: ?>        
        <?php foreach ($employeeList as $employee): ?>      
          <tr onclick="window.location='update.php?id=<?php echo $employee['employee_id']; ?>'">
            <td><?php echo $employee['employee_id']; ?></td>
            <td><?php echo $employee['first_name']; ?></td>
            <td><?php echo $employee['last_name']; ?></td>
            <td><?php echo $employee['position']; ?></td>
            <td><?php echo $employee['department_id']; ?></td>
            <td><?php echo $employee['date_of_employment']; ?></td>
            <td><?php echo $employee['salary']; ?></td>
            <td><?php echo $employee['phone_num']; ?></td>
          </tr>     
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>