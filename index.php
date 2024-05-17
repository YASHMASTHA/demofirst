<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $service = $conn->real_escape_string($_POST["service"]);
    $date = $conn->real_escape_string($_POST["date"]);

    $sql = "INSERT INTO `appointment`(`name`,`email`,`service`,`date`) VALUES ('$name','$email','$service','$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking Successful";
    } else {
        echo "Error: Booking unsuccessful. ". $conn->error;
    }
}

$conn->close();
?>