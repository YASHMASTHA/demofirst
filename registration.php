<?php
$conn = mysqli_connect('localhost', 'root', '', 'form', 3306);

if ($conn) {

echo "Database connected successfully•";

｝else{ 

echo"database conection unsucessful";
echo mysqli_connect_error($conn);
}
}
?>