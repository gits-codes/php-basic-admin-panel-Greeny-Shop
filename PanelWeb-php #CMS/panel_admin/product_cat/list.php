<?php
$list_product_cat = list_product_cat_admin();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لیست دسته بندی محصولات</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons-1.13.1/bootstrap-icons.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Vazirmatn", Tahoma, Arial, sans-serif;
            font-size: 14px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Wrapper جدول و scroll */
        .table-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px 0;
            overflow-x: auto;
        }

        .table-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            width: 95%;
            max-width: 1400px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        .table-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: all 0.25s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn i { font-size: 14px; }
        .btn-add { background: linear-gradient(145deg, #0d6efd, #3b82f6); }
        .btn-add:hover { background: linear-gradient(145deg, #3b82f6, #0d6efd); transform: translateY(-2px); }
        .btn-reload { background: linear-gradient(145deg, #2563eb, #1d4ed8); }
        .btn-reload:hover { background: linear-gradient(145deg, #1d4ed8, #2563eb); transform: translateY(-2px); }
        .btn-edit { background: linear-gradient(145deg, #198754, #22c55e); }
        .btn-edit:hover { background: linear-gradient(145deg, #22c55e, #198754); transform: translateY(-2px); }
        .btn-delete { background: linear-gradient(145deg, #dc2626, #ef4444); }
        .btn-delete:hover { background: linear-gradient(145deg, #ef4444, #dc2626); transform: translateY(-2px); }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            color: #111827;
            background-color: #ffffff;
            border-radius: 12px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* ستون عنوان همیشه حداقل عرض داشته باشه */
        th:first-child, td:first-child {
            min-width: 180px;
            width: auto;
            padding-left: 20px;
            padding-right: 20px;
            text-align: right;
        }

        th { background-color: #0d6efd; color: white; font-weight: 600; font-size: 15px; }

        tr:hover { background-color: #f1f5f9; }

        .badge-status {
            border-radius: 50px;
            padding: 6px 14px;
            color: white;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .badge-active { background-color: #198754; }
        .badge-inactive { background-color: #dc3545; }

        /* گوشه‌های جدول */
        tbody tr:first-child td:first-child { border-top-left-radius: 12px; }
        tbody tr:first-child td:last-child { border-top-right-radius: 12px; }
        tbody tr:last-child td:first-child { border-bottom-left-radius: 12px; }
        tbody tr:last-child td:last-child { border-bottom-right-radius: 12px; } /* فقط سلول آخر ردیوس دارد */

        /* رسپانسیو */
        @media (max-width: 992px) {
            .table-header { justify-content: center; }
            table { display: block; overflow-x: auto; white-space: nowrap; }
            th, td { padding: 10px 8px; font-size: 13px; }
            .btn { width: auto; }
        }

        @media (max-width: 768px) {
            .table-container { padding: 15px; }
            th, td { font-size: 13px; padding: 8px 6px; }
            .btn i { font-size: 13px; }
            .badge-status { padding: 4px 10px; font-size: 12px; }
            .btn-edit, .btn-delete { padding: 6px 10px; }
        }

        @media (max-width: 480px) {
            .table-header { gap: 6px; justify-content: center; }
            th, td { font-size: 12px; padding: 6px 5px; }
            .btn { padding: 6px 10px; font-size: 12px; }
        }

    </style>
</head>
<body>

<div class="table-wrapper">
    <div class="table-container">

        <!-- دکمه‌های بالا -->
        <div class="table-header">
            <button class="btn btn-reload" onclick="location.reload()">
                <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
            </button>

            <a href="dashbord.php?m=product_cat&p=add">
                <button class="btn btn-add">
                    <i class="bi bi-plus-lg"></i> افزودن دسته بندی
                </button>
            </a>
        </div>

        <!-- جدول -->
        <table>
            <thead>
            <tr>
                <th>عنوان دسته بندی</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list_product_cat as $product_cat): ?>
                <tr>
                    <td><?= $product_cat['title']; ?></td>
                    <td><?= $product_cat['sort']; ?></td>
                    <td>
                        <?php if ($product_cat['status'] == 1): ?>
                            <span class="badge-status badge-active">فعال</span>
                        <?php else: ?>
                            <span class="badge-status badge-inactive">غیرفعال</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="dashbord.php?m=product_cat&p=edit&id=<?= $product_cat['id'] ?>">
                            <button class="btn btn-edit"><i class="bi bi-pencil-fill"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="product_cat/delete.php?m=product_cat&id=<?= $product_cat['id'] ?>" style="text-decoration: none;">
                            <button class="btn btn-delete"><i class="bi bi-trash-fill"></i> حذف</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
