<?php
//$host = "localhost";
//$password = "";
//$user = "root";
////----- start model table
//$conn = mysqli_connect($host, $user, $password);
//$sql = "CREATE DATABASE IF NOT EXISTS cms";
//if (mysqli_query($conn, $sql)) {
//    echo "Database created or already exists.";
//}
//$connection = mysqli_connect($host, $user, $password,'cms');
//if (!$connection) { die("Connection failed: " . mysqli_connect_error()); }
////----- end model table
//
//// start Create menu_tbl
//$create_menu_db = "CREATE TABLE IF NOT EXISTS menu_tbl (
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    url VARCHAR(255),
//    sort INT(11),
//    status ENUM('0','1') DEFAULT '1',
//    chid INT(11) DEFAULT 0,
//    phone VARCHAR(20),
//    email VARCHAR(100),
//    PRIMARY KEY (id)
//) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;
//";
//// end Create menu_tbl
//
////----
//
//// start Create admin_tbl
//$create_admin_db = "CREATE TABLE IF NOT EXISTS admin_tbl (
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    username VARCHAR(255) NOT NULL,
//    password TEXT NOT NULL,
//    name VARCHAR(255) NOT NULL,
//    lastname VARCHAR(255) NOT NULL,
//    PRIMARY KEY (id)
//    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;
//    ";
//// end Create admin_tbl
//
////----
//
//// start Create contact_tbl
//$contact_tbl_db = "CREATE TABLE IF NOT EXISTS contact_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    name VARCHAR(255) NOT NULL,
//    email TEXT NOT NULL,
//    subject VARCHAR(255) NOT NULL,
//    text TEXT NOT NULL,
//    PRIMARY KEY (id)
//) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;
//";
//// end Create contact_tbl
//
////----
//
//// start Create news_cat
//$news_cat_db = "CREATE TABLE IF NOT EXISTS news_cat(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    PRIMARY KEY (id)
//)ENGINE=InnoDB CHARSET=UTF8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create news_cat
//
////----
//
//// start Create news_tbl
//$news_tbl_db = "CREATE TABLE IF NOT EXISTS news_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    text TEXT NOT NULL,
//    img TEXT NOT NULL,
//    news_cat INT(11) NOT NULL,
//    date VARCHAR(50) NOT NULL,
//    PRIMARY KEY (id)
//    )ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create news_tbl
//
////----
//
//// start Create page_tbl
//$page_tbl_db = "CREATE TABLE IF NOT EXISTS page_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    keywords TEXT NOT NULL,
//    description TEXT NOT NULL,
//    body TEXT NOT NULL,
//    PRIMARY KEY (id)
//    )
//    ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create page_tbl
//
////----
//
//// start Create product_cat
//$product_cat_db = "CREATE TABLE IF NOT EXISTS product_cat(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    status ENUM('0','1') DEFAULT '1',
//    sort INT(11),
//    PRIMARY KEY (id)
//    )
//    ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create product_cat
//
////----
//
//// start Create product_tbl
//$product_tbl_db = "CREATE TABLE IF NOT EXISTS product_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    text TEXT NOT NULL,
//    procat INT(11) NOT NULL,
//    img TEXT NOT NULL,
//    PRIMARY KEY (id)
//    )
//    ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create product_tbl
//
////----
//
//// start Create settings
//$settings_db = "CREATE TABLE IF NOT EXISTS settings(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    logo TEXT NOT NULL,
//    title VARCHAR(255) NOT NULL,
//    description TEXT NOT NULL,
//    copyetight TEXT NOT NULL,
//    instagram TEXT NOT NULL,
//    facebook TEXT NOT NULL,
//    linkedin TEXT NOT NULL,
//    twitter TEXT NOT NULL,
//    phone VARCHAR(50) NOT NULL,
//    email TEXT NOT NULL,
//    address TEXT NOT NULL,
//    location_map TEXT NOT NULL,
//    PRIMARY KEY (id)
//    )
//    ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create settings
//
////----
//
//// start Create uploader_tbl
//$uploader_tbl_db = "CREATE TABLE IF NOT EXISTS uploader_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(255) NOT NULL,
//    img TEXT NOT NULL,
//    size INT(11) NOT NULL,
//    PRIMARY KEY (id)
//    )ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create uploader_tbl
//
////----
//
//// start Create v_cart_tbl
//$v_cart_tbl_db = "CREATE TABLE IF NOT EXISTS v_cart_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    user_id INT(11) NOT NULL,
//    product_id INT(11) NOT NULL,
//    quantity INT(11) NOT NULL,
//    )ENGINE = InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create v_cart_tbl
//
////----
//
//// start Create v_orders
//$v_orders_db = "CREATE TABLE IF NOT EXISTS v_orders(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    user_id INT(11) NOT NULL,
//    status ENUM('pending','approved','rejected') DEFAULT 'pending')
//    )ENGINE=Innodb CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create v_orders
//
////----
//
//// start Create v_order_items
//$v_order_items_db = "CREATE TABLE IF NOT EXISTS v_order_items(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    order_id INT(11) NOT NULL,
//    product_id INT(11) NOT NULL,
//    quantity INT(11) NOT NULL,
//    PRIMARY KEY (id)
//    )ENGINE = Innodb CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create v_order_items
//
////----
//
//// start Create v_users_tbl
//$v_users_tbl_db = "CREATE TABLE IF NOT EXISTS v_users_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    username VARCHAR(255) NOT NULL,
//    email TEXT NOT NULL,
//    password TEXT NOT NULL,
//    PRIMARY KEY (id)
//)ENGINE = Innodb CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create v_users_tbl
//
////----
//
//// start Create widget_tbl
//$widget_tbl_db = "CREATE TABLE IF NOT EXISTS widget_tbl(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    title VARCHAR(100) NOT NULL,
//    img TEXT NOT NULL,
//    text TEXT NOT NULL,
//    PRIMARY KEY (id)
//)ENGINE = Innodb CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
//// end Create widget_tbl
//
////----

