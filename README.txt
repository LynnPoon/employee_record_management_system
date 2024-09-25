Open the terminal in Laragon, then run the commands below.

1. CREATE DATABASE employment_system;

2. USE employment_system;

3. Create the department table:

CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

4. Create the employee table:

CREATE TABLE employee (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    department_id INT,
    date_of_employment DATE NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    phone_num VARCHAR(20) NOT NULL,
    FOREIGN KEY (department_id) REFERENCES department(department_id)
);