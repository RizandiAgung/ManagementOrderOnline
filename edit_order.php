<?php
include 'db.php';
$id = $_GET['id'];
$order = $conn->query("SELECT * FROM orders WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_ordered = $_POST['product_ordered'];
    $quantity = $_POST['quantity'];
    $shipping_address = $_POST['shipping_address'];
    $payment_status = $_POST['payment_status'];

    $conn->query("UPDATE orders SET 
                  customer_name='$customer_name', product_ordered='$product_ordered', 
                  quantity=$quantity, shipping_address='$shipping_address', 
                  payment_status='$payment_status' WHERE id = $id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form method="POST">
        Nama Customer: <input type="text" name="customer_name" value="<?= $order['customer_name'] ?>" required><br>
        Produk Dipesan: <input type="text" name="product_ordered" value="<?= $order['product_ordered'] ?>" required><br>
        Jumlah: <input type="number" name="quantity" value="<?= $order['quantity'] ?>" required><br>
        Alamat Pengiriman: <textarea name="shipping_address" required><?= $order['shipping_address'] ?></textarea><br>
        Status Pembayaran: 
        <select name="payment_status">
            <option value="Paid" <?= $order['payment_status'] == 'Paid' ? 'selected' : '' ?>>Paid</option>
            <option value="Unpaid" <?= $order['payment_status'] == 'Unpaid' ? 'selected' : '' ?>>Unpaid</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
