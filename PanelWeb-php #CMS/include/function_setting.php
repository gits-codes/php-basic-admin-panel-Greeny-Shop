<?php

function create_default_settings()
{
    $connection = config();
    $check = mysqli_query($connection, "SELECT COUNT(*) AS cnt FROM settings");
    $count = mysqli_fetch_assoc($check)['cnt'];

    if ($count == 0) {
        $sql = "INSERT INTO settings 
            (logo, title, description, copyright,instagram, facebook, linkedin, twitter,phone, email, address, location_map)
            VALUES
            ('', '', '','','','','','','', '', '','')";

        mysqli_query($connection, $sql);
    }
}

function settings()
{
    $connection = config();
    $sql = "SELECT * FROM settings LIMIT 1";
    $row = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($row);
    return $result;
}

function edit_show_settings($id ,$data, $img)
{
    $connection = config();

    if (!empty($img)) {
        $logo_sql = "logo = '$img',";
    } else {
        $logo_sql = "";
    }

    $sql = "UPDATE settings SET 
            $logo_sql
            title = '{$data['title']}',
            description = '{$data['description']}',
            copyright = '{$data['copyright']}',
            instagram = '{$data['instagram']}',
            facebook = '{$data['facebook']}',
            linkedin = '{$data['linkedin']}',
            twitter = '{$data['twitter']}',
            phone = '{$data['phone']}',
            email = '{$data['email']}',
            address = '{$data['address']}',
            location_map = '{$data['location_map']}'
            WHERE id = '$id'";

    mysqli_query($connection, $sql);
}




/*
function add_menu($data)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO menu_tbl (title,url,status,chid,sort,email,phone) VALUES ('$data[title]','$data[url]','$data[status]','$data[parent]','$data[sort]','$data[email]','$data[phone]')";
    $result = mysqli_query($connection, $sql);
}

function submenu()
{
    $connection = config();
    $sql = "SELECT * FROM menu_tbl WHERE chid='0'";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;

}

function list_menu_admin()
{
    $connection = config();
    $sql = "SELECT * FROM menu_tbl";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}

function select_list_menu_admin($chid)
{
    $connection = config();
    $sql = "SELECT * FROM menu_tbl WHERE id='$chid'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);
    return $row['title'];

}

function delete_menu_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM menu_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}



//اینسرت زیاد برای تلف نشدن وقت

//function insert_fake()
//{
//    $connection = config();
//
//    // منوهای اصلی
//    $mainMenus = [
//        ['خانه', 'index.php'],
//        ['اخبار', 'news.php'],
//        ['دانلودها', 'downloads.php'],
//        ['محصولات', 'products.php'],
//        ['تماس با ما', 'contact.php'],
//        ['درباره ما', 'about.php'],
//        ['پشتیبانی', 'support.php'],
//    ];
//
//    $mainIds = [];
//
//    foreach ($mainMenus as $i => $menu) {
//        $title = mysqli_real_escape_string($connection, $menu[0]);
//        $url = mysqli_real_escape_string($connection, $menu[1]);
//        mysqli_query($connection, "INSERT INTO menu_tbl (title,url,status,chid,sort) VALUES ('$title','$url','1',0,".($i+1).")");
//        $mainIds[$title] = mysqli_insert_id($connection);
//    }
//
//    // زیرمجموعه‌ها (۲ تا برای هرکدوم)
//    $children = [
//        'خانه'       => ['ویژگی‌ها', 'تازه‌ها'],
//        'اخبار'      => ['مقالات', 'رویدادها'],
//        'دانلودها'   => ['بروزرسانی‌ها', 'راهنماها'],
//        'محصولات'    => ['دسته‌بندی‌ها', 'پرفروش‌ها'],
//        'تماس با ما' => ['شبکه‌ها', 'نقشه محل'],
//        'درباره ما'  => ['تیم ما', 'تاریخچه'],
//        'پشتیبانی'   => ['سؤالات متداول', 'ارسال تیکت'],
//    ];
//
//    foreach ($children as $parent => $subs) {
//        $chid = $mainIds[$parent] ?? 0;
//        $sort = 1;
//        foreach ($subs as $sub) {
//            $title = mysqli_real_escape_string($connection, $sub);
//            mysqli_query($connection, "INSERT INTO menu_tbl (title,url,status,chid,sort) VALUES ('$title','#','1',$chid,$sort)");
//            $sort++;
//        }
//    }
//}




function show_menu_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM menu_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}

function edit_show_menu($data,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE menu_tbl SET title= '$data[title]',url='$data[url]',status='$data[status]',chid='$data[parent]',sort='$data[sort]',phone='$data[phone]',email='$data[email]' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

}



function list_menu_defult() {
    $connection = config();
    $sql = "SELECT * FROM menu_tbl WHERE status='1' AND chid = '0' AND title NOT IN ('phone', 'email') ORDER BY sort ASC";

    $res = mysqli_query($connection, $sql);
    $result = [];

    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $result[] = $row;
        }
    }

    return $result;
}
function list_sub_menu_defult($id)
{
    $connection = config();
    $sql = "SELECT * FROM menu_tbl WHERE status='1' AND chid = '$id' ORDER BY sort ASC";
    $row = mysqli_query($connection, $sql);
    if (mysqli_num_rows($row) > 0) {
        while ($res = mysqli_fetch_assoc($row)){
            $result[] = $res;
        }
        return $result;
    }
}

function get_contact_info() {
    $connection = config();

    // چون title فارسیه، باید توی شرط همینو بنویسی
    $query = "SELECT title, phone, email, status FROM menu_tbl WHERE title IN ('phone', 'email')";
    $result = mysqli_query($connection, $query);

    $contact = ['phone' => '', 'email' => ''];

    if (!$result) {
        error_log("MySQL error in get_contact_info: " . mysqli_error($connection));
        return $contact;
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = trim($row['title']);
            $status = isset($row['status']) ? (int)$row['status'] : 1;

            if ($status === 1) {
                if ($title === 'phone' && !empty($row['phone'])) {
                    $contact['phone'] = $row['phone'];
                }

                if ($title === 'email' && !empty($row['email'])) {
                    $contact['email'] = $row['email'];
                }
            }
        }
    }

    return $contact;
}
*/










