<?php
session_start();
include('./config.php');

if (isset($_POST['add_item'])) {
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = $_POST['price'];

    $query = "INSERT INTO items (item_name, category, price) VALUES ('$item_name', '$category', $price)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../html/UserDashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_item'])) {
    $item_id_update = $_POST['item_id_update'];
    $item_name_update = mysqli_real_escape_string($conn, $_POST['item_name_update']);
    $category_update = mysqli_real_escape_string($conn, $_POST['category_update']);
    $price_update = $_POST['price_update'];

    $query = "UPDATE items SET item_name='$item_name_update', category='$category_update', price=$price_update WHERE item_id=$item_id_update";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../html/UserDashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete_item'])) {
    $item_id_delete = $_POST['item_id_delete'];

    $query = "DELETE FROM items WHERE item_id=$item_id_delete";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../html/UserDashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
