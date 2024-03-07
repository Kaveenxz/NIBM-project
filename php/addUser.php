<?php
include('./config.php'); // Include your database connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $insertSql = "INSERT INTO user_info (name, email, password) VALUES ('$name', '$email', '$password')";
        mysqli_query($conn, $insertSql);

        header("Location: ../html/UserDashboard.html");
        exit();
    } elseif (isset($_POST["login"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        $selectSql = "SELECT * FROM user_info WHERE email='$email'";
        $result = mysqli_query($conn, $selectSql);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])) {
                header("Location: ../html/UserDashboard.html");
                exit();
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    }
}

// Additional code if needed
mysqli_close($conn);
?>
