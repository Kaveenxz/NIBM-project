<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/userDashboard.css">
    <title>User Dashboard</title>
    
</head>

<body>


    <header class="header">
        <div class="left">
        <a href="../index.html"><h1>SHOPSY<span>.CO</span></h1></a>
        </div>    
        <div class="right-bar">
            <h3><a href="../index.html">Log out ></a></h3>
        </div>
    </header>  

    <h1 class="title"> User Dashboard Form</h1>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include('../php/config.php');

            $query = "SELECT * FROM items";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['item_id'] . '</td>';
                echo '<td>' . $row['item_name'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>$' . $row['price'] . '</td>';
                echo '<td>';
                echo '<button class="btn-update" onclick="openUpdateModal(' . $row['item_id'] . ')">Update</button>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    
    <!-- Update Item Modal -->
    <div class="modal" id="updateModal">
        <div class="modal-content">
            <h2>Update Item</h2>
            <form method="post" action="../php/dashboardCrud.php">
                <label for="item_id_update">Item ID:</label>
                <input type="number" name="item_id_update" id="updateItemId" readonly>

                <label for="item_name_update">New Item Name:</label>
                <input type="text" name="item_name_update" required>

                <label for="category_update">New Category:</label>
                <input type="text" name="category_update" required>

                <label for="price_update">New Price:</label>
                <input type="number" name="price_update" step="0.01" required>

                <button type="submit" name="update_item">Update Item</button>
                <button type="button" onclick="closeUpdateModal()" style="background:#fff; color:#000;">Cancel</button>
            </form>
        </div>
    </div>

    <div class="crud">
    <div class="form-container">
        <h3>Add New item</h3>
        <form method="post" action="../php/dashboardCrud.php">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" required>

            <label for="category">Category:</label>
            <input type="text" name="category" required>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <button type="submit" name="add_item">Add Item</button>
        </form>
    </div>


    <div class="form-container delete-form">
             <h3>Delete Item</h3>
            <form method="post" action="../php/dashboardCrud.php">
                <label for="item_id_delete">Item ID to Delete:</label>
                <input type="number" name="item_id_delete" required>

                <button type="submit" name="delete_item">Delete Item</button>
            </form>
    </div>
    </div>

    <script>
        function openUpdateModal(itemId) {
            document.getElementById('updateItemId').value = itemId;
            document.getElementById('updateModal').style.display = 'flex';
        }

        function closeUpdateModal() {
            document.getElementById('updateModal').style.display = 'none';
        }

      
    </script>

</body>

</html>
