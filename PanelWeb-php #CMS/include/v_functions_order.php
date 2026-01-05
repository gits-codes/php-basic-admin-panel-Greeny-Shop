<?php
include_once "../include/functions.php";

function finalize_order($user_id, $address_id, $card_id, $contact_id)
{
    $conn = config();

    $cart_items = get_cart_products($user_id);
    if (empty($cart_items)) {
        return false;
    }

    mysqli_query(
        $conn,
        "INSERT INTO v_orders (user_id, status, address_id, card_id, contact_id)
         VALUES ('$user_id', 'pending', '$address_id', '$card_id', '$contact_id')"
    );

    $order_id = mysqli_insert_id($conn);
    $total_price = 1500000;

    foreach ($cart_items as $item) {
        $line_total = $item['quantity'] * $item['price'];
        $total_price += $line_total;

        mysqli_query(
            $conn,
            "INSERT INTO v_order_items (order_id, product_id, quantity, price)
             VALUES ('$order_id', '{$item['product_id']}', '{$item['quantity']}', '{$item['price']}')"
        );
    }

    mysqli_query(
        $conn,
        "UPDATE v_orders SET total_price = '$total_price' WHERE id = '$order_id'"
    );

    mysqli_query($conn, "DELETE FROM v_cart_tbl WHERE user_id='$user_id'");

    return $order_id;
}





function list_show_admin_orders()
{
    $conn = config();
    $sql = "SELECT * FROM v_orders";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $order[] = $row;
    }
    return $order;
}

function user_show_admin_detils($user_id)
{
    $conn = config();
    $sql = "SELECT (username) FROM v_users_tbl WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function show_order_iteams($order_id)
{
    $conn = config();
    $sql = "SELECT * FROM v_order_items WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $sql);
    $order = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $order[] = $row;
        }
    }
    return $order;
}


function get_product($product_id)
{
    $conn = config();
    $sql = "SELECT * FROM product_tbl WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function get_order_total_items($order_id) {
    $conn = config();
    $sql = "SELECT SUM(quantity) as total_items FROM v_order_items WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total_items'] ?? 0;
}

function get_single_order($user_id, $order_id)
{
    $conn = config();
    $sql = "SELECT * FROM v_orders WHERE user_id='$user_id' AND id='$order_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

//-------
//این برای بدون رفرش کردن صفحه اخر مشتریه
function list_show_users_orders_with_items($user_id) {
    $conn = config();
    $orders_sql = "SELECT * FROM v_orders WHERE user_id='$user_id'";
    $orders_result = mysqli_query($conn, $orders_sql);

    $all_orders = [];
    if ($orders_result && mysqli_num_rows($orders_result) > 0) {
        while ($order = mysqli_fetch_assoc($orders_result)) {
            // گرفتن آیتم‌های هر سفارش
            $items_sql = "SELECT * FROM v_order_items WHERE order_id='{$order['id']}'";
            $items_result = mysqli_query($conn, $items_sql);
            $items = [];
            if ($items_result && mysqli_num_rows($items_result) > 0) {
                while ($row = mysqli_fetch_assoc($items_result)) {
                    $items[] = $row;
                }
            }
            $all_orders[] = [
                'order' => $order,
                'items' => $items
            ];
        }
    }
    return $all_orders;
}
function get_order_total_price($order_id)
{
    $conn = config();

    $sql = "
        SELECT SUM(quantity * price) AS total
        FROM v_order_items
        WHERE order_id = '$order_id'
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['total'] ?? 0;
}












