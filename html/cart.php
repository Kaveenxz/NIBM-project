<?php
$servername = 'localhost';
$database = 'shopsy';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_item"])) {
    $itemId = $_POST["delete_item"];
    $deleteSql = "DELETE FROM cart_items WHERE id = $itemId";
    mysqli_query($conn, $deleteSql);
}

$sql = "SELECT * FROM cart_items";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/cart.css">
    <title>CART</title>
    <link rel="icon" type="image/x-icon" href="../images/shopping-bag.png">

    <style>
        .item-set {
            display: flex;
            flex-wrap: wrap;
        }

        .arrivels {
            width: 23%;
            margin: 1%;
            text-align: center;
        }
        .no-cart {
            margin: 20px;
            text-align: center;
            color: rgb(255, 0, 123);
            font-size: 20px;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="../index.html"><h1>SHOPSY<span>.CO</span></h1></a>
        <input type="search" placeholder=" Search anything here">

        <div class="right-bar">
            <div class="icons">
                <a href="wishlist.html">
                    <img src="../images/heart (1).png" alt="">
                    <h6>WishList</h6>
                </a>
            </div>

            <div class="icons">
                <a href="cart.php">
                    <img src="../images/shopping-cart.png" alt="">
                    <h6>Cart</h6>
                </a>
            </div>

            <div class="icons">
                <a href="login.html">
                    <img src="../images/enter.png" alt="">
                    <h6>Login</h6>
                </a>
            </div>
        </div>
    </header>
    <hr class="hr1">

    <header class="header2">
        <div class="drop-down-list">
            <select id="categoryDropdown" name="category">
                <option>Browse Categories:</option>
                <option value="electronic_accessories">Electronic Accessories</option>
                <option value="electronic_devices">Electronic Devices</option>
                <option value="tv_home_appliances">TV & Home Appliances</option>
                <option value="health_beauty">Health & Beauty</option>
                <option value="babies_toys">Babies & Toys</option>
                <option value="groceries_pets">Groceries & Pets</option>
                <option value="home_lifestyle">Home & Lifestyle</option>
                <option value="womens_fashion">Women's Fashion</option>
                <option value="mens_fashion">Men's Fashion</option>
                <option value="watches_accessories">Watches & Accessories</option>
                <option value="sports_outdoor">Sports & Outdoor</option>
                <option value="automotive_motorbike">Automotive & Motorbike</option>
            </select>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="new-arrivals.html">Buy Products</a></li>
                <li><a href="on-sale.html">On sale</a></li>
                <li><a href="best-seller.html">Best Seller</a></li>
                <li><a href="brands.html">Brands</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </nav>
    </header>

    <div class="selected-items">
        <h2>Your selected items</h2>
    </div>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="item-set">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="arrivels">';
            echo '<img src="../images/' . $row["image_url"] . '" alt="Item Image">';
            echo '<h6 id="titl-cart">' . $row["category"] . '</h6>';
            echo '<h5 id="item-name">' . $row["item_name"] . '</h5>';
            echo '<h5 id="price-list">Rs. ' . $row["price"] . '</h5>';
            echo '<form method="post">';
            echo '<input type="hidden" name="delete_item" value="' . $row["id"] . '">';
            echo '<button type="submit" id="delete-cart-btn">Delete</button>';
            echo '</form>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p class='no-cart'>No items in the cart</p>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_item"])) {
        echo '<meta http-equiv="refresh" content="0">';
    }

    mysqli_close($conn);
    ?>

    <div class="footer">
        <div class="top">
            <div class="content one">
                <h2>SHOPSY<span>.CO</span></h2>
                <p>Subscribe</p>
                <p>Get 10% off your first order</p>
                <input type="email" placeholder="Enter your email ->">
            </div>
            <div class="content two">
                <h3>Get in touch</h3>
                <p>11 Wijerama Mawatha, <br>Boralla, Sri Lanka</p>
                <p>kaveenhansithx@gmail.com</p>
                <p>+94-78-357-23-88</p>
            </div>
            <div class="content three">
                <h3>Account</h3>
                <p><a href="">My Account</a></p>
                <p><a href="login.html">Login / Register</a></p>
                <p><a href="cart.html">Cart</a></p>
                <p><a href="wishlist.html">Wishlist</a></p>
            </div>
            <div class="content four">
                <h3>Quick Link</h3>
                <p><a href="new-arrivals.html">New Arrival</a></p>
                <p><a href="best-seller.html">Best Seller</a></p>
                <p><a href="on-sale.html">On sale</a></p>
                <p><a href="brands.html">Brands</a></p>
            </div>
            <div class="content five">
                <h3>Download App</h3>
                <p>Save $3 with App new User Only</p>
                <p><a href="">Play Store -></a></p>
                <p><a href="">App Store -></a></p>
                <div class="social">
                    <a href="https://www.facebook.com/"><img src="images/fbicon.png" alt=""></a>
                    <a href="https://www.instagram.com/"><img src="images/instericon.png" alt=""></a>
                    <a href="https://www.linkedin.com/"><img src="images/linkicon.png" alt=""></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom">
            &copy; Copyright Shopsy.co 2024. All right reserved
        </div>
    </div>

    <script>
     
    </script>

</body>

</html>
