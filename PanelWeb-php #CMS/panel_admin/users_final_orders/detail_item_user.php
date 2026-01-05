<?php
//$order_id = $_REQUEST['order_id'];
//$items = show_order_iteams($order_id);
//?>
<!---->
<!--<style>-->
<!---->
<!--    .custom-card {-->
<!--        background: #f8f9fa;-->
<!--        border-radius: 12px;-->
<!--        padding: 20px;-->
<!--        border: 1px solid #e1e1e1;-->
<!--    }-->
<!---->
<!---->
<!--    .custom-table thead th {-->
<!--        background: #e9ecef;-->
<!--        color: #333;-->
<!--        font-weight: 600;-->
<!--        padding: 12px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .custom-table tbody td {-->
<!--        padding: 10px;-->
<!--        text-align: center;-->
<!--        vertical-align: middle;-->
<!--        color: #222;-->
<!--    }-->
<!---->
<!--    .custom-table tbody tr:hover {-->
<!--        background: #f3f3f3;-->
<!--    }-->
<!---->
<!---->
<!--    .img-wrapper {-->
<!--        width: 80px;-->
<!--        height: 80px;-->
<!--        overflow: hidden;-->
<!--        border-radius: 8px;-->
<!--        margin: 0 auto;-->
<!--        transition: transform .3s ease;-->
<!--    }-->
<!--    .img-wrapper img {-->
<!--        width: 100%;-->
<!--        height: 100%;-->
<!--        object-fit: cover;-->
<!--        display: block;-->
<!--    }-->
<!--    .img-wrapper:hover {-->
<!--        transform: scale(1.1);-->
<!--    }-->
<!---->
<!---->
<!--    .btn-edit, .btn-delete, .btn-approve, .btn-reject, .btn-reload, .btn-back {-->
<!--        border: none;-->
<!--        padding: 8px 14px;-->
<!--        border-radius: 8px;-->
<!--        cursor: pointer;-->
<!--        font-size: 15px;-->
<!--        transition: .2s ease-in-out;-->
<!--        display: inline-flex;-->
<!--        align-items: center;-->
<!--        gap: 4px;-->
<!--    }-->
<!---->
<!---->
<!--    .btn-reload {-->
<!--        background: rgba(108,117,125,0.20);-->
<!--        color: #6c757d;-->
<!--    }-->
<!--    .btn-reload:hover {-->
<!--        background: rgba(108,117,125,0.40);-->
<!--    }-->
<!---->
<!--    .btn-back {-->
<!--        background: rgba(0,123,255,0.15);-->
<!--        color: #0d6efd;-->
<!--    }-->
<!--    .btn-back:hover {-->
<!--        background: rgba(0,123,255,0.35);-->
<!--    }-->
<!---->
<!---->
<!--    .table-header {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        align-items: center;-->
<!--        margin-bottom: 15px;-->
<!--    }-->
<!---->
<!--    @media (max-width: 768px) {-->
<!--        .table-header { flex-direction: column; gap: 10px; }-->
<!--        th, td { font-size: 13px; padding: 8px 6px; }-->
<!--    }-->
<!---->
<!--    @media (max-width: 480px) {-->
<!--        th, td { font-size: 12px; padding: 6px 5px; }-->
<!--    }-->
<!--</style>-->
<!---->
<!---->
<!--<div class="table-header">-->
<!--    <button class="btn btn-reload" onclick="location.reload()">-->
<!--        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد-->
<!--    </button>-->
<!---->
<!--    <a href="dashbord.php?m=users_final_orders&p=list" class="btn btn-back">-->
<!--        <i class="bi bi-arrow-left"></i> بازگشت-->
<!--    </a>-->
<!---->
<!--</div>-->
<!---->
<!--<div class="row">-->
<!--    <div class="col-md-12 stretch-card">-->
<!--        <div class="card custom-card">-->
<!--            <div class="card-body">-->
<!--                <h6 class="card-title">جزئیات سفارش شماره --><?php //echo $order_id; ?><!--</h6>-->
<!--                <div class="table-responsive">-->
<!--                    <table class="table custom-table">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>تصویر</th>-->
<!--                            <th>نام محصول</th>-->
<!--                            <th>تعداد</th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                        --><?php //foreach ($items as $item): ?>
<!--                            --><?php //$product = get_product($item['product_id']); ?>
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    <div class="img-wrapper">-->
<!--                                        <img src="../--><?php //= $product['img']; ?><!--" alt="--><?php //= $product['title']; ?><!--">-->
<!--                                    </div>-->
<!--                                </td>-->
<!--                                <td>--><?php //= $product['title']; ?><!--</td>-->
<!--                                <td>--><?php //= $item['quantity']; ?><!--</td>-->
<!--                            </tr>-->
<!--                        --><?php //endforeach; ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-------------------------------------------------------->
<!-------------------------------------------------------->
<!-------------------------------------------------------->
<!-------------------------------------------------------->

<?php
$order_id = $_REQUEST['order_id'];
$items = show_order_iteams($order_id);
?>

<style>

    .custom-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #e1e1e1;
    }

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

    .img-wrapper {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 8px;
        margin: 0 auto;
        transition: transform .3s ease;
    }
    .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .img-wrapper:hover {
        transform: scale(1.1);
    }

    .btn-edit, .btn-delete, .btn-approve, .btn-reject, .btn-reload, .btn-back, .btn-view {
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

    .btn-reload {
        background: rgba(108,117,125,0.20);
        color: #6c757d;
    }
    .btn-reload:hover {
        background: rgba(108,117,125,0.40);
    }

    .btn-back {
        background: rgba(0,123,255,0.15);
        color: #0d6efd;
    }
    .btn-back:hover {
        background: rgba(0,123,255,0.35);
    }

    .btn-view {
        background: rgba(40,167,69,0.15);
        color: #28a745;
    }
    .btn-view:hover {
        background: rgba(40,167,69,0.35);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .table-header { flex-direction: column; gap: 10px; }
        th, td { font-size: 13px; padding: 8px 6px; }
    }

    @media (max-width: 480px) {
        th, td { font-size: 12px; padding: 6px 5px; }
    }


    .popup-overlay {
        display: none;
        position: fixed;
        top:0; left:0;
        width: 100%; height:100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
    .popup-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 300px;
        position: relative;
        text-align: right;
    }
    .popup-close {
        position: absolute;
        top: 5px;
        left: 10px;
        font-size: 20px;
        cursor: pointer;
        font-weight: bold;
    }

</style>

<div class="table-header">
    <button class="btn btn-reload" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
    </button>

    <a href="dashbord.php?m=users_final_orders&p=list" class="btn btn-back">
        <i class="bi bi-arrow-left"></i> بازگشت
    </a>
</div>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card custom-card">
            <div class="card-body">
                <h6 class="card-title">جزئیات سفارش شماره <?php echo $order_id; ?></h6>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th>تصویر</th>
                            <th>نام محصول</th>
                            <th>تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <?php $product = get_product($item['product_id']); ?>
                            <tr>
                                <td>
                                    <div class="img-wrapper">
                                        <img src="../<?= $product['img']; ?>" alt="<?= $product['title']; ?>">
                                    </div>
                                </td>
                                <td><?= $product['title']; ?></td>
                                <td><?= $item['quantity']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="popup" class="popup-overlay">
    <div class="popup-content">
        <span id="popup-close" class="popup-close">&times;</span>
        <h5>مشخصات محصول</h5>
        <p><strong>آدرس:</strong> <span id="popup-address"></span></p>
        <p><strong>شماره تلفن:</strong> <span id="popup-phone"></span></p>
    </div>
</div>

<script>

    document.querySelectorAll('.btn-view').forEach(btn => {
        btn.addEventListener('click', () => {
            const address = btn.getAttribute('data-address');
            const phone = btn.getAttribute('data-phone');
            document.getElementById('popup-address').textContent = address;
            document.getElementById('popup-phone').textContent = phone;
            document.getElementById('popup').style.display = 'flex';
        });
    });


    document.getElementById('popup-close').addEventListener('click', () => {
        document.getElementById('popup').style.display = 'none';
    });


    document.getElementById('popup').addEventListener('click', (e) => {
        if (e.target === document.getElementById('popup')) {
            document.getElementById('popup').style.display = 'none';
        }
    });
</script>












