Open the terminal in Laragon, then run the commands below. Use mysql -u root -p to login

1. CREATE DATABASE hr_system;

2. USE hr_system;

3. Create the department table:

CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO department (department_id, name) VALUES
(1, 'Human Resources'),
(2, 'Finance'),
(3, 'Marketing'),
(4, 'Sales'),
(5, 'Information Technology');


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