<?php
function add_news_cat($data)
{
    $connection = config();
    $sql = "INSERT INTO news_cat (title) VALUES ('$data[title]')";
    $result = mysqli_query($connection, $sql);
}

function list_news_cat_admin()
{
    $connection = config();
    $sql = "SELECT * FROM news_cat";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;

}

function delete_news_cat($id)
{
    $connection = config();
    $sql = "DELETE FROM news_cat WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}

function show_news_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM news_cat WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}

function edit_show_news($data,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE news_cat SET title= '$data[title]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}

function insert_Fake_news_cat_Categories() {
    $connection = config();

    // خالی کردن جدول برای تست
//    mysqli_query($connection, "TRUNCATE TABLE product_cat");

    $sql = "INSERT INTO news_cat (title) VALUES
        ('میوه‌های فصل'),
        ('خواص میوه‌ها'),
        ('آموزش مصرف و نگهداری میوه'),
        ('طرز تهیه نوشیدنی‌ها و اسموتی‌ها'),
        ('دسرهای میوه‌ای'),
        ('میوه‌های خارجی و خاص'),
        ('تغذیه سالم و رژیمی'),
        ('مقالات علمی و تحقیقات'),
        ('باغداری و کشاورزی'),
        ('فروش و بازار میوه'),
        ('میوه و کودک'),
        ('میوه و پوست و زیبایی'),
        ('آموزش برش و تزئین میوه'),
        ('میوه و فرهنگ'),
        ('اخبار و ترندها')";

    mysqli_query($connection, $sql);
}












