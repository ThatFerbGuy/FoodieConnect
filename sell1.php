<?php
include("db_connect.php");  // Make sure db_connect.php connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_SESSION['email'] ?? ''; // Assume email from session, make sure session is started
    $p_name = $_POST['p_name'] ?? '';
    $category = $_POST['category'] ?? '';
    $p_mrp = ($_POST['sellOrDonate'] == 'sell') ? $_POST['p_mrp'] ?? 0 : 0; // Set price to 0 if it's a donation
    $p_expiry_date = $_POST['p_expiry_date'] ?? null;
    $p_packed_date = $_POST['p_packed_date'] ?? null;
    $p_description = $_POST['p_description'] ?? '';
    $p_qty = $_POST['p_qty'] ?? 0;
    $p_stock = $p_qty; // Initial stock value is the same as quantity

    // Handle file upload
    $p_pic = $_FILES['p_pic']['name'] ?? '';
    $p_pic_tmp = $_FILES['p_pic']['tmp_name'] ?? '';

    // File upload directory
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
    }

    // Generate a unique file name to avoid conflicts
    $target_file = $target_dir . time() . '_' . basename($p_pic);
    $file_path = '';

    // Move uploaded file to target directory
    if (!empty($p_pic) && move_uploaded_file($p_pic_tmp, $target_file)) {
        $file_path = $target_file;  // Set the uploaded file path
    }

    // Insert into database with updated columns
    $sql = "INSERT INTO product (email, p_name, category, p_mrp, p_expiry_date, p_packed_date, p_description, p_qty, p_pic, p_stock)
            VALUES ('$email', '$p_name', '$category', '$p_mrp', '$p_expiry_date', '$p_packed_date', '$p_description', '$p_qty', '$file_path', '$p_stock')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product submitted successfully!'); window.location.href='sell.php';</script>";
    } else {
        echo "<script>alert('Error: Could not submit product. Please try again.'); window.history.back();</script>";
    }

    // Close connection
    mysqli_close($conn);
}
?>
