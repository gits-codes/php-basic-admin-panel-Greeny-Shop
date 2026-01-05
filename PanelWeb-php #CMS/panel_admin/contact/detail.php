<?php
$id = $_REQUEST['id'];
$result = show_contact_detail($id);

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نمایش پیام کاربر</title>

    <style>
        body {
            font-family: vazirmatn, sans-serif;
            margin: 0;
            padding: 0;
            background: #f3f4f6;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        .item {
            margin-bottom: 18px;
        }

        .item label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #555;
        }

        .item div {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 12px;
            border-radius: 10px;
            font-size: 15px;
            color: #444;
            line-height: 1.8;
            word-break: break-word;
        }

        .btn-back {
            display: block;
            width: 100%;
            padding: 14px;
            background: #6366f1;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            text-decoration: none;
            margin-top: 25px;
            font-size: 16px;
        }

        .btn-back:hover {
            background: #4f46e5;
        }

        @media(max-width: 480px){
            .container{
                margin: 15px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>جزئیات پیام کاربر</h2>

    <div class="item">
        <label>نام:</label>
        <div><?php echo $result['name']; ?></div>
    </div>

    <div class="item">
        <label>ایمیل:</label>
        <div><?php echo $result['email']; ?></div>
    </div>

    <div class="item">
        <label>موضوع پیام:</label>
        <div><?php echo $result['subject']; ?></div>
    </div>

    <div class="item">
        <label>متن پیام:</label>
        <div><?php echo nl2br($result['text']); ?></div>
    </div>

    <a href="dashbord.php?m=contact&p=list" class="btn-back">بازگشت به لیست پیام‌ها</a>
</div>

</body>
</html>

