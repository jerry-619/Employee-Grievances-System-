<?php
// Connect to MySQL database
$connection = mysqli_connect('localhost', 'username', 'password', 'employee_grievance');

// Check if connection is successful
if (!$connection) {
  die('Database connection failed');
}

// Retrieve the list of grievances
$query = "SELECT * FROM grievances";
$result = mysqli_query($connection, $query);

// Check if there are any grievances
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "Grievance ID: " . $row['id'] . "<br/>"."<br>";
    echo "Employee Name: " . $row['employee_name'] . "<br/>"."<br>";
    echo "Email: " . $row['email'] . "<br/>"."<br>";
    echo "Phone Number: " . $row['phone_number'] . "<br/>"."<br>";
    echo "Grievance: " . $row['grievance_text'] . "<br/>"."<br>";
    echo "Status: " . $row['status'] . "<br/>"."<br>";
    echo "Submitted At: " . $row['created_at'] . "<br/>";
    echo "<hr/>";
  }
} else {
  echo "No grievances found";
}

// Close database connection
mysqli_close($connection);
?>
