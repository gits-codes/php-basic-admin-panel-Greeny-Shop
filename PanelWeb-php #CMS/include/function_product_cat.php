<?php
function add_product_cat($data)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO product_cat (title,status,sort) VALUES ('$data[title]','$data[status]','$data[sort]')";
    $result = mysqli_query($connection, $sql);
}
function list_product_cat_admin()
{
    $connection = config();
    $sql = "SELECT * FROM product_cat";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function edit_show_product_cat($data,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE product_cat SET title= '$data[title]',status='$data[status]',sort='$data[sort]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}
function show_product_cat_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM product_cat WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}
function delete_product_cat_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM product_cat WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}


//اینسرت زیاد برای تلف نشدن وقت
function insert_Fake_Product_Categories() {
    $connection = config();

    // خالی کردن جدول برای تست
//    mysqli_query($connection, "TRUNCATE TABLE product_cat");

    $sql = "INSERT INTO product_cat (title, status, sort) VALUES
        ('میوه‌های تازه', '1', 1),
        ('سبزیجات', '1', 2),
        ('خشکبار', '1', 3),
        ('آجیل و مغزها', '1', 4),
        ('میوه خشک', '1', 5),
        ('آبمیوه طبیعی', '1', 6),
        ('سبد میوه هدیه', '1', 7),
        ('محصولات ارگانیک', '1', 8),
        ('عسل و فرآورده‌های زنبور', '1', 9),
        ('ترشی و مربا خانگی', '1', 10)";

    mysqli_query($connection, $sql);
}

