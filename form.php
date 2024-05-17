<?php
// Configuration
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Appointment booking form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $appointment_date = $_POST['appointment_date'];

    // Validate input
    if (empty($name) || empty($email) || empty($service) || empty($appointment_date)) {
        $error = "Please fill in all fields.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO appointments (name, email, service, appointment_date) VALUES ('$name', '$email', '$service', '$appointment_date')";
        if ($conn->query($sql) === TRUE) {
            $success = "Appointment booked successfully!";
        } else {
            $error = "Error: ". $sql. "<br>". $conn->error;
        }
    }
}

// Display form
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="service">Service:</label>
    <select id="service" name="service">
        <option value="Haircut">Haircut</option>
        <option value="Massage">Massage</option>
        <option value="Nail Care">Nail Care</option>
        <!-- Add more services as needed -->
    </select><br><br>
    <label for="appointment_date">Appointment Date:</label>
    <input type="date" id="appointment_date" name="appointment_date"><br><br>
    <input type="submit" name="submit" value="Book Appointment">
</form>

<?php
// Display error or success message
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
} elseif (isset($success)) {
    echo "<p style='color: green;'>$success</p>";
}
?>

<?php
// Close connection
$conn->close();
?>