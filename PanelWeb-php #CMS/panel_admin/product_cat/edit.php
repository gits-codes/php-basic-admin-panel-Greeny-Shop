<?php
$id = $_REQUEST['id'];
//var_dump($id);
$result = show_product_cat_edit($id);
if (isset($_REQUEST['btn'])) {
    $data = $_REQUEST['frm'];
    edit_show_product_cat($data,$id);


}

//insert_fake();
?>
<!--<!doctype html>-->
<!--<html lang="fa" dir="rtl">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <title>ویرایش منو</title>-->
<!--    <link rel="stylesheet" href="assets/css/bootstrap-icons-1.13.1/bootstrap-icons.css">-->
<!---->
<!--    <style>-->
<!--        /* ریست کوچک */-->
<!--        * {-->
<!--            box-sizing: border-box;-->
<!--            margin: 0;-->
<!--            padding: 0;-->
<!--        }-->
<!---->
<!--        .body {-->
<!--            background: #f2f4f8;-->
<!--            font-family: "Vazirmatn", Tahoma, Arial, sans-serif;-->
<!--            font-size: 14px;-->
<!--            color: #111827;-->
<!--            -webkit-font-smoothing: antialiased;-->
<!--            -moz-osx-font-smoothing: grayscale;-->
<!--            min-height: 100vh;-->
<!--        }-->
<!---->
<!--        .form-wrapper {-->
<!--            min-height: 100vh;-->
<!--            display: flex;-->
<!--            align-items: center;-->
<!--            justify-content: center;-->
<!--            padding: 20px;-->
<!--            padding-top: 130px;-->
<!--            transform: translateY(-100px);-->
<!--        }-->
<!---->
<!--        .card {-->
<!--            width: 95%;-->
<!--            max-width: 780px;-->
<!--            background: #ffffff;-->
<!--            border-radius: 12px;-->
<!--            box-shadow: 0 8px 30px rgba(16, 24, 40, 0.08);-->
<!--            overflow: hidden;-->
<!--        }-->
<!---->
<!--        .card-body {-->
<!--            padding: 28px;-->
<!--        }-->
<!---->
<!--        h5.card-title {-->
<!--            margin-bottom: 18px;-->
<!--            color: #6b21a8;-->
<!--            text-align: center;-->
<!--            font-size: 20px;-->
<!--            font-weight: 700;-->
<!--        }-->
<!---->
<!--        .row {-->
<!--            display: flex;-->
<!--            flex-wrap: wrap;-->
<!--            margin: 0 -8px;-->
<!--        }-->
<!---->
<!--        .col-sm-3 { width: 25%; padding: 0 8px; }-->
<!--        .col-sm-9 { width: 75%; padding: 0 8px; }-->
<!--        .col-md-6 { width: 100%; padding: 0 8px; }-->
<!---->
<!--        @media (max-width: 768px) {-->
<!--            .col-sm-3, .col-sm-9 { width: 100%; }-->
<!--            .card-body { padding: 18px; }-->
<!--            .form-wrapper { transform: translateY(-50px); }-->
<!--        }-->
<!---->
<!--        .mb-3 { margin-bottom: 14px; }-->
<!--        label.col-form-label {-->
<!--            display: inline-block;-->
<!--            font-size: 14px;-->
<!--            color: #374151;-->
<!--            padding: 8px 0;-->
<!--            text-align: right;-->
<!--        }-->
<!---->
<!--        .form-control {-->
<!--            width: 100%;-->
<!--            padding: 10px 12px;-->
<!--            border-radius: 8px;-->
<!--            border: 1px solid #e6e9ee;-->
<!--            font-size: 14px;-->
<!--            color: #0f172a;-->
<!--            background: #fff;-->
<!--        }-->
<!---->
<!--        .form-control:focus {-->
<!--            outline: none;-->
<!--            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.06);-->
<!--            border-color: #7c3aed;-->
<!--        }-->
<!---->
<!--        select.form-control { height: 40px; }-->
<!---->
<!--        .text-center { text-align: center; }-->
<!---->
<!--        .btn {-->
<!--            display: inline-block;-->
<!--            padding: 9px 16px;-->
<!--            border-radius: 8px;-->
<!--            border: none;-->
<!--            font-weight: 600;-->
<!--            cursor: pointer;-->
<!--            font-size: 14px;-->
<!--        }-->
<!---->
<!--        .btn-primary { background: #6b21a8; color: #fff; }-->
<!--        .btn-primary:hover { background: #581c87; }-->
<!--        .btn-secondary { background: #e6e7ee; color: #111827; }-->
<!--        .btn-secondary:hover { background: #d6d7df; }-->
<!---->
<!--        .custom-radio-group {-->
<!--            display: flex;-->
<!--            flex-direction: column;-->
<!--            gap: 8px;-->
<!--            margin-bottom: 0;-->
<!--            width: 100%;-->
<!--        }-->
<!---->
<!--        .custom-radio {-->
<!--            display: flex;-->
<!--            align-items: center;-->
<!--            justify-content: space-between;-->
<!--            background: #fafafa;-->
<!--            border: 1px solid #e5e7eb;-->
<!--            border-radius: 8px;-->
<!--            padding: 8px 12px;-->
<!--            font-size: 0.95rem;-->
<!--            color: #111827;-->
<!--            transition: all 0.18s ease;-->
<!--            cursor: pointer;-->
<!--        }-->
<!---->
<!--        .custom-radio:hover {-->
<!--            background-color: #f1f5ff;-->
<!--            border-color: #7c3aed;-->
<!--        }-->
<!---->
<!--        .custom-radio input[type="radio"] {-->
<!--            -webkit-appearance: none;-->
<!--            appearance: none;-->
<!--            width: 18px;-->
<!--            height: 18px;-->
<!--            border-radius: 50%;-->
<!--            border: 2px solid #7c3aed;-->
<!--            background: #fff;-->
<!--            position: relative;-->
<!--            cursor: pointer;-->
<!--        }-->
<!---->
<!--        .custom-radio input[type="radio"]:checked {-->
<!--            background-color: #7c3aed;-->
<!--            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.08);-->
<!--        }-->
<!---->
<!--        .mb-4 { margin-bottom: 18px; }-->
<!--        .mb-2 { margin-bottom: 8px; }-->
<!---->
<!--        /* دکمه‌های بالای فرم */-->
<!--        .table-header {-->
<!--            display: flex;-->
<!--            justify-content: space-between;-->
<!--            align-items: center;-->
<!--            width: 95%;-->
<!--            max-width: 780px;-->
<!--            margin: 30px auto 0;-->
<!--        }-->
<!---->
<!--        .btn-add, .btn-reload {-->
<!--            display: inline-flex;-->
<!--            align-items: center;-->
<!--            gap: 6px;-->
<!--            padding: 7px 12px;-->
<!--            font-weight: 500;-->
<!--            border: none;-->
<!--            border-radius: 12px;-->
<!--            cursor: pointer;-->
<!--            color: white;-->
<!--            transition: all 0.25s ease;-->
<!--            box-shadow: 0 4px 6px rgba(0,0,0,0.1);-->
<!--        }-->
<!---->
<!--        .btn-add { background-color: #6b21a8; }-->
<!--        .btn-add:hover { background-color: #9333ea; }-->
<!---->
<!--        .btn-reload { background-color: #6b21a8; }-->
<!--        .btn-reload:hover { background-color: #9333ea; }-->
<!---->
<!--        .btn i { font-size: 14px; }-->
<!--    </style>-->
<!--</head>-->
<!--<body class="body">-->
<!---->
<!--<!-- دکمه‌ها بالای فرم -->
<!--<div class="table-header">-->
<!--    <button class="btn btn-reload" onclick="location.reload()">-->
<!--        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد-->
<!--    </button>-->
<!--    <a href="dashbord.php?m=menu&p=add">-->
<!--        <button class="btn btn-add"><i class="bi bi-plus-lg"></i> افزودن منو</button>-->
<!--    </a>-->
<!--</div>-->
<!---->
<!--<div class="form-wrapper">-->
<!--    <div class="col-md-6">-->
<!--        <div class="card">-->
<!--            <div class="card-body">-->
<!---->
<!--                <h5 class="card-title">ویرایش منو --><?php //echo $result['title']; ?><!--</h5>-->
<!---->
<!--                <form method="post" class="forms-sample" autocomplete="off">-->
<!--                    <!-- عنوان -->
<!--                    <div class="row mb-3">-->
<!--                        <label class="col-sm-3 col-form-label">عنوان منو</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="text" class="form-control" name="frm[title]"-->
<!--                                   placeholder="عنوان منو را وارد کنید" required-->
<!--                                   value="--><?php //echo $result['title']; ?><!--">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- آدرس -->
<!--                    <div class="row mb-3">-->
<!--                        <label class="col-sm-3 col-form-label">آدرس منو</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="text" class="form-control" name="frm[url]"-->
<!--                                   value="--><?php //echo $result['url']; ?><!--" placeholder="لینک منوی مورد نظر را وارد کنید">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- سرگروه -->
<!--                    <div class="row mb-3">-->
<!--                        <label class="col-sm-3 col-form-label">سرگروه</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <select class="form-control" name="frm[parent]">-->
<!--                                <option value="0">سرگروه</option>-->
<!--                                --><?php
//                                $submenu = submenu();
//                                foreach ($submenu as $subs) {
//                                    echo "<option value=\"$subs[id]\" ";
//                                    if ($result['chid'] == $subs['id']) { echo " selected "; }
//                                    echo ">$subs[title]</option>";
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- ترتیب نمایش -->
<!--                    <div class="row mb-3">-->
<!--                        <label class="col-sm-3 col-form-label">ترتیب نمایش</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="text" class="form-control" name="frm[sort]"-->
<!--                                   value="--><?php //echo $result['sort']; ?><!--" placeholder="ترتیب نمایش را وارد کنید">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- وضعیت -->
<!--                    <div class="row mb-3 align-items-center">-->
<!--                        <label class="col-sm-3 col-form-label">وضعیت</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <div class="custom-radio-group">-->
<!--                                <label class="custom-radio">-->
<!--                                    فعال-->
<!--                                    <input type="radio" name="frm[status]" value="1" --><?php //if ($result['status'] == 1) echo "checked"; ?><!-- >-->
<!--                                </label>-->
<!--                                <label class="custom-radio">-->
<!--                                    غیرفعال-->
<!--                                    <input type="radio" name="frm[status]" value="0" --><?php //if ($result['status'] == 0) echo "checked"; ?><!-- >-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- دکمه‌های فرم -->
<!--                    <div class="text-center mt-3">-->
<!--                        <button type="submit" name="btn" class="btn btn-primary">ویرایش</button>-->
<!--                        <a href="dashbord.php?m=menu&p=list">-->
<!--                            <button type="button" class="btn btn-secondary">لغو</button>-->
<!--                        </a>-->
<!--                    </div>-->
<!---->
<!--                </form>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->
<!------------------------------------------------>
<!------------------------------------------------>
<!------------------------------------------------>
<!------------------------------------------------>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ویرایش دسته بندی محصولات</title>
    <link rel="stylesheet" href="assets/css/bootstrap-icons-1.13.1/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #f3f4f6;
            font-family: "Vazirmatn", Tahoma, Arial, sans-serif;
            font-size: 14px;
            color: #111827;
            min-height: 100vh;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 95%;
            max-width: 780px;
            background: #ffffff;
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
            font-size: 20px;
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

        .btn i { font-size: 15px; }

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

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
        }

        .col-sm-3 { width: 25%; padding: 0 8px; }
        .col-sm-9 { width: 75%; padding: 0 8px; }
        .col-md-6 { width: 100%; padding: 0 8px; }

        @media (max-width: 768px) {
            .col-sm-3, .col-sm-9 { width: 100%; }
            .card-body { padding: 18px; }
            .table-header { flex-direction: column; align-items: stretch; gap: 10px; }
        }

        .mb-3 { margin-bottom: 14px; }
        label.col-form-label {
            display: inline-block;
            font-size: 14px;
            color: #374151;
            padding: 8px 0;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
            color: #0f172a;
            background: #fff;
            transition: 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        select.form-control { height: 40px; }

        .custom-radio-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 100%;
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

        .text-center { text-align: center; }

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

        .mt-3 { margin-top: 16px; }




         .form-wrapper {
             display: flex;
             justify-content: center;
             padding: 20px;
             margin-top: 150px; /* فاصله 300 پیکسل از بالا */
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
                    <a href="dashbord.php?m=product_cat&p=add">
                        <button class="btn btn-add"><i class="bi bi-plus-lg"></i> افزودن دسته بندی</button>
                    </a>
                </div>

                <!-- عنوان فرم -->
                <h5 class="card-title">ویرایش <?php echo $result['title']; ?></h5>

                <form method="post" class="forms-sample" autocomplete="off">

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">عنوان منو</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="frm[title]" value="<?php echo $result['title']; ?>" placeholder="عنوان منو را وارد کنید" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ترتیب نمایش</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="frm[sort]" value="<?php echo $result['sort']; ?>" placeholder="ترتیب نمایش را وارد کنید">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label">وضعیت</label>
                        <div class="col-sm-9">
                            <div class="custom-radio-group">
                                <label class="custom-radio">
                                    فعال
                                    <input type="radio" name="frm[status]" value="1" <?php if ($result['status'] == 1) echo "checked"; ?>>
                                </label>
                                <label class="custom-radio">
                                    غیرفعال
                                    <input type="radio" name="frm[status]" value="0" <?php if ($result['status'] == 0) echo "checked"; ?>>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" name="btn" class="btn btn-primary">ویرایش</button>
                        <a href="dashbord.php?m=product_cat&p=list">
                            <button type="button" class="btn btn-secondary">لغو</button>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>





