<?php
$list_page = list_page_admin();
?>

<style>
    /* کارت اصلی */
    .custom-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #e1e1e1;
    }

    /* جدول */
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

    /* دکمه‌ها */
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

    .btn-edit { background: rgba(0,123,255,.15); color:#0d6efd; }
    .btn-edit:hover { background: rgba(0,123,255,.35); }

    .btn-delete { background: rgba(220,53,69,.18); color:#dc3545; }
    .btn-delete:hover { background: rgba(220,53,69,.35); }

    .btn-add { background: rgba(40,167,69,.2); color:#28a745; }
    .btn-add:hover { background: rgba(40,167,69,.4); }

    .btn-reload { background: rgba(108,117,125,.2); color:#6c757d; }
    .btn-reload:hover { background: rgba(108,117,125,.4); }

    /* هدر جدول */
    .table-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    /* لینک کپی شبیه دکمه */
    .copy-url-text {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        color: #007bff;
        text-decoration: none;
        font-size: 13px;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.2s;
    }

    .copy-url-text:hover {
        background: #f8f9fa;
        color: #0056b3;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* نوتیفیکیشن بالای صفحه */
    #page-toast {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%) translateY(-20px);
        background: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        z-index: 9999;
        pointer-events: none;
    }

    #page-toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* رسپانسیو */
    @media (max-width: 992px) {
        .table-header { flex-direction: column; gap: 10px; }
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

<div class="table-header">
    <button class="btn btn-reload" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
    </button>
    <a href="dashbord.php?m=page&p=add">
        <button class="btn btn-add">
            <i class="bi bi-plus-lg"></i> افزودن صفحه
        </button>
    </a>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card custom-card">
            <div class="card-body">
                <h6 class="card-title">لیست صفحه</h6>
                <p class="text-muted mb-3">تمامی صفحه ثبت شده</p>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th>عنوان صفحه</th>
                            <th>کلمات کلیدی</th>
                            <th>ادرس صفحه</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list_page as $pro): ?>
                            <tr>
                                <td><?= $pro['title']; ?></td>
                                <td><?= $pro['keyword']; ?></td>
                                <td>
                                <span class="copy-url-text" data-url="blank_page.php?id=<?= $pro['id']; ?>">
                                    blank_page.php?id=<?= $pro['id']; ?>
                                </span>
                                </td>
                                <td>
                                    <a href="dashbord.php?m=page&p=edit&id=<?= $pro['id'] ?>">
                                        <button class="btn btn-edit"><i class="bi bi-pencil-fill"></i>ویرایش</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="page/delete.php?m=page&id=<?= $pro['id'] ?>">
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

<!-- Toast نوتیفیکیشن -->

<div id="page-toast">کپی شد!</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toast = document.getElementById('page-toast');

        document.querySelectorAll(".copy-url-text").forEach(el => {
            el.addEventListener("click", () => {
                // کپی متن به کلیپ‌بورد
                navigator.clipboard.writeText(el.dataset.url).then(() => {
                    // نمایش نوتیفیکیشن
                    toast.classList.add('show');
                    setTimeout(() => toast.classList.remove('show'), 2000);

                    // انیمیشن کوتاه روی لینک
                    el.style.transform = 'scale(1.05)';
                    setTimeout(() => el.style.transform = 'scale(1)', 200);
                });
            });
        });
    });
</script>
