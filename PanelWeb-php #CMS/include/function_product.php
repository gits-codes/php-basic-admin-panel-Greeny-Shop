<?php
function add_product($data,$path)
{
    $connection = config();
    $sql = "INSERT INTO product_tbl (title,text,procat,img,price) VALUES ('$data[title]','$data[text]','$data[procat]','$path','$data[price]')";
    $result = mysqli_query($connection, $sql);
}

function procat()
{
    $connection = config();
    $sql = "SELECT * FROM product_cat WHERE status = '1'";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;

}

function list_product_admin()
{
    $connection = config();
    $sql = "SELECT * FROM product_tbl";
    $row = mysqli_query($connection, $sql);
    $result = [];
    while ($val = mysqli_fetch_assoc($row)) {
        $result[] = $val;
    }
    return $result;
}

function select_product_admin($pro_cat_id)
{
    $connection = config();
    $sql = "SELECT * FROM product_cat WHERE id = '$pro_cat_id'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);
    return $row['title'];

}

//fake insert
function insertFakeProducts()
{
    $conn = config();

    $titles = [
        'سیب قرمز تازه', 'موز رسیده درجه یک', 'گوجه‌فرنگی گلخانه‌ای', 'خیار گلخانه‌ای تازه',
        'هندوانه آبدار تابستانی', 'سیب‌زمینی خورشتی ممتاز', 'هویج محلی تازه', 'فلفل دلمه‌ای سبز',
        'سبزی خوردن تازه (بسته‌ای)', 'ترشی مخلوط خانگی', 'خیارشور خانگی شیشه‌ای', 'پرتقال والنسیا',
        'لیموترش تازه', 'سیر محلی ممتاز', 'پیاز زرد خورشتی', 'کلم قرمز تازه',
        'مربای بالنگ خانگی', 'زیتون پرورده محلی', 'ریحان معطر بسته‌ای', 'ترشی لیمو و انجیر'
    ];

    $texts = [
        "با بافت ترد و طعم شیرین-ملسی. مناسب برای میان‌وعده‌های سالم و خوشمزه. مصرف روزانه آن باعث افزایش انرژی و نشاط می‌شود. با رنگ و عطر طبیعی و تازه عرضه می‌شود.",
        "موز زرد رسیده با عطر دلپذیر و بافت نرم و لطیف. این موزها انتخاب عالی برای اسموتی و دسرهای خانگی هستند. شیرینی طبیعی آنها بدون افزودنی، تجربه‌ای سالم و خوشمزه فراهم می‌کند.",
        "گوجه‌فرنگی گوشتی و آبدار، مناسب برای سالاد و تهیه سس خانگی. با طعم شیرین و طبیعی و عطر دلنشین. کیفیت بالا و تازه بودن آن تضمین شده است.",
        "خیار ترد و خنک، تازه برداشت شده و بدون مواد نگهدارنده. مصرف روزانه آن باعث حفظ رطوبت بدن و شادابی پوست می‌شود. ایده‌آل برای سالاد و نوشیدنی‌های خنک.",
        "هندوانه شیرین با بافت آبدار و رنگ قرمز جذاب. مناسب برای روزهای گرم تابستان، میان‌وعده‌ای سالم و انرژی‌بخش. تازه و خوش‌طعم برای خانواده و مهمانی‌ها.",
        "سیب‌زمینی چندمنظوره، مناسب برای خورشت، سرخ‌کردنی و پوره. تازه و با کیفیت، بدون مواد افزودنی. طعم عالی و بافت نرم بعد از پخت دارد.",
        "هویج نارنجی، شیرین و ترد، سرشار از ویتامین و مواد معدنی. مناسب برای میان‌وعده، سالاد یا پخت غذاهای متنوع. تازه و عاری از مواد نگهدارنده.",
        "فلفل دلمه‌ای ترد و خوش‌رنگ، مناسب برای سالاد، خوراک و تزئین غذا. با رنگ طبیعی و عطر ملایم. تازه و بدون افزودنی، گزینه‌ای سالم و خوشمزه.",
        "مخلوطی از سبزیجات تازه شامل کاهو، گوجه، خیار و فلفل دلمه‌ای. تازه، تمیز و آماده مصرف. مناسب برای سالاد و وعده‌های سالم روزانه.",
        "ترشی مخلوط شامل خیارشور، گل‌کلم و هویج، با طعم ملایم و سنتی. تازه و بدون مواد نگهدارنده مصنوعی. تجربه‌ای خوشمزه برای همراه با غذاهای خانگی.",
        "خیارشور خانگی با رایحه‌ی سبزیجات و طعم خاص. تازه و خوشمزه، بدون مواد نگهدارنده. مناسب برای مصرف روزانه و سرو همراه وعده‌های مختلف.",
        "پرتقال آبدار و شیرین، مناسب برای آبمیوه طبیعی و میان‌وعده. تازه برداشت شده و سرشار از ویتامین C. طعم طبیعی و عطر دلنشین دارد.",
        "لیموترش خوش‌آب و معطر، مناسب برای چاشنی، نوشیدنی و دسر. تازه و سالم، با عطر طبیعی و بدون مواد افزودنی. برای استفاده روزانه ایده‌آل است.",
        "سیر با طعم قوی و عطری، تازه و خوش‌طعم. مناسب برای تهیه انواع خوراک‌ها و غذاهای سنتی. بدون مواد نگهدارنده، انتخابی سالم و طبیعی.",
        "پیاز زرد با طعم شیرین‌شده پس از پخت، تازه و با کیفیت بالا. مناسب برای انواع خوراک‌ها و پخت و پز روزانه. بدون افزودنی و عاری از مواد نگهدارنده.",
        "کلم قرمز ترد و رنگی، تازه برداشت شده و سرشار از ویتامین و آنتی‌اکسیدان. مناسب برای سالاد، خوراک و تزئین غذاهای متنوع.",
        "مربای بالنگ با بافت شفاف و طعم متعادل، خانگی و تازه. بدون مواد افزودنی، تجربه‌ای خوشمزه و سنتی برای صبحانه و میان‌وعده.",
        "زیتون پرورده با چاشنی محلی، تازه و خوش‌طعم. مناسب برای سرو با غذا و صبحانه. بدون مواد نگهدارنده مصنوعی، سالم و طبیعی.",
        "ریحان تازه و معطر، مناسب برای سالاد، تزئین غذا و طعم‌دهی طبیعی. تازه برداشت شده و عطر طبیعی دارد.",
        "ترشی خاص با طعم لیمو و انجیر خشک، تازه و خوشمزه. مناسب برای سرو همراه غذا و میان‌وعده‌های سنتی. بدون مواد نگهدارنده."
    ];



    for ($i = 0; $i < 20; $i++) {
        $title = $titles[$i];
        $text = $texts[$i];
        $procat = rand(1, 10);
        $img = "../Site+1/images/uploader_from_product/product_simple/". rand(1, 20). ".jpg";
        $sql = "INSERT INTO product_tbl (title, text, procat, img) VALUES ('$title', '$text', $procat, '$img')";
        mysqli_query($conn, $sql);
    }
}


function delete_product_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM product_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}

function show_product_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM product_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}

function edit_show_product($data,$img,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE product_tbl SET title= '$data[title]',text='$data[text]',procat='$data[procat]',img = '$img',price = '$data[price]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}
function list_product_defult() {
    $connection = config();
    $sql = "SELECT * FROM product_tbl";
    $row = mysqli_query($connection, $sql);
    while ($res = mysqli_fetch_assoc($row)) {
            $result[] = $res;
        }

    return $result;
}

function sum_product_invoice()
{
    $conn = config();
    $order_id = 5;

    $sql = "SELECT SUM(quantity * price) AS total_price
        FROM v_order_items
        WHERE order_id = '$order_id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $total = $row['total_price'] ?? 0;
    echo "جمع کل: " . number_format($total) . " ریال";

}










