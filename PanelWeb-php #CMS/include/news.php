<?php
function add_news_cat($data,$path)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO news_tbl (title,text,img,news_cat,date) VALUES ('$data[title]','$data[text]','$path','$data[news_cat]','$data[date]')";
    $result = mysqli_query($connection, $sql);
}
function list_news_cat_admin()
{
    $connection = config();
    $sql = "SELECT * FROM news_tbl";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function edit_show_news_cat($data,$path,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE news_tbl SET title= '$data[title]',text='$data[text]',img = '$path',news_cat = '$data[news_cat]',date = '$data[date]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}




function insert_Fake_News()
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
        'روش‌های باغداری بهینه',
        'بازار میوه و قیمت‌های روز'
    ];

    $texts = [
        "میوه‌های تابستانی امسال با کیفیت و تازگی بیشتری عرضه می‌شوند.\nتوصیه می‌شود مصرف روزانه میوه را فراموش نکنید.",
        "خواص هر میوه برای سلامتی بسیار مهم است.\nبا مطالعه این مطلب، انتخاب بهتری خواهید داشت.",
        "با این ترفندها می‌توانید میوه‌ها را تا هفته‌ها تازه نگه دارید.\nنیاز به ابزار خاصی ندارید.",
        "طرز تهیه نوشیدنی‌های سالم و طبیعی با میوه‌های فصل.\nیک انتخاب مناسب برای روزهای گرم.",
        "دسرهای متنوع و خوشمزه با میوه‌های تازه و سالم.\nایده‌های آسان برای خانه و مهمانی.",
        "میوه‌های خارجی و خاص این ماه را بشناسید.\nاز خواص و طعم متفاوت آنها لذت ببرید.",
        "تغذیه سالم با میوه و سبزیجات؛ راهنمای روزانه برای بدن قوی و سالم.\nنکات ساده اما کاربردی.",
        "جدیدترین تحقیقات علمی درباره تاثیر میوه‌ها بر سلامتی.\nمطالب علمی و مستند.",
        "روش‌های بهینه باغداری و پرورش میوه با کیفیت بالا.\nمناسب برای کشاورزان و علاقه‌مندان.",
        "بازار میوه و قیمت‌های روزانه.\nنکات خرید هوشمندانه برای مصرف‌کننده."
    ];

    for ($i = 0; $i < count($titles); $i++) {
        $title = $titles[$i];
        $text = $texts[$i];
        $news_cat = rand(1, 15);
        $img = "../Site+1/images/uploader_from_news/all pic for test/". rand(1, 8). ".jpg";

        $year = rand(1404, 1408);
        $month = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $day = str_pad(rand(1, 28), 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$day";

        $sql = "INSERT INTO news_tbl (title, text, img, news_cat, date) 
                VALUES ('$title', '$text', '$img', $news_cat, '$date')";
        mysqli_query($conn, $sql);
    }
}








function show_news_tbl_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM news_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}
function delete_news_tbl_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM news_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}

function list_news_defult()
{
    $connection = config();
    $sql = "SELECT * FROM news_tbl";
    $row = mysqli_query($connection, $sql);
    while ($res = mysqli_fetch_assoc($row)) {
        $result[] = $res;
    }
    return $result;

}

function select_news_cat()
{
    $connection = config();
    $sql = "SELECT * FROM news_cat";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function select_news_cat_with_id($id)
{
    $connection = config();
    $sql = "SELECT title FROM news_cat WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row['title'];
    }
    return '';
}

