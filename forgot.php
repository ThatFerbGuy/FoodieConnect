<?php
// forgot_password.php
session_start();
require 'db_connect.php';

$error = '';
$step = 1; // Track the step of the process

if (isset($_POST['submit_email'])) {
    $email = trim($_POST['email']);

    // Fetch security question based on email
    $stmt = $pdo->prepare("SELECT reg_id, question FROM registration WHERE email = ?");
    $stmt->execute([$email]);
    $registration = $stmt->fetch();

    if ($registration) {
        $_SESSION['reg_id'] = $registration['reg_id'];
        $_SESSION['email'] = $email;
        $_SESSION['question'] = $registration['question'];
        $step = 2;
    } else {
        $error = "Email not found.";
    }
}

if (isset($_POST['submit_answer'])) {
    $answer = trim($_POST['answer']);

    // Fetch stored security answer
    $stmt = $pdo->prepare("SELECT answer FROM registration WHERE reg_id = ?");
    $stmt->execute([$_SESSION['reg_id']]);
    $user = $stmt->fetch();

    if ($registration && strtolower($user['answer']) === strtolower($answer)) {
        $step = 3;
    } else {
        $error = "Incorrect security answer.";
    }
}

if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password in database
        $stmt = $pdo->prepare("UPDATE registration SET password = ? WHERE id = ?");
        $stmt->execute([$hashed_password, $_SESSION['reg_id']]);

        // Clear session data
        session_unset();
        session_destroy();

        header("Location: login.html?message=Password reset successful. Please login.");
        exit();
    } else {
        $error = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - FoodieConnect</title>
    <!-- Include your CSS styles -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <?php if ($step == 1): ?>
            <!-- Step 1: Enter Email -->
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Enter your registered Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <button type="submit" name="submit_email" class="btn button-style">Submit</button>
            </form>

        <?php elseif ($step == 2): ?>
            <!-- Step 2: Answer Security Question -->
            <form method="POST" action="">
                
                <div class="form-group">                
                    <input type="text" name="question" id="question" class="form-control" value="<?= $_SESSION['question']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="answer">Your Answer:</label>
                    <input type="text" name="answer" id="answer" class="form-control" required>
                </div>
                <button type="submit" name="submit_answer" class="btn button-style">Submit Answer</button>
            </form>

        <?php elseif ($step == 3): ?>
            <!-- Step 3: Reset Password -->
            <form method="POST" action="">
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required minlength="6">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required minlength="6">
                </div>
                <button type="submit" name="reset_password" class="btn button-style">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
