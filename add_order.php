<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_ordered = $_POST['product_ordered'];
    $quantity = $_POST['quantity'];
    $shipping_address = $_POST['shipping_address'];
    $payment_status = $_POST['payment_status'];

    $conn->query("INSERT INTO orders (customer_name, product_ordered, quantity, shipping_address, payment_status) 
                  VALUES ('$customer_name', '$product_ordered', $quantity, '$shipping_address', '$payment_status')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Order</h1>
        <div class="card p-4 shadow">
            <form method="POST">
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Nama Customer</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>

                <div class="mb-3">
                    <label for="product_ordered" class="form-label">Produk Dipesan</label>
                    <input type="text" class="form-control" id="product_ordered" name="product_ordered" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>

                <div class="mb-3">
                    <label for="shipping_address" class="form-label">Alamat Pengiriman</label>
                    <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="payment_status" class="form-label">Status Pembayaran</label>
                    <select class="form-select" id="payment_status" name="payment_status" required>
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    <a href="index.php" class="btn btn-secondary btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
