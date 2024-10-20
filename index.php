<?php 
  require "data.php";
  require "function.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addEmployee($_POST); //$POST holds tha data when the form submitted
  }

  $employees = getEmployee();
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

  <!-- add search bar -->

  <form action="index.php" method="post" class="row g-3 mb-4">
    <div class="row align-items-center mb-3">
      <label for="fname" class="col-sm-2 col-form-label">First Name:</label>
      <div class="col-sm-4">
        <input type="text" id="fname" name="fname" class="form-control">
      </div>
      
      <label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
      <div class="col-sm-4">
        <input type="text" id="lname" name="lname" class="form-control">
      </div>
    </div>

    <div class="row align-items-center mb-3">
      <label for="position" class="col-sm-2 col-form-label">Position:</label>
      <div class="col-sm-4">
        <input type="text" id="position" name="position" class="form-control">
      </div>

      <label for="department" class="col-sm-2 col-form-label">Department:</label>
      <div class="col-sm-4">
        <select id="department" name="department" class="form-select">
          <option value="" selected>Please select</option>
          <?php
            // Loop through the department names and create an option for each one
            foreach ($departments as $department) {
              echo "<option value=\"$department\">$department</option>";
            }
          ?>
        </select>
      </div>
    </div>

    <div class="row align-items-center mb-3">
      <label for="date_of_employment" class="col-sm-2 col-form-label">Date of Employment:</label>
      <div class="col-sm-4">
        <input type="date" id="date_of_employment" name="date_of_employment" class="form-control" required>
      </div>

      <label for="salary" class="col-sm-2 col-form-label">Salary:</label>
      <div class="col-sm-4">
        <input type="number" id="salary" name="salary" step="0.01" min="0" class="form-control" required>
      </div>
    </div>

    <div class="row align-items-center mb-3">
      <label for="phone_num" class="col-sm-2 col-form-label">Phone Number:</label>
      <div class="col-sm-4">
        <input type="text" id="phone_num" name="phone_num" maxlength="20" class="form-control" required>
      </div>
    </div>

    <div class="d-flex justify-content-start">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

  <table class="table">
    <tbody>
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
    <?php foreach ($employees as $employee): ?>      
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
    </tbody>
  </table>
</body>