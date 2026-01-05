<?php
create_default_settings();
$result = settings();
if(isset($_REQUEST['btn'])){
    $data = $_REQUEST['frm'];
    $folder_name = "logo ➤ " . rand();
    $pic = uploader_pic('img', "../Site+1/images/pic_upload_settings/", $folder_name , "logo");
    edit_show_settings($result['id'],$data, $pic);
    $result = settings();

}


?>

<!DOCTYPE html>

<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش تنظیمات سایت</title>
    <style>
        body { font-family: vazirmatn, sans-serif; background: #f3f4f6; margin:0; padding:0; }
        .container { max-width: 700px; margin:40px auto; background:#fff; padding:25px; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.08);}
        h2{text-align:center; color:#333;}
        .item{margin-bottom:15px;}
        .item label{display:block; font-weight:bold; margin-bottom:5px; color:#555;}
        .item input, .item textarea{width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px; font-size:14px;}
        .item textarea{resize:vertical;}
        .btn-submit{display:block; width:100%; padding:14px; background:#6366f1; color:#fff; text-align:center; border:none; border-radius:10px; font-size:16px; cursor:pointer;}
        .btn-submit:hover{background:#4f46e5;}
    </style>
</head>
<body>
<div class="container">
    <h2>ویرایش تنظیمات سایت</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="item"><label>لوگو:</label><input type="file" name="img"></div>
        <div class="item"><label>عنوان سایت:</label><input type="text" name="frm[title]" value="<?php echo $result['title']; ?>"></div>
        <div class="item"><label>توضیحات (Description):</label><textarea name="frm[description]"><?php echo $result['description']; ?></textarea></div>
        <div class="item"><label>کپی‌رایت:</label><input type="text" name="frm[copyright]" value="<?php echo $result['copyright']; ?>"></div>
        <div class="item"><label>اینستاگرام:</label><input type="text" name="frm[instagram]" value="<?php echo $result['instagram']; ?>"></div>
        <div class="item"><label>فیسبوک:</label><input type="text" name="frm[facebook]" value="<?php echo $result['facebook']; ?>"></div>
        <div class="item"><label>لینکدین:</label><input type="text" name="frm[linkedin]" value="<?php echo $result['linkedin']; ?>"></div>
        <div class="item"><label>توییتر:</label><input type="text" name="frm[twitter]" value="<?php echo $result['twitter']; ?>"></div>
        <div class="item"><label>تلفن:</label><input type="text" name="frm[phone]" value="<?php echo $result['phone']; ?>"></div>
        <div class="item"><label>ایمیل:</label><input type="email" name="frm[email]" value="<?php echo $result['email']; ?>"></div>
        <div class="item"><label>آدرس:</label><input type="text" name="frm[address]" value="<?php echo $result['address']; ?>"></div>
        <div class="item"><label>نقشه (Location Map):</label><textarea name="frm[location_map]"><?php echo $result['location_map']; ?></textarea></div>


        <button type="submit" class="btn-submit" name="btn">ذخیره تغییرات</button>


    </form>
</div>
</body>
</html>
