<?php
session_start();
include_once "v_users_tbl_fanction.php";
include_once "v_cart_tbl_function.php";
include_once "v_functions_order.php";
include_once "v_user_info.php";
function config()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cms";
    $connect = mysqli_connect($server, $username, $password, $database);

    return $connect;

}

function uploader_pic($file, $dir, $folder, $name)
{
    $file = $_FILES[$file];
    if (!file_exists($folder)) {
        mkdir($dir . $folder);
    }
    $filename = $file['name'];
    $array = explode('.', $filename);
    $extension = end($array);
    $new_name_pic = $name . "-" . rand() . "." . $extension;
    $from = $file['tmp_name'];
    $to = $dir . $folder . "/" . $new_name_pic;
    if (move_uploaded_file($from, $to)) {
        return $to;
    } else {
        return null;
    }

}

include_once 'function_setting.php';
$settings = settings();
$m = $_REQUEST['m'] ?? 'index';

switch ($m) {
    case 'index':
        include_once 'function_menu.php';
        include_once 'function_product.php';
        include_once 'news.php';
        include_once 'function_widget.php';
        include_once 'function_page.php';
        break;
    case 'menu':
        include_once 'function_menu.php';
        break;
    case 'product_cat':
        include_once 'function_product_cat.php';
        break;
    case 'product':
        include_once 'function_product.php';
        break;
    case 'news_cat':
        include_once 'newscat.php';
        break;
    case 'news':
        include_once 'news.php';
        break;
    case 'contact':
        include_once 'contact.php';
        break;
    case 'widget':
        include_once 'function_widget.php';
        break;
    case 'page':
        include_once 'function_page.php';
        break;
    case 'uploader':
        include_once 'function_uploader.php';
        break;
    case 'users_final_orders':
        include_once 'v_functions_order.php';
        break;
}

function to_Persian_Date($datetime) {
    include_once "../jDateTime-master/jDateTime-master/jdatetime.class.php";
    $jdate = new jDateTime(true, true, 'Asia/Tehran');
    return $jdate->date("Y/m/d", strtotime($datetime));
}

