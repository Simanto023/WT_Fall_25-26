<?php
include __DIR__ . "/DB/db.php";

$orders = [];
$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Orders | NG Auto</title>
    <link rel="stylesheet" href="css/admin_orders.css">
</head>

<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>

        <a href="admin_dashboard.php" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

    <div class="page-header">
        <h2>Orders Management</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Car</th>
                <th>Price</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                foreach ($orders as $order) {
    echo "<tr>";
     echo "<td>#ORD{$order['id']}</td>";
    echo "<td>{$order['user_id']}</td>";
    echo "<td>{$order['total_amount']}</td>";
    echo "<td>{$order['phone_number']}</td>";
    echo "<td>{$order['address']}</td>";
      echo "<td>{$order['status']}</td>";
    echo "<td>{$order['created_at']}</td>";
    echo "</tr>";
}
            </tr>
        </tbody>
    </table>

</main>

</body>
</html>
