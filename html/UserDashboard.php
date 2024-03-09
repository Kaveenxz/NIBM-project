<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            color: #000000;
            margin: 0;
            padding: 0;
        }

        .item-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #ffffff;
        }

        .item form {
            display: inline-block;
        }

        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #ffffff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: rgb(255, 0, 123);
        }

        input,
        button {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(255, 0, 123);
            color: #ffffff;
            cursor: pointer;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ccc;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="item-container">
        <?php
        session_start();
        include('../php/config.php');

        $query = "SELECT * FROM items";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="item">';
            echo "Item ID: " . $row['item_id'] . "<br>";
            echo "Item Name: " . $row['item_name'] . "<br>";
            echo "Category: " . $row['category'] . "<br>";
            echo "Price: $" . $row['price'] . "<br>";
            echo '</div>';
        }
        ?>
    </div>

    <div class="form-container">
        <form method="post" action="../php/dashboardCrud.php">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" required>

            <label for="category">Category:</label>
            <input type="text" name="category" required>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <button type="submit" name="add_item">Add Item</button>
        </form>

        <form method="post" action="../php/dashboardCrud.php">
            <label for="item_id_update">Item ID to Update:</label>
            <input type="number" name="item_id_update" required>

            <label for="item_name_update">New Item Name:</label>
            <input type="text" name="item_name_update">

            <label for="category_update">New Category:</label>
            <input type="text" name="category_update">

            <label for="price_update">New Price:</label>
            <input type="number" name="price_update" step="0.01">

            <button type="submit" name="update_item">Update Item</button>
        </form>

        <form method="post" action="../php/dashboardCrud.php">
            <label for="item_id_delete">Item ID to Delete:</label>
            <input type="number" name="item_id_delete" required>

            <button type="submit" name="delete_item">Delete Item</button>
        </form>
    </div>

</body>

</html>
