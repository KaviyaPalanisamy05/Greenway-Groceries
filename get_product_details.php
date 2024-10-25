<?php
// Include your database connection file
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
// Check if productId is set in the POST request
if(isset($_POST['productId'])) {
    // Sanitize the input to prevent SQL injection
    $productId = mysqli_real_escape_string($connect, $_POST['productId']);
    
    // Query to retrieve product details based on the productId
    $query = "SELECT * FROM rt_product WHERE id = '$productId'";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0) {
        // Fetch product details
        $product = mysqli_fetch_assoc($result);
        
        // Output product details
        echo '<h4>'.$product['product'].'</h4>';
        echo '<p>Price: Rs. '.$product['price'].'</p>';
        // Add other product details as needed
    } else {
        // No product found with the given productId
        echo 'Product not found.';
    }
} else {
    // productId is not set in the POST request
    echo 'Invalid request.';
}

// Close database connection
?>
