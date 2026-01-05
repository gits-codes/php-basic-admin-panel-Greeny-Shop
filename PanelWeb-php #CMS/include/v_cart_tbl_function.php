<?php


function add_v_cart($user_id, $product_id, $quantity = 1)
{
    $conn = config();

    $sql = "SELECT * FROM v_cart_tbl WHERE user_id='$user_id' AND product_id='$product_id'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        mysqli_query($conn, "UPDATE v_cart_tbl SET quantity = quantity + '$quantity' WHERE user_id='$user_id' AND product_id='$product_id'");
    } else {
        mysqli_query($conn, "INSERT INTO v_cart_tbl (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$quantity')");
    }
}

function get_cart_products($user_id)
{
    $conn = config();
    $products = list_product_admin();

    $res = mysqli_query($conn, "SELECT * FROM v_cart_tbl WHERE user_id='$user_id'");

    $cart_items = [];
    while ($cart = mysqli_fetch_assoc($res)) {
        foreach ($products as $product) {
            if ($product['id'] == $cart['product_id']) {
                $cart_items[] = [
                    'cart_id' => $cart['id'],
                    'product_id' => $product['id'],
                    'title' => $product['title'],
                    'img' => $product['img'],
                    'quantity' => $cart['quantity'],
                    'price' => $product['price'],
                ];
            }
        }
    }

    return $cart_items;
}




function delete_v_cart($id)
{
    $connect = config();
    $sql = "DELETE FROM v_cart_tbl WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
}





























