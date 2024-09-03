<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
</head>
<body>
    <h1>View Product</h1>
    <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
    <p><strong>Name:</strong> <?php echo $row['Name']; ?></p>
    <p><strong>Description:</strong> <?php echo $row['Description']; ?></p>
    <p><strong>Price:</strong> <?php echo $row['Price']; ?></p>
    <p><strong>Quantity:</strong> <?php echo $row['Quantity']; ?></p>
    <p><strong>Created At:</strong> <?php echo $row['Created_at']; ?></p>
    <p><strong>Updated At:</strong> <?php echo $row['Updated_at']; ?></p>
    <a href="index.php">Back to Product List</a>
</body>
</html>

<?php
$conn->close();
?>