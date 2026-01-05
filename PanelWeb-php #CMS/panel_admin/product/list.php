<?php
$list_product = list_product_admin();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <link rel="stylesheet" href="assets/css/bootstrap-icons-1.13.1/bootstrap-icons.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "Vazirmatn", Tahoma, Arial, sans-serif; font-size: 14px; background-color: #f8f9fa; min-height: 100vh; }

        .table-wrapper { display: flex; justify-content: center; padding: 20px 0; }
        .table-container { background-color: #ffffff; border-radius: 16px; padding: 25px; width: 95%; max-width: 1400px; box-shadow: 0 0 8px rgba(0, 0, 0, 0.1); }

        .table-header { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; margin-bottom: 15px; }
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; font-size: 14px; font-weight: 500; border: none; border-radius: 10px; cursor: pointer; color: white; transition: all 0.25s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn i { font-size: 14px; }
        .btn-add { background: linear-gradient(145deg, #0d6efd, #3b82f6); }
        .btn-add:hover { background: linear-gradient(145deg, #3b82f6, #0d6efd); transform: translateY(-2px); }
        .btn-reload { background: linear-gradient(145deg, #2563eb, #1d4ed8); }
        .btn-reload:hover { background: linear-gradient(145deg, #1d4ed8, #2563eb); transform: translateY(-2px); }

        table { width: 100%; border-collapse: collapse; color: #111827; background-color: #ffffff; border-radius: 12px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: center; border-bottom: 1px solid #e5e7eb; }
        th { background-color: #0d6efd; color: white; font-weight: 600; font-size: 15px; }
        tr:hover { background-color: #f1f5f9; }

        .btn-edit { background: linear-gradient(145deg, #198754, #22c55e); }
        .btn-edit:hover { background: linear-gradient(145deg, #22c55e, #198754); transform: translateY(-2px); }
        .btn-delete { background: linear-gradient(145deg, #dc2626, #ef4444); }
        .btn-delete:hover { background: linear-gradient(145deg, #ef4444, #dc2626); transform: translateY(-2px); }
        .btn-view { background: rgba(111,66,193,0.20); color: #6f42c1; }
        .btn-view:hover { background: rgba(111,66,193,0.35); }

        .img-wrapper { width: 80px; height: 80px; overflow: hidden; border-radius: 8px; margin: 0 auto; transition: transform 0.3s ease; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .img-wrapper:hover { transform: scale(1.1); }
        .no-img { color: #999; font-size: 13px; }

        @media (max-width: 992px) {
            .table-header { flex-direction: column; align-items: stretch; gap: 10px; }
            .btn { width: 100%; justify-content: center; }
            table { display: block; overflow-x: auto; white-space: nowrap; }
            th, td { padding: 10px 8px; }
        }
        @media (max-width: 768px) {
            .table-container { padding: 15px; }
            th, td { font-size: 13px; padding: 8px 6px; }
            .btn i { font-size: 13px; }
        }
        @media (max-width: 480px) {
            th, td { font-size: 12px; padding: 6px 5px; }
            .btn { padding: 6px 10px; font-size: 12px; }
        }

        /* popup */
        .popup-overlay { position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); backdrop-filter: blur(5px); justify-content: center; align-items: center; z-index:1000; display: flex; opacity: 0; pointer-events: none; transition: opacity 0.3s ease; }
        .popup-overlay.show { opacity: 1; pointer-events: auto; }
        .popup-content { background: #fff; padding:30px 25px; border-radius:12px; width:450px; max-width:90%; max-height:80%; overflow-y:auto; text-align:right; display:flex; flex-direction:column; gap:12px; position:relative; transform: translateY(20px) scale(0.95); opacity: 0; transition: transform 0.4s cubic-bezier(0.25,1,0.5,1), opacity 0.4s ease; }
        .popup-overlay.show .popup-content { transform: translateY(0) scale(1); opacity:1; }
        .popup-close { position: absolute; top:10px; left:15px; font-size:22px; cursor:pointer; font-weight:bold; }
    </style>
</head>
<body>

<div class="table-wrapper">
    <div class="table-container">

        <div class="table-header">
            <button class="btn btn-reload" onclick="location.reload()">
                <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
            </button>

            <a href="dashbord.php?m=product&p=add">
                <button class="btn btn-add">
                    <i class="bi bi-plus-lg"></i> افزودن محصول
                </button>
            </a>
        </div>

        <table>
            <thead>
            <tr>
                <th>نام محصول</th>
                <th>عکس</th>
                <th>توضیحات و دسته بندی</th>
                <th>قیمت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list_product as $pro): ?>
                <tr>
                    <td><?= $pro['title']; ?></td>
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
                        <button class="btn btn-view"
                                data-title="<?= htmlspecialchars($pro['title']); ?>"
                                data-text="<?= htmlspecialchars($pro['text']); ?>"
                                data-cat="<?= htmlspecialchars(select_product_admin($pro['procat'])); ?>">
                            مشاهده
                        </button>
                    </td>
                    <td><?= $pro['price']; ?></td>
                    <td>
                        <a href="dashbord.php?m=product&p=edit&id=<?= $pro['id'] ?>">
                            <button class="btn btn-edit"><i class="bi bi-pencil-fill"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="product/delete.php?m=product&id=<?= $pro['id'] ?>" style="text-decoration: none;">
                            <button class="btn btn-delete"><i class="bi bi-trash-fill"></i> حذف</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- popup جزئیات محصول -->
<div id="productPopup" class="popup-overlay">
    <div class="popup-content">
        <span class="popup-close" id="productPopupClose">&times;</span>
        <h5>جزئیات محصول</h5>
        <p><strong>نام محصول:</strong> <span id="popupTitle"></span></p>
        <p><strong>توضیحات:</strong> <span id="popupText"></span></p>
        <p><strong>دسته بندی:</strong> <span id="popupCat"></span></p>
    </div>
</div>

<script>
    const productPopup = document.getElementById('productPopup');
    const productPopupClose = document.getElementById('productPopupClose');

    document.querySelectorAll('.btn-view').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('popupTitle').textContent = this.dataset.title;
            document.getElementById('popupText').textContent = this.dataset.text;
            document.getElementById('popupCat').textContent = this.dataset.cat;
            productPopup.classList.add('show');
        });
    });

    function closeProductPopup() {
        productPopup.classList.remove('show');
    }
    productPopupClose.addEventListener('click', closeProductPopup);
    productPopup.addEventListener('click', e => { if(e.target === productPopup) closeProductPopup(); });
</script>

</body>
</html>
