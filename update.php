<?php 
  require "data.php";
  require "function.php";

  // Get the employee_id from the query string
  if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $employee = showEmployee($employee_id);
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
<body class="container py-4">
  <h1 class="mb-4">Employee Records</h1>
  <form action="update.php" method="post" class="row g-3">
    <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">

    <div class="col-md-6">
      <label for="fname" class="form-label">First Name:</label>
      <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $employee['first_name']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="lname" class="form-label">Last Name:</label>
      <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $employee['last_name']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="position" class="form-label">Position:</label>
      <input type="text" id="position" name="position" class="form-control" value="<?php echo $employee['position']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="department" class="form-label">Department:</label>
      <select id="department" name="department" class="form-select" required>
        <option value="" disabled>Please select</option>
        <?php
          foreach ($departments as $department) {
            $selected = ($dept_name == $department) ? "selected" : "";
            echo "<option value=\"$department\" $selected>$department</option>";
          }
        ?>
      </select>
    </div>

    <div class="col-md-6">
      <label for="date_of_employment" class="form-label">Date of Employment:</label>
      <input type="date" id="date_of_employment" name="date_of_employment" class="form-control" value="<?php echo $employee['date_of_employment']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="salary" class="form-label">Salary:</label>
      <input type="number" id="salary" name="salary" class="form-control" step="0.01" min="0" value="<?php echo $employee['salary']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="phone_num" class="form-label">Phone Number:</label>
      <input type="text" id="phone_num" name="phone_num" class="form-control" maxlength="20" value="<?php echo $employee['phone_num']; ?>" required>
    </div>

    <div class="col-12 d-flex justify-content-between align-items-center">
      <form action="update.php" method="post" >  
        <div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="submit" class="btn btn-light ms-2" name="cancel">Cancel</button>
        </div>            
      </form>

      <form method="post" action="delete.php" class="d-inline">
        <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>

  </form>
</body>