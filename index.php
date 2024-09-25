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
<body class="container px-4 py-4">
  <h1>Employee Records</h1>
  <form action="index.php" method="post">
    <div>
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname">
      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname">
      <label for="position">Position:</label>
      <input type="text" id="position" name="position">
    
      <label for="department">Department:</label>
      <select id="department" name="department">
        <option value="" selected>Please select</option>
          <?php
          // Loop through the department names and create an option for each one
          foreach ($departments as $department) {
              echo "<option value=\"$department\">$department</option>";
          }
          ?>
      </select>
      
      <label for="date_of_employment">Date of Employment:</label>
      <input type="date" id="date_of_employment" name="date_of_employment" required>
      <br><br>

      <label for="salary">Salary:</label>
      <input type="number" id="salary" name="salary" step="0.01" min="0" required>
      <br><br>

      <label for="phone_num">Phone Number:</label>
      <input type="text" id="phone_num" name="phone_num" maxlength="20" required>
      <br><br>

      <input type="submit" value="Submit">
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