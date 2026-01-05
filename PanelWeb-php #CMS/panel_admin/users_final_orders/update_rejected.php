<?php
$order_id = $_REQUEST['order_id'];
$status = $_REQUEST['status'];
$conn = config();
$sql = "UPDATE v_orders SET status ='rejected' WHERE id = '$order_id'";
$row = mysqli_query($conn, $sql);
header("Location: ?m=users_final_orders&p=list");
//    exit;









