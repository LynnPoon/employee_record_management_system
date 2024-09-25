<?php 
  require "data.php";
  require "function.php";

  // Get the employee_id from the query string
  if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $employee = showEmployee($employee_id); // Fetch employee data using the ID
    $dept_name = getDepartmentName($employee);
  }

  //var_dump($employee);


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST["cancel"]){
      header("Location: index.php");
      exit();
    }
    updateEmployee($_POST);
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
<body class="container px-4 py-4">
  <h1>Employee Records</h1>
  <form action="update.php" method="post">
  <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">
    <div>
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname" value="<?php echo $employee['first_name']; ?>">
      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname" value="<?php echo $employee['last_name']; ?>">
      <label for="position">Position:</label>
      <input type="text" id="position" name="position" value="<?php echo $employee["position"] ?>">
    
      <label for="department">Department:</label>
      <select id="department" name="department">
        <option value="" selected>Please select</option>
          <?php
          // Loop through the department names and create an option for each one
          foreach ($departments as $department) {
            $selected = ($dept_name == $department) ? "selected" : "";
            echo "<option value=\"$department\" $selected>$department</option>";
          }
          ?>
      </select>

      <label for="date_of_employment">Date of Employment:</label>
      <input type="date" id="date_of_employment" name="date_of_employment" value="<?php echo $employee['date_of_employment']; ?>" required>
      <br><br>

      <label for="salary">Salary:</label>
      <input type="number" id="salary" name="salary" step="0.01" min="0" value="<?php echo $employee["salary"]; ?>" required>
      <br><br>

      <label for="phone_num">Phone Number:</label>
      <input type="text" id="phone_num" name="phone_num" maxlength="20" value="<?php echo $employee['phone_num']; ?>" required>
      <br><br>

      <input type="submit" value="Update">
      <input type="submit" value="Cancel" name="cancel">
    </div>
  </form>
  <form method='post' action='delete.php' class="d-inline">
    <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">
    <button type='submit'>delete</button>
  </form>
</body>