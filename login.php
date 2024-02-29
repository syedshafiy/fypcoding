<?php
    $username =  $_POST["username"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];

    // Database connection

    $host = 'localhost';
    $dbname = 'fyp'; // Changed the database name here
    $db_username = 'root'; // Changed the variable name to avoid conflict
    $db_password = ''; // Changed the variable name to avoid conflict

    $conn = mysqli_connect($host, $db_username, $db_password, $dbname); // Changed mysql_connect to mysqli_connect

    if (!$conn) { // Check for connection error
        die("Connection error: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO login (username, password, phonenumber, email)
            VALUES (?, ?, ?, ?)"; // Removed the extra comma at the end of the VALUES list

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) { // Corrected variable name from $sq1 to $sql
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $phonenumber, $email);

        // Execute the Statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Successfully inserted data."; // Added a semicolon at the end of the echo statement
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>