<?php

$order_id = $_GET['order_id'] ?? null;
$status   = $_GET['status'] ?? null;

if ($order_id && in_array($status, ['approved','rejected'])) {
    $conn = config();
    mysqli_query($conn, "UPDATE v_orders SET status='$status' WHERE id='$order_id'");
}

header("Location: ?m=users_final_orders&p=list");
exit;

