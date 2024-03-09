<?php
session_start();
include('config.php');

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../html/UserDashboard.php");
        } else {
            echo '<div style="text-align: center; margin-top: 20px; font-size: 18px; color: rgb(255, 0, 123);">Incorrect email or password!</div>';
        }
    } else {
        echo '<div style="text-align: center; margin-top: 20px; font-size: 18px; color: rgb(255, 0, 123);">User not found!</div>';
    }
}

mysqli_close($conn);
?>
