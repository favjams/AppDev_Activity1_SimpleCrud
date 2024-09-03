<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $updated_at = date('Y-m-d H:i:s');

    $sql = "UPDATE products SET name='$name', description='$description', price=$price, quantity=$quantity, updated_at='$updated_at' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo $row['Description']; ?></textarea><br><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['Price']; ?>" required><br><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['Quantity']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>

<?php
$conn->close();
?>