
<?php 
   $servername = 'localhost'; 
   $database = 'shopsy'; 
   $username = 'root'; 
   $password = ''; 

   $conn = mysqli_connect($servername, $username, $password, $database);

 
if(!$conn){
	
	
    die("Connection failed:".mysqli_connect_error());
    }
    
    echo "Connected Successfully   ";
    

$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

$sql = "INSERT INTO cart_items (item_name, price, image_url, category) VALUES ('$item_name', '$price', '$image_url', '$category')";

if (mysqli_query($conn, $sql)) {
    echo "Item added to the cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
    
?> 