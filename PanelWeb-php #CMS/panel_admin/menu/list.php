<!--<!DOCTYPE html>-->
<!--<html lang="fa" dir="rtl">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>لیست منوها</title>-->
<!--    <style>-->
<!--        * {-->
<!--            margin: 0;-->
<!--            padding: 0;-->
<!--            box-sizing: border-box;-->
<!--        }-->
<!---->
<!--        body {-->
<!--            background-color: #f8f9fa;-->
<!---->
<!--            padding-top: 20px; /* بالا آوردن کل فرم */-->
<!---->
<!---->
<!--        }-->
<!---->
<!--        .table-container {-->
<!--            background-color: gainsboro;-->
<!--            border-radius: 16px;-->
<!--            padding: 25px;-->
<!--            width: 95%; /* عرض کمی بیشتر از قبل */-->
<!--            max-width: 1400px; /* حداکثر عرض بالاتر برای مانیتورهای بزرگ‌تر */-->
<!--            margin: 0 auto;-->
<!--            box-shadow: 0 0 4px #a855f7;-->
<!--        }-->
<!---->
<!--        h2 {-->
<!--            text-align: center;-->
<!--            color: #a855f7;-->
<!--            margin-bottom: 25px;-->
<!--            font-size: 28px;-->
<!--        }-->
<!---->
<!--        /* گرد کردن فقط گوشه‌های جدول */-->
<!--        table thead tr th:first-child {-->
<!--            border-top-right-radius: 12px;-->
<!--            border-bottom-right-radius: 12px;-->
<!--        }-->
<!---->
<!--        table thead tr th:last-child {-->
<!--            border-top-left-radius: 12px;-->
<!--            border-bottom-left-radius: 12px;-->
<!--        }-->
<!---->
<!--        table tbody tr td:first-child {-->
<!--            border-top-left-radius: 8px;-->
<!--            border-bottom-left-radius: 8px;-->
<!--        }-->
<!---->
<!--        table tbody tr td:last-child {-->
<!--            border-top-right-radius: 12px;-->
<!--            border-bottom-right-radius: 12px;-->
<!--        }-->
<!---->
<!---->
<!--        table {-->
<!--            width: 100%;-->
<!--            border-collapse: collapse;-->
<!--            color: black;-->
<!--        }-->
<!---->
<!--        th, td {-->
<!--            padding: 12px 15px;-->
<!--            text-align: center;-->
<!---->
<!--        }-->
<!---->
<!--        th {-->
<!--            background-color: #a855f7;-->
<!--            font-weight: 600;-->
<!--        }-->
<!---->
<!--        td {-->
<!--            border-bottom: 1px solid #3f3f3f;-->
<!---->
<!--        }-->
<!---->
<!--        tr:last-child td {-->
<!--            border-bottom: none;-->
<!---->
<!--        }-->
<!---->
<!--        .btn {-->
<!--            padding: 6px 12px;-->
<!--            border: none;-->
<!--            border-radius: 8px;-->
<!--            cursor: pointer;-->
<!--            color: white;-->
<!--            font-size: 14px;-->
<!--            transition: 0.2s ease;-->
<!--        }-->
<!---->
<!--        .btn-add {-->
<!--            background-color: #6b21a8;-->
<!--            display: inline-flex;-->
<!--            align-items: center;-->
<!--            gap: 6px;-->
<!--        }-->
<!---->
<!--        .btn-add:hover {-->
<!--            background-color: #9333ea;-->
<!--        }-->
<!---->
<!--        .btn-reload {-->
<!--            background-color: #6b21a8;-->
<!--            display: inline-flex;-->
<!--            align-items: center;-->
<!--            gap: 6px;-->
<!--        }-->
<!---->
<!--        .btn-reload:hover {-->
<!--            background-color: #9333ea;-->
<!--        }-->
<!---->
<!--        .btn-edit {-->
<!--            background-color: #16a34a;-->
<!--        }-->
<!---->
<!--        .btn-edit:hover {-->
<!--            background-color: #22c55e;-->
<!--        }-->
<!---->
<!--        .btn-delete {-->
<!--            background-color: #dc2626;-->
<!--        }-->
<!---->
<!--        .btn-delete:hover {-->
<!--            background-color: #ef4444;-->
<!--        }-->
<!---->
<!--        .table-header {-->
<!--            display: flex;-->
<!--            justify-content: space-between;-->
<!--            align-items: center;-->
<!--            margin-bottom: 15px;-->
<!---->
<!---->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div class="table-container">-->
<!--    <div class="table-header">-->
<!--        <button class="btn btn-reload" onclick="location.reload()">🔄 بارگذاری مجدد</button>-->
<!--        <h2>لیست منوها</h2>-->
<!--        <a href="dashbord.php?m=menu&p=add">-->
<!--            <button class="btn btn-add">➕ افزودن منو</button>-->
<!--        </a>-->
<!--    </div>-->
<!---->
<!--    <table>-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th>عنوان منو</th>-->
<!--            <th>عنوان سرگروه</th>-->
<!--            <th>لینک منو</th>-->
<!--            <th>ترتیب</th>-->
<!--            <th>وضعیت</th>-->
<!--            <th>ویرایش</th>-->
<!--            <th>حذف</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php
//        $list_menu = list_menu_admin();
//        foreach ($list_menu as $menu) :
//
//            ?>
<!--            <tr>-->
<!--                <td>--><?php //echo $menu['title']; ?><!--</td>-->
<!--                <td>--><?php //if ($menu['chid'] == 0) {
//                        echo "ندارد";
//                    } else {
//                        $parent = select_list_menu_admin($menu['chid']);
//                        echo $parent;
//                    }
//
//
//                    ?><!--</td>-->
<!--                <td>--><?php //echo $menu['url']; ?><!--</td>-->
<!--                <td>--><?php //echo $menu['sort']; ?><!--</td>-->
<!---->
<!---->
<!--                <td>-->
<!--                    --><?php //if ($menu['status'] == 1): ?>
<!--                        <span class="badge rounded-pill text-white px-3 py-2 shadow-sm" style="background-color: #28a745;">فعال</span>-->
<!--                    --><?php //else: ?>
<!--                        <span class="badge rounded-pill text-white px-3 py-2 shadow-sm" style="background-color: #dc3545;">غیرفعال</span>-->
<!--                    --><?php //endif; ?>
<!--                </td>-->
<!---->
<!---->
<!---->
<!---->
<!--                <td>-->
<!--                    <button class="btn btn-edit">✏️</button>-->
<!--                </td>-->
<!--                <td>-->
<!--                    <a href="menu/delete.php?id=--><?php //= $menu['id'] ?><!--">-->
<!--                        <button class="btn btn-delete">🗑️</button>-->
<!--                    </a>-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--        --><?php //endforeach; ?>
<!---->
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->
<!---------------------------------------------------------------**********************##############################-->
<?php
$list_menu = list_menu_admin();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لیست منوها</title>

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

        /* Wrapper برای وسط چین کردن جدول */
        .table-wrapper {
            display: flex;
            justify-content: center; /* وسط افقی */
            padding: 20px 0;         /* فاصله عمودی */
        }

        .table-container {
            width: 95%;
            max-width: 1400px;       /* محدود کردن عرض */
            background-color: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        /* دکمه‌ها */
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

        .btn i {
            font-size: 14px;
        }

        .btn-add {
            background: linear-gradient(145deg, #0d6efd, #3b82f6);
        }

        .btn-add:hover {
            background: linear-gradient(145deg, #3b82f6, #0d6efd);
            transform: translateY(-2px);
        }

        .btn-reload {
            background: linear-gradient(145deg, #2563eb, #1d4ed8);
        }

        .btn-reload:hover {
            background: linear-gradient(145deg, #1d4ed8, #2563eb);
            transform: translateY(-2px);
        }

        /* جدول */
        table {
            width: 100%;
            border-collapse: collapse;
            color: #111827;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #0d6efd;
            color: white;
            font-weight: 600;
            font-size: 15px;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        /* Badge وضعیت */
        .badge-status {
            border-radius: 50px;
            padding: 6px 14px;
            color: white;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .badge-active {
            background-color: #198754;
        }

        .badge-inactive {
            background-color: #dc3545;
        }

        /* دکمه‌های جدول */
        .btn-edit {
            background: linear-gradient(145deg, #198754, #22c55e);
        }

        .btn-edit:hover {
            background: linear-gradient(145deg, #22c55e, #198754);
            transform: translateY(-2px);
        }

        .btn-delete {
            background: linear-gradient(145deg, #dc2626, #ef4444);
        }

        .btn-delete:hover {
            background: linear-gradient(145deg, #ef4444, #dc2626);
            transform: translateY(-2px);
        }

        /* رسپانسیو */
        @media (max-width: 1200px) {
            .table-container {
                width: 95%;
                padding: 20px;
            }
        }

        @media (max-width: 992px) {
            .table-header {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                padding: 10px 8px;
            }
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 15px;
            }

            th, td {
                font-size: 13px;
                padding: 8px 6px;
            }

            .btn i {
                font-size: 13px;
            }

            .badge-status {
                padding: 4px 10px;
                font-size: 12px;
            }

            .btn-edit, .btn-delete {
                padding: 6px 10px;
            }
        }

        @media (max-width: 480px) {
            .table-header {
                gap: 6px;
            }

            th, td {
                font-size: 12px;
                padding: 6px 5px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 12px;
            }
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

            <a href="dashbord.php?m=menu&p=add">
                <button class="btn btn-add">
                    <i class="bi bi-plus-lg"></i> افزودن منو
                </button>
            </a>
        </div>

        <!-- جدول -->
        <table>
            <thead>
            <tr>
                <th>عنوان منو</th>
                <th>عنوان سرگروه</th>
                <th>لینک منو</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list_menu as $menu): ?>
                <tr>
                    <td><?= $menu['title']; ?></td>
                    <td>
                        <?php
                        if ($menu['chid'] == 0) {
                            echo "ندارد";
                        } else {
                            $parent = select_list_menu_admin($menu['chid']);
                            echo $parent;
                        }
                        ?>
                    </td>
                    <td><?= $menu['url']; ?></td>
                    <td><?= $menu['sort']; ?></td>
                    <td>
                        <?php if ($menu['status'] == 1): ?>
                            <span class="badge-status badge-active">فعال</span>
                        <?php else: ?>
                            <span class="badge-status badge-inactive">غیرفعال</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="dashbord.php?m=menu&p=edit&id=<?= $menu['id'] ?>">
                            <button class="btn btn-edit"><i class="bi bi-pencil-fill"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="menu/delete.php?m=menu&id=<?= $menu['id'] ?>" style="text-decoration: none;">
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







