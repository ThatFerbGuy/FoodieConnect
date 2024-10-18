<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all required fields are set and not empty
    $required_fields = ['s_name', 'email', 'password', 's_phone', 's_street', 's_district', 's_pin', 'question', 'answer','s_house'];
    $errors = [];
    
    // Validate text inputs
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = $field . " is required";
        }
    }

    // Check if a security question is selected
    if (empty($_POST['question'])) {
        $errors[] = "Security question is required";
    }

    // Validate file uploads
    if (empty($_FILES['s_photo']['name'])) {
        $errors[] = "Shop image is required";
    }

    if (empty($_FILES['s_license']['name'])) {
        $errors[] = "License image is required";
    }

    // If no errors, proceed with the rest of the code
    if (empty($errors)) {
        $s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $s_phone = mysqli_real_escape_string($conn, $_POST['s_phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $s_house = mysqli_real_escape_string($conn, $_POST['s_house']);
        $s_street = mysqli_real_escape_string($conn, $_POST['s_street']);
        $s_district = mysqli_real_escape_string($conn, $_POST['s_district']);
        $s_pin = mysqli_real_escape_string($conn, $_POST['s_pin']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $answer = mysqli_real_escape_string($conn, $_POST['answer']);

        // Handle file uploads
        $s_photo = mysqli_real_escape_string($conn, $_FILES['s_photo']['name']);
        $s_license = mysqli_real_escape_string($conn, $_FILES['s_license']['name']);

        // Move uploaded files to the desired directory
        move_uploaded_file($_FILES['s_photo']['tmp_name'], "uploads/" . $s_photo);
        move_uploaded_file($_FILES['s_license']['tmp_name'], "uploads/" . $s_license);

        // Check if email already exists
        $sql = "SELECT * FROM login WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            // Insert into seller table
            $sql = "INSERT INTO seller (email,s_photo, s_license) VALUES ('$email','$s_photo', '$s_license')";
            if (mysqli_query($conn, $sql)) {
                // Insert into login table
                $sql3="INSERT INTO registration (name, email, phone, home, street, district, pin) VALUES ('$s_name', '$email', '$s_phone', '$s_house', '$s_street', '$s_district', '$s_pin')";
                if(mysqli_query($conn,$sql3)){

                    $sql2 = "INSERT INTO login (email, password, question, answer, usertype, status) VALUES ('$email', '$password', '$question', '$answer', 'seller', 0 )";

                    if (mysqli_query($conn, $sql2)) {
                        echo "<script>alert('Registration successful');</script>";
                        header("Location: login.html");
                        exit();
                    } else {
                        echo "<script>alert('Error inserting into login table');</script>";
                    }

                }
                else{
                    echo "<script>alert('Error inserting into registration table');</script>";
                }
                
            } else {
                echo "<script>alert('Error inserting into seller table');</script>";
            }
        }
    } else {
        // If there are validation errors, display them
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}

// Close connection
mysqli_close($conn);
?>