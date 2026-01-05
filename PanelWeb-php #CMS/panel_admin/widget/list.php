<?php
$list_widget = list_widget_admin();
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

    /* تصویر کوچک */
    .img-wrapper {
        width: 80px; height: 80px; overflow: hidden; border-radius: 8px;
        margin: 0 auto;
        transition: transform 0.3s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .img-wrapper img {
        width: 100%; height: 100%; object-fit: cover; display: block;
    }

    .img-wrapper:hover { transform: scale(1.1); }

    .no-img { color: #999; font-size: 13px; }

    /* رسپانسیو */
    @media (max-width: 992px) {
        .table-header { flex-direction: column; align-items: stretch; gap: 10px; }
        .btn { width: 100%; justify-content: center; }
        table { display: block; overflow-x: auto; white-space: nowrap; }
        th, td { padding: 10px 8px; }
    }

    @media (max-width: 768px) {
        .custom-card { padding: 15px; }
        th, td { font-size: 13px; padding: 8px 6px; }
        .btn i { font-size: 13px; }
    }

    @media (max-width: 480px) {
        .table-header { gap: 6px; }
        th, td { font-size: 12px; padding: 6px 5px; }
        .btn { padding: 6px 10px; font-size: 12px; }
    }

</style>

<!-- ====== HTML اصلی ====== -->
<div class="table-header">
    <button class="btn btn-reload" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
    </button>

    <a href="dashbord.php?m=widget&p=add">
        <button class="btn btn-add">
            <i class="bi bi-plus-lg"></i> افزودن ویجت
        </button>
    </a>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card custom-card">
            <div class="card-body">
                <h6 class="card-title">لیست ویجت ها</h6>
                <p class="text-muted mb-3">تمامی ویجت های ثبت شده</p>

                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th>عنوان ویجت</th>
                            <th>توضیحات ویجت</th>
                            <th>عکس</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list_widget as $pro): ?>
                            <tr>
                                <td><?= $pro['title']; ?></td>
                                <td><?= $pro['text']; ?></td>
                                <td>
                                    <?php if (!empty($pro['img'])): ?>
                                        <div class="img-wrapper">
                                            <img src="<?= $pro['img']; ?>" alt="<?= $pro['title']; ?>">
                                        </div>
                                    <?php else: ?>
                                        <span class="no-img">بدون عکس</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="dashbord.php?m=widget&p=edit&id=<?= $pro['id'] ?>">
                                        <button class="btn btn-edit"><i class="bi bi-pencil-fill"></i>ویرایش</button>
                                    </a>
                                </td>

                                <td>
                                    <a href="widget/delete.php?m=widget&id=<?= $pro['id'] ?>" style="text-decoration: none;">
                                        <button class="btn btn-delete"><i class="bi bi-trash-fill"></i> حذف</button>
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
