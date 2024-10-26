<?php
// Start session
session_start();

// Include database connection
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($email) && !empty($password)) {
        // Escape special characters for security
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Check if email and password match in the login table
        $sql = "SELECT * FROM login WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Store user info in session
            $_SESSION['email'] = $row['email'];
            $_SESSION['usertype'] = $row['usertype'];

            if($row['usertype']=="admin"){
                ?>
                <script>
                    window.location.replace("sell.php")
                </script>
                <?php
            }
            else if($row['usertype']=="customer"){
                ?>
                <script>
                    window.location.replace("menu.php")
                </script>
                <?php
            }
            else if($row['usertype']=="seller"){
                if($row['status']==1){
                    ?>
                    <script>
                        window.location.replace("sell.php")
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("Your account is not verified, please contact admin")
                        window.location.replace("login.html")
                    </script>
                    <?php
                }
                
            }
            else{
                ?>
                    <script>
                        alert("Invalid user")
                        window.location.replace("login.html")
                    </script>
                <?php
            }
            
            
        } else {
            echo "<script>alert('Incorrect email or password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Please fill in all the required fields'); window.location.href='login.html';</script>";
    }
}

// Close connection
mysqli_close($conn);
?>