<?php
if (isset($_POST['btn'])) {
    $data = $_POST['frm'];
    $folders = " - pro - ".rand();
    $path = uploader_pic('img',"../Site+1/images/uploader_from_product/",$data['title'].$folders,"product");
    add_product($data,$path);

//    var_dump($path); die;

}
//insertFakeProducts();

?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>افزودن محصول جدید</title>
    <style>
        * { box-sizing: border-box; margin:0; padding:0; }

        body {
            font-family: "Vazirmatn", Tahoma, sans-serif;
            background: #f0f2f5;
            color: #111827;
        }

        /* wrapper وسط چین و کمی بالاتر */
        .form-wrapper {
            min-height: 107vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 7%;
            transform: translateY(-100px); /* حدود 100px بالاتر */
        }

        /* کارت فرم */
        .form-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px 25px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .form-card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #6b21a8;
            font-size: 24px;
            font-weight: 700;
        }

        .form-group { margin-bottom: 18px; }
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
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,0.08);
        }

        select.form-control { height: 42px; }
        textarea.form-control { min-height: 100px; resize: vertical; }

        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
            margin: 0 5px;
        }

        .btn-primary { background-color: #6b21a8; color: #fff; }
        .btn-primary:hover { background-color: #581c87; }
        .btn-secondary { background-color: #e5e7eb; color: #111827; }
        .btn-secondary:hover { background-color: #d6d7df; }

        .text-center { text-align: center; }

        /* Avatar / تصویر محصول */
        .avatar-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            margin-bottom: 25px;
        }

        .avatar-wrapper img {
            width: 130px;
            height: 130px;
            border-radius: 12px;
            border: 3px dashed #cbd5e1;
            object-fit: cover;
            cursor: pointer;
            /* آیکون آپلود تصویر */
            background: #f0f0f0 url('/panel_admin/assets/images/9928.jpg') center center no-repeat;
            background-size: 50px 50px;
            transition: all 0.25s ease;
        }

        .avatar-wrapper img:hover {
            border-color: #7c3aed;
            background-color: #f5f3ff;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .form-card { padding: 20px 15px; }
            .avatar-wrapper img { width: 110px; height: 110px; background-size: 35px 35px; }
        }
    </style>
</head>
<body>

<div class="form-wrapper">
    <div class="form-card">
        <h2>افزودن محصول جدید</h2>
        <form method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label>عنوان محصول</label>
                <input type="text" name="frm[title]" class="form-control" placeholder="مثلاً: اسپری عطر Oud Mood" required>
            </div>

            <div class="form-group">
                <label>توضیحات</label>
                <textarea name="frm[text]" id="editors" class="form-control" placeholder="توضیح کوتاهی درباره آن وارد کنید..."></textarea>
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
                <label>قیمت</label>
                <input type="number" name="frm[price]" class="form-control" placeholder="قیمت را وارد کنید" required>
            </div>
            <div class="form-group">
                <label>دسته‌بندی</label>
                <select name="frm[procat]" class="form-control">
                    <?php
                    $procat = procat();
                    foreach ($procat as $val) {
                        $id = htmlspecialchars($val['id']);
                        $title = htmlspecialchars($val['title']);
                        echo "<option value=\"{$id}\">{$title}</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="avatar-wrapper">
                <img src="" id="avatarPreview" alt="">
                <input type="file" name="img" id="avatarInput" accept="image/*" style="display:none;">
            </div>

            <div class="text-center">
                <button type="submit" name="btn" class="btn btn-primary">ثبت محصول</button>
                <a href="dashbord.php?m=product&p=list">
                    <button type="button" class="btn btn-secondary">لغو</button>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    const avatar = document.getElementById('avatarPreview');
    const input = document.getElementById('avatarInput');

    avatar.addEventListener('click', ()=> input.click());

    input.addEventListener('change', ()=> {
        if(input.files && input.files[0]){
            const reader = new FileReader();
            reader.onload = e => { avatar.src = e.target.result; avatar.style.background='none'; }
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>

</body>
</html>