//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
//new version Code :


$host = "localhost";
$user = "root";
$password = "";

// اتصال اولیه بدون انتخاب دیتابیس
$conn = mysqli_connect($host, $user, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ساخت دیتابیس اگر وجود نداشت
$sql = "CREATE DATABASE IF NOT EXISTS cms CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci";
if (!mysqli_query($conn, $sql)) {
    die("Error creating database: " . mysqli_error($conn));
}

// اتصال به دیتابیس ساخته شده
$connection = mysqli_connect($host, $user, $password, 'cms');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// تعریف تمام جدول‌ها در آرایه
$tables = [
    // menu_tbl
    "CREATE TABLE IF NOT EXISTS menu_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        url VARCHAR(255),
        sort INT(11),
        status ENUM('0','1') DEFAULT '1',
        chid INT(11) DEFAULT 0,
        phone VARCHAR(20),
        email VARCHAR(100),
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // admin_tbl
    "CREATE TABLE IF NOT EXISTS admin_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        password TEXT NOT NULL,
        name VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // contact_tbl
    "CREATE TABLE IF NOT EXISTS contact_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email TEXT NOT NULL,
        subject VARCHAR(255) NOT NULL,
        text TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // news_cat
    "CREATE TABLE IF NOT EXISTS news_cat (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // news_tbl
    "CREATE TABLE IF NOT EXISTS news_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        text TEXT NOT NULL,
        img TEXT NOT NULL,
        news_cat INT(11) NOT NULL,
        date VARCHAR(50) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // page_tbl
    "CREATE TABLE IF NOT EXISTS page_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        keywords TEXT NOT NULL,
        description TEXT NOT NULL,
        body TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // product_cat
    "CREATE TABLE IF NOT EXISTS product_cat (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        status ENUM('0','1') DEFAULT '1',
        sort INT(11),
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // product_tbl
    "CREATE TABLE IF NOT EXISTS product_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        text TEXT NOT NULL,
        procat INT(11) NOT NULL,
        img TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // settings
    "CREATE TABLE IF NOT EXISTS settings (
        id INT(11) NOT NULL AUTO_INCREMENT,
        logo TEXT NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        copyetight TEXT NOT NULL,
        instagram TEXT NOT NULL,
        facebook TEXT NOT NULL,
        linkedin TEXT NOT NULL,
        twitter TEXT NOT NULL,
        phone VARCHAR(50) NOT NULL,
        email TEXT NOT NULL,
        address TEXT NOT NULL,
        location_map TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // uploader_tbl
    "CREATE TABLE IF NOT EXISTS uploader_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        img TEXT NOT NULL,
        size INT(11) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // v_cart_tbl
    "CREATE TABLE IF NOT EXISTS v_cart_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        user_id INT(11) NOT NULL,
        product_id INT(11) NOT NULL,
        quantity INT(11) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // v_orders
    "CREATE TABLE IF NOT EXISTS v_orders (
        id INT(11) NOT NULL AUTO_INCREMENT,
        user_id INT(11) NOT NULL,
        status ENUM('pending','approved','rejected') DEFAULT 'pending',
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // v_order_items
    "CREATE TABLE IF NOT EXISTS v_order_items (
        id INT(11) NOT NULL AUTO_INCREMENT,
        order_id INT(11) NOT NULL,
        product_id INT(11) NOT NULL,
        quantity INT(11) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // v_users_tbl
    "CREATE TABLE IF NOT EXISTS v_users_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;",

    // widget_tbl
    "CREATE TABLE IF NOT EXISTS widget_tbl (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(100) NOT NULL,
        img TEXT NOT NULL,
        text TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;"
];


foreach ($tables as $sql) {
    if (mysqli_query($connection, $sql)) {
        echo "Table created successfully.<br>";
    } else {
        echo "Error creating table: " . mysqli_error($connection) . "<br>";
    }
}

















