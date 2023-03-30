<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $name = $_POST["name"];
    $matricNo = $_POST["matric-no"];
    $currentAddress = $_POST["current-address"];
    $homeAddress = $_POST["home-address"];
    $email = $_POST["email"];
    $mobilePhone = $_POST["mobile-phone"];
    $homePhone = $_POST["home-phone"];

    // Validation regex patterns
    $namePattern = "/^[a-zA-Z\s]+$/";
    $matricNoPattern = "/^[A-Za-z0-9]+$/";
    $addressPattern = "/^[A-Za-z0-9\s\.,\-]+$/";
    $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
    $phonePattern = "/^\d{10,15}$/";

    // Validate input values
    if (!preg_match($namePattern, $name)) {
        echo "Invalid name.";
        exit;
    }

    if (!preg_match($matricNoPattern, $matricNo)) {
        echo "Invalid matric number.";
        exit;
    }

    if (!preg_match($addressPattern, $currentAddress)) {
        echo "Invalid current address.";
        exit;
    }

    if (!preg_match($addressPattern, $homeAddress)) {
        echo "Invalid home address.";
        exit;
    }

    if (!preg_match($emailPattern, $email)) {
        echo "Invalid email address.";
        exit;
    }

    if (!preg_match($phonePattern, $mobilePhone)) {
        echo "Invalid mobile phone number.";
        exit;
    }

    if (!preg_match($phonePattern, $homePhone)) {
        echo "Invalid home phone number.";
        exit;
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "validationform";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the "details" table
    $sql = "INSERT INTO details (name, matric_no, current_address, home_address, email, mobile_phone, home_phone)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $matricNo, $currentAddress, $homeAddress, $email, $mobilePhone, $homePhone);

    if ($stmt->execute()) {
        // Redirect to the success page
        header("Location: success.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}

?>
