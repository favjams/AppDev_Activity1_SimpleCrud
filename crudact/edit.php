<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET 
            name = '$name', 
            description = '$description', 
            price = 'price', 
            quantity = 'quantity', 
            updated_at = NOW()
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else{
        echo "Error:". $sql."<br>".$conn->error;
    }
}

$conn->close();
?>

<h1>Edit Product</h1>
<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $product['name']; ?>"
    required><br>
    Description: <input type="text" name="description" value="<?php echo $product['description']; ?>" required><br>
    Price: <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br>
    Quantity: <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br>
    <input type="submit" value="Save'>
</form>
<a href="index.php">Back to Products</a>
    