<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all required fields are set and not empty
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $home = isset($_POST['home']) ? $_POST['home'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $pin = isset($_POST['pin']) ? $_POST['pin'] : '';
    $question = isset($_POST['question']) ? $_POST['question'] : '';
    $answer = isset($_POST['answer']) ? $_POST['answer'] : '';

    if (!empty($name) && !empty($email) && !empty($password) && !empty($phone) && !empty($home) && !empty($street) && !empty($district) && !empty($pin)) {

        // Escape special characters for security
        // $name = mysqli_real_escape_string($conn, $name);
        // $email = mysqli_real_escape_string($conn, $email);
        // $password = mysqli_real_escape_string($conn, $password);
        // $phone = mysqli_real_escape_string($conn, $phone);
        // $home = mysqli_real_escape_string($conn, $home);
        // $street = mysqli_real_escape_string($conn, $street);
        // $district = mysqli_real_escape_string($conn, $district);
        // $pin = mysqli_real_escape_string($conn, $pin);
        // $question = mysqli_real_escape_string($conn, $question);
        // $answer = mysqli_real_escape_string($conn, $answer);

        // Check if email already exists
        $sql = "SELECT * FROM login WHERE email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            // Insert into registration table
            $sql = "INSERT INTO registration 
                    (name, email, phone, home, street, district, pin) 
                    VALUES ('$name', '$email', '$phone', '$home', '$street', '$district', '$pin')";

            if (mysqli_query($conn, $sql)) {
                // Insert into login table
                $sql2 = "INSERT INTO login (email, password, question, answer, usertype, status ) 
                         VALUES ('$email', '$password', '$question', '$answer', 'customer', 1 )";

                if (mysqli_query($conn, $sql2)) {
                    echo "<script>alert('Registration successful');</script>";
                    header("Location: login.html");
                    exit();
                } else {
                    echo "<script>alert('Error inserting into login table');</script>";
                }
            } else {
                echo "<script>alert('Error inserting into registration table');</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill in all the required fields');</script>";
    }
}

// Close connection
mysqli_close($conn);