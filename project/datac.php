<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    if(isset($_POST['firstName'])){
        $firstName = $_POST['firstName'];
    }
    if(isset($_POST['lastName'])){
    $lastName = $_POST['lastName'];
    }
    if(isset($_POST['email'])){
    $email = $_POST['email'];
    }
    if(isset($_POST['address'])){
    $address = $_POST['address'];
    }
    
    if(isset($_POST['city'])){
        $city = $_POST['city'];
    }
    if(isset($_POST['state'])){
    $state = $_POST['state'];
    }
    if(isset($_POST['EventSelection'])){
    $eventSelection = $_POST['EventSelection'];
    }

    // Validate form data (you can add more validation as per your requirements)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($address) || empty($city) || empty($state) || empty($eventSelection)) {
        echo "Please fill in all the required fields.";
    } else {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'tests');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, email, address, city, state, eventSelection) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $firstName, $lastName, $email, $address, $city, $state, $eventSelection);
            if ($stmt->execute()) {
                echo "Registration successfully...";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
}
?>