<?php
//------- DataBase Name -----------
//v_user_contacts
//--
//v_user_addresses
//--
//v_user_buycards

include_once "functions.php";
function get_content($user_id,$data)
{
    $conn = config();
    $sql = "INSERT INTO v_user_contacts (user_id,phone,label_phone) VALUE ('$user_id','$data[phone]','$data[label_phone]')";
    $result = mysqli_query($conn, $sql);
}
function get_address($user_id,$data)
{
    $conn = config();
    $sql = "INSERT INTO v_user_addresses (user_id,address,label_address) VALUE ('$user_id','$data[address]','$data[label_address]')";
    $result = mysqli_query($conn, $sql);
}

function get_buy_cart($user_id,$data)
{
    $conn = config();
    $sql = "INSERT INTO v_user_buycards (user_id,card_number,owner) VALUE ('$user_id','$data[card_number]','$data[owner]')";
    $result = mysqli_query($conn, $sql);

}

function show_content_user($user_id)
{
    $conn = config();
    $sql = "SELECT * FROM v_user_contacts WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while($num_rows = mysqli_fetch_assoc($result)){
            $row[] = $num_rows;
        }
    }
    return $row;

}
function show_addresses_user($user_id){
    $conn = config();
    $sql = "SELECT * FROM v_user_addresses WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = [];
    if($result && mysqli_num_rows($result) > 0){
        while($num_rows = mysqli_fetch_assoc($result)){
            $row[] = $num_rows;
        }
    }
    return $row;
}
function show_buycart_user($user_id){
    $conn = config();
    $sql = "SELECT * FROM v_user_buycards WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while($num_rows = mysqli_fetch_assoc($result)){
            $row[] = $num_rows;
        }
    }
    return $row;
}

function get_order_address($address_id) {
    $conn = config();
    $query = "SELECT * FROM v_user_addresses WHERE id = $address_id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}
function get_order_address_admin_list($address_id) {
    $conn = config();
    $query = "SELECT address FROM v_user_addresses WHERE id = $address_id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['address'];
    }

    return null;
}
function get_order_address_admin($contact_id)
{
    $conn = config();
    $sql = "SELECT phone FROM v_user_contacts WHERE id = '$contact_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['phone'];
    }
    return null;
}
function get_order_cart_admin($contact_id)
{
    $conn = config();
    $sql = "SELECT card_number FROM v_user_buycards WHERE id = '$contact_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['card_number'];
    }
    return null;
}


























