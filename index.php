<?php
include 'db.php';
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Manajemen Order Online</h1>

        <!-- Baris untuk tombol tambah order -->
        <div class="d-flex justify-content-end mb-3">
            <a href="add_order.php" class="btn btn-primary">Add</a>
        </div>

        <!-- Tabel Order -->
        <table class="table table-striped table-hover shadow">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Produk Dipesan</th>
                    <th>Jumlah</th>
                    <th>Alamat Pengiriman</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
                        <td><?= htmlspecialchars($row['product_ordered']) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td><?= htmlspecialchars($row['shipping_address']) ?></td>
                        <td>
                            <span class="badge bg-<?= $row['payment_status'] == 'Paid' ? 'success' : 'danger' ?>">
                                <?= $row['payment_status'] ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit_order.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_order.php?id=<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin ingin menghapus order ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
