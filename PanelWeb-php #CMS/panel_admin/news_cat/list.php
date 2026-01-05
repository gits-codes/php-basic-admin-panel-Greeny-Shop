<?php
$list_news_cat = list_news_cat_admin();
?>

<style>
    /* ====== طراحی کلی کارت ====== */
    .custom-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #e1e1e1;
    }

    /* ====== جدول ====== */
    .custom-table thead th {
        background: #e9ecef;
        color: #333;
        font-weight: 600;
        padding: 12px;
        text-align: center;
    }

    .custom-table tbody td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        color: #222;
    }

    .custom-table tbody tr:hover {
        background: #f3f3f3;
    }

    /* ====== دکمه‌ها ====== */
    .btn-edit, .btn-delete, .btn-add, .btn-reload {
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        transition: .2s ease-in-out;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* ویرایش */
    .btn-edit {
        background: rgba(0, 123, 255, 0.15);
        color: #0d6efd;
    }
    .btn-edit:hover {
        background: rgba(0, 123, 255, 0.35);
    }

    /* حذف */
    .btn-delete {
        background: rgba(220, 53, 69, 0.18);
        color: #dc3545;
    }
    .btn-delete:hover {
        background: rgba(220, 53, 69, 0.35);
    }

    /* افزودن */
    .btn-add {
        background: rgba(40, 167, 69, 0.20);
        color: #28a745;
    }
    .btn-add:hover {
        background: rgba(40, 167, 69, 0.40);
    }

    /* ریلود */
    .btn-reload {
        background: rgba(108, 117, 125, 0.20);
        color: #6c757d;
    }
    .btn-reload:hover {
        background: rgba(108, 117, 125, 0.40);
    }

    /* هدر بالا */
    .table-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
</style>

<!-- ====== HTML اصلی ====== -->
<div class="table-header">
    <button class="btn btn-reload" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
    </button>

    <a href="dashbord.php?m=news_cat&p=add">
        <button class="btn btn-add">
            <i class="bi bi-plus-lg"></i> افزودن دسته خبر
        </button>
    </a>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card custom-card">
            <div class="card-body">
                <h6 class="card-title">لیست دسته بندی اخبار</h6>
                <p class="text-muted mb-3">تمامی دسته‌بندی‌های ثبت شده</p>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table custom-table">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($list_news_cat as $news): ?>
                            <tr>
                                <td><?= $news['title']; ?></td>

                                <td>
                                    <a href="dashbord.php?m=news_cat&p=edit&id=<?= $news['id']; ?>">
                                        <button class="btn btn-edit">
                                            <i class="bi bi-pencil-fill"></i>ویرایش
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    <a href="news_cat/delete.php?m=news_cat&id=<?= $news['id'] ?>">
                                        <button class="btn btn-delete">
                                            <i class="bi bi-trash-fill"></i>حذف
                                        </button>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
