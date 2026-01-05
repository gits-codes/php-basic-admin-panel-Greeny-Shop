<?php
if (isset($_POST['btn'])) {
    $data = $_POST['frm'];
    add_product_cat($data);
}

//insert_Fake_Product_Categories();
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>افزودن دسته بندی جدید</title>
    <style>
        /* ریست کوچک */
        * { box-sizing: border-box; margin: 0; padding: 0; }

        /* بدنه - رنگ پس‌زمینه */
        .body {
            background: #f2f4f8;
            font-family: "Vazirmatn", Tahoma, Arial, sans-serif;
            font-size: 14px;
            color: #111827;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            min-height: 100vh;
        }

        /* wrapper که فرم را وسط می‌کند */
        .form-wrapper {
            min-height: 100vh;               /* پر کردن ارتفاع صفحه */
            display: flex;
            align-items: center;             /* وسط عمودی */
            justify-content: center;         /* وسط افقی */
            padding: 20px;
            padding-top: 130px;
            /* کمی فرم رو بالاتر می‌آوریم  */
            transform: translateY(-100px);
        }

        /* کارت فرم */
        .card {
            width: 95%;
            max-width: 780px;                /* عرض بیشتر  شد */
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(16,24,40,0.08);
            overflow: hidden;
        }

        .card-body {
            padding: 28px;
        }

        h5.card-title {
            margin-bottom: 18px;
            color: #6b21a8;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        }

        /* فرم شبکه‌ای ساده (شبیه Bootstrap) */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
        }
        .col-sm-3 { width: 25%; padding: 0 8px; }
        .col-sm-9 { width: 75%; padding: 0 8px; }
        .col-md-6 { width: 100%; padding: 0 8px; } /* داخل wrapper محدود می‌کنیم با max-width */

        @media (max-width: 768px) {
            .col-sm-3, .col-sm-9 { width: 100%; }
            .card-body { padding: 18px; }
            .form-wrapper { transform: translateY(-50px); }
        }

        /* فیلدها */
        .mb-3 { margin-bottom: 14px; }
        label.col-form-label {
            display: inline-block;
            font-size: 14px;
            color: #374151;
            padding: 8px 0;
            text-align: right;
        }
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #e6e9ee;
            font-size: 14px;
            color: #0f172a;
            background: #fff;
        }
        .form-control:focus { outline: none; box-shadow: 0 0 0 4px rgba(99,102,241,0.06); border-color: #7c3aed; }

        select.form-control { height: 40px; }

        /* دکمه‌ها */
        .text-center { text-align: center; }
        .btn {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary {
            background: #6b21a8;
            color: #fff;
        }
        .btn-primary:hover { background: #581c87; }
        .btn-secondary {
            background: #e6e7ee;
            color: #111827;
        }
        .btn-secondary:hover { background: #d6d7df; }

        /* رادیوهای سفارشی */
        .custom-radio-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 0;
            width: 100%;
        }
        .custom-radio {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fafafa;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.95rem;
            color: #111827;
            transition: all 0.18s ease;
            cursor: pointer;
        }
        .custom-radio:hover {
            background-color: #f1f5ff;
            border-color: #7c3aed;
        }
        .custom-radio input[type="radio"] {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #7c3aed;
            background: #fff;
            position: relative;
            cursor: pointer;
        }
        .custom-radio input[type="radio"]:checked {
            background-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124,58,237,0.08);
        }

        /* فضاها */
        .mb-4 { margin-bottom: 18px; }
        .mb-2 { margin-bottom: 8px; }
    </style>
</head>
<body>

<div class="form-wrapper">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">افزودن دسته بندی جدید محصولات</h5>

                <form method="post" class="forms-sample" autocomplete="off">
                    <!-- عنوان -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">عنوان دسته بندی</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="frm[title]" placeholder="عنوان منو را وارد کنید" required>
                        </div>
                    </div>

                    <!-- ترتیب نمایش -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ترتیب نمایش</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="frm[sort]" placeholder="ترتیب نمایش را وارد کنید">
                        </div>
                    </div>
                    <!-- وضعیت (رادیو) -->
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label">وضعیت</label>
                        <div class="col-sm-9">
                            <div class="custom-radio-group">
                                <label class="custom-radio">
                                    فعال
                                    <input type="radio" name="frm[status]" value="1">
                                </label>
                                <label class="custom-radio">
                                    غیرفعال
                                    <input type="radio" name="frm[status]" value="0" checked>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه‌ها -->
                    <div class="text-center mt-3">
                        <button type="submit" name="btn" class="btn btn-primary">ارسال</button>

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
