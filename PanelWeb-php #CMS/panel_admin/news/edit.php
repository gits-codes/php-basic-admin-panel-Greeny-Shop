<?php
$id = $_REQUEST['id'];
$result = show_news_tbl_edit($id);

if (isset($_POST['btn'])) {
    $data = $_POST['frm'];

    // بررسی اینکه فایل آپلود شده یا نه
    if (!empty($_FILES['img']['name'])) {
        $folders = "-news-" . rand();
        $path = uploader_pic('img', "../Site+1/images/uploader_from_news/", $data['title'].$folders, "product");
    } else {
        // اگر تصویر آپلود نشد، همان تصویر قبلی را نگه دار
        $path = $result['img'];
    }

    // فراخوانی تابع ویرایش محصول همیشه
    edit_show_news_cat($data, $path, $id);
}
?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ویرایش محصول</title>
    <link rel="stylesheet" href="assets/css/bootstrap-icons-1.13.1/bootstrap-icons.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Vazirmatn", Tahoma, sans-serif;
            background: #f0f2f5;
            color: #111827;
            min-height: 100vh;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px;
            margin-top: 130px;
        }

        .card {
            width: 100%;
            max-width: 700px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-body {
            padding: 20px 30px 30px 30px;
        }

        h5.card-title {
            margin-bottom: 20px;
            color: #2563eb;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            font-weight: 500;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: all 0.25s ease;
            font-size: 14px;
        }

        .btn i {
            font-size: 15px;
        }

        .btn-add {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        .btn-add:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            transform: translateY(-2px);
        }

        .btn-reload {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
        }

        .btn-reload:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        select.form-control {
            height: 42px;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .custom-radio-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .custom-radio {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.2s ease;
        }

        .custom-radio:hover {
            background-color: #eff6ff;
            border-color: #2563eb;
        }

        .custom-radio input[type="radio"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #2563eb;
            background: #fff;
            cursor: pointer;
        }

        .custom-radio input[type="radio"]:checked {
            background-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08);
        }

        .text-center {
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .mt-3 {
            margin-top: 16px;
        }

        .avatar-wrapper {
            display: flex;
            justify-content: center;
            margin: 15px 0 25px;
        }

        .avatar-wrapper img {
            width: 130px;
            height: 130px;
            border-radius: 12px;
            border: 3px dashed #cbd5e1;
            object-fit: cover;
            cursor: pointer;
            background: #f0f0f0 url('/panel_admin/assets/images/9928.jpg') center center no-repeat;
            background-size: 50px 50px;
            transition: all 0.25s ease;
        }

        .avatar-wrapper img:hover {
            border-color: #2563eb;
            background-color: #f5f3ff;
        }

        /* رسپانسیو کامل */
        @media (max-width: 768px) {
            .form-wrapper {
                margin-top: 100px;
                padding: 15px;
            }

            .card-body {
                padding: 18px 20px;
            }

            .table-header {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .avatar-wrapper img {
                width: 110px;
                height: 110px;
                background-size: 40px 40px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            h5.card-title {
                font-size: 20px;
            }

            .form-control {
                font-size: 13px;
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>

<div class="form-wrapper">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <!-- دکمه‌ها بالا -->
                <div class="table-header">
                    <button class="btn btn-reload" onclick="location.reload()">
                        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
                    </button>
                    <a href="dashbord.php?m=news&p=add">
                        <button class="btn btn-add"><i class="bi bi-plus-lg"></i> افزودن خبر</button>
                    </a>
                </div>

                <h5 class="card-title">ویرایش خبر: <?= $result['title'] ?></h5>

                <form method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label>عنوان خبر</label>
                        <input type="text" name="frm[title]" class="form-control" required
                               value="<?= $result['title'] ?>" placeholder="مثلاً: عطر Oud Mood">
                    </div>
                    <div class="form-group">
                        <label>تاریخ خبر</label>
                        <input type="date" name="frm[date]" class="form-control" required
                               value="<?= $result['date'] ?>" placeholder="مثلاً: عطر Oud Mood">
                    </div>

                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea name="frm[text]" id="editors" class="form-control" placeholder="توضیح کوتاهی درباره آن وارد کنید..."><?= isset($result['text']) ? $result['text'] : '' ?></textarea>
                        <script src="/panel_admin/assets/ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace('editors', {
                                language:'en',
                                contentsLangDirection:'rtl',
                                height:200,
                                toolbarGroups:[
                                    {name:'basicstyles', groups:['basicstyles','cleanup']},
                                    {name:'paragraph', groups:['list','indent','blocks','align']},
                                    {name:'styles'},
                                    {name:'colors'},
                                    {name:'insert'}
                                ],
                                removeButtons:'Underline,Subscript,Superscript',
                                font_names:'Arial;Tahoma;Vazirmatn;Times New Roman;Courier New'
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label>دسته‌بندی</label>
                        <select name="frm[news_cat]" class="form-control">

                            <?php
                            $news = select_news_cat();
                            foreach ($news as $subs) {
                                echo "<option value=\"$subs[id]\" ";
                                if ($result['news_cat'] == $subs['id']) echo " selected ";
                                echo ">$subs[title]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="avatar-wrapper">
                        <img src="../<?= $result['img'] ?>" id="avatarPreview" alt="">
                        <input type="file" name="img" id="avatarInput" accept="image/*" style="display:none;">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" name="btn" class="btn btn-primary">ویرایش محصول</button>
                        <a href="dashbord.php?m=news&p=list">
                            <button type="button" class="btn btn-secondary">لغو</button>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    const avatar = document.getElementById('avatarPreview');
    const input = document.getElementById('avatarInput');

    avatar.addEventListener('click', () => input.click());

    input.addEventListener('change', () => {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                avatar.src = e.target.result;
                avatar.style.background = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>

</body>
</html>
