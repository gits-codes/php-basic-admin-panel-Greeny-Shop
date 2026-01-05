<?php

function add_widget($data,$path)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO widget_tbl (title,text,img) VALUES ('$data[title]','$data[text]','$path')";
    $result = mysqli_query($connection, $sql);
}


function list_widget_admin()
{
    $connection = config();
    $sql = "SELECT * FROM widget_tbl";
    $res = mysqli_query($connection, $sql);
//    $result = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}

function delete_widget_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM widget_tbl WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
}
function show_widget_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM widget_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}

function edit_show_widget($data,$path,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE widget_tbl SET title= '$data[title]',img = '$path' ,text='$data[text]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}



function insert_Widget_fake()
{
    $conn = config();

    $titles = [
        'افزایش کیفیت میوه‌های تابستانی',
        'خواص تازه‌ترین میوه‌های فصل',
        'ترفندهای نگهداری میوه در خانه',
        'طرز تهیه نوشیدنی‌های طبیعی با میوه',
        'دسرهای خوشمزه با میوه‌های تازه',
        'میوه‌های خارجی و خاص این ماه',
        'تغذیه سالم با میوه و سبزیجات',
        'جدیدترین تحقیقات درباره میوه‌ها',
        'بازار میوه و قیمت‌های روز'
    ];

    $texts = [
        "میوه‌های تابستانی با کیفیت و تازه عرضه می‌شوند.",
        "خواص هر میوه تازه برای سلامتی مفید است.",
        "نگهداری میوه‌ها تا هفته‌ها با روش ساده.",
        "طرز تهیه نوشیدنی سالم و طبیعی با میوه.",
        "دسرهای خوشمزه و آسان با میوه‌های تازه.",
        "میوه‌های خارجی و خاص این ماه را بشناسید.",
        "تغذیه سالم با میوه و سبزیجات روزانه.",
        "جدیدترین تحقیقات علمی درباره تاثیر میوه‌ها.",
        "نکات خرید هوشمندانه در بازار میوه."
    ];

    $images = range(1, 9);
    shuffle($images);

    for ($i = 0; $i < 9; $i++) {
        $img = "../Site+1/images/uploader_from_widget/pic_widget_test/" . $images[$i] . ".jpg";

        $sql = "INSERT INTO widget_tbl (title, text, img) VALUES (
            '{$titles[$i]}',
            '{$texts[$i]}',
            '$img'
        )";

        mysqli_query($conn, $sql);
    }
}







