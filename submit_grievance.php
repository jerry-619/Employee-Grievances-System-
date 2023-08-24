<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $employeeName = $_POST['employee_name'];
  $grievanceText = $_POST['grievance_text'];
  $emial = $_POST['email'];
  $phone_number = $_POST['phone_number'];

  // Connect to MySQL database
  $connection = mysqli_connect('localhost', 'username', 'password', 'employee_grievance');

  // Check if connection is successful
  if (!$connection) {
    die('Database connection failed');
  }

  // Prepare and execute the INSERT query
  $query = "INSERT INTO grievances (employee_name, grievance_text, email, phone_number, status) 
            VALUES ('$employeeName', '$grievanceText','$emial', '$phone_number', 'Pending')";

if (mysqli_query($connection, $query)) {
    // Return the success message as JSON
    $response = array('success' => true, 'message' => 'Grievance submitted successfully');
    echo json_encode($response);
  } else {
    // Return the error message as JSON
    $response = array('success' => false, 'message' => 'Error: ' . mysqli_error($connection));
    echo json_encode($response);
  }

  // Close database connection
  mysqli_close($connection);
}
?>
