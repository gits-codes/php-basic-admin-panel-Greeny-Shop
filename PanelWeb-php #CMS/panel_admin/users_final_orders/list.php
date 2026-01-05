<?php
$list_order = list_show_admin_orders();
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
    .btn-edit { background: rgba(0,123,255,0.15); color:#0d6efd; }
    .btn-edit:hover { background: rgba(0,123,255,0.35); }
    .btn-approve { background: rgba(40,167,69,0.20); color:#28a745; }
    .btn-approve:hover { background: rgba(40,167,69,0.40); }
    .btn-reject { background: rgba(220,53,69,0.18); color:#dc3545; }
    .btn-reject:hover { background: rgba(220,53,69,0.35); }
    .btn-reload { background: rgba(108,117,125,0.20); color:#6c757d; }
    .btn-reload:hover { background: rgba(108,117,125,0.40); }
    .btn-back { background: rgba(0,123,255,0.15); color:#0d6efd; }
    .btn-back:hover { background: rgba(0,123,255,0.35); }
    .btn-view { background: rgba(111,66,193,0.20); color: #6f42c1; }
    .btn-view:hover { background: rgba(111,66,193,0.35); }

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
        position: fixed;
        top:0; left:0;
        width:100%; height:100%;
        background: rgba(0,0,0,0.4);
        backdrop-filter: blur(5px);
        justify-content: center;
        align-items: center;
        z-index:1000;
        display: flex;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    .popup-overlay.show {
        opacity: 1;
        pointer-events: auto;
    }
    .popup-content {
        background: #fff;
        padding:30px 25px;
        border-radius:12px;
        width:450px;
        max-width:90%;
        max-height:80%;
        overflow-y:auto;
        text-align:right;
        display:flex;
        flex-direction:column;
        gap:12px;
        position:relative;
        transform: translateY(20px) scale(0.95);
        opacity: 0;
        transition: transform 0.4s cubic-bezier(0.25,1,0.5,1), opacity 0.4s ease;
    }
    .popup-overlay.show .popup-content {
        transform: translateY(0) scale(1);
        opacity:1;
    }
    .popup-close {
        position: absolute;
        top:10px;
        left:15px;
        font-size:22px;
        cursor:pointer;
        font-weight:bold;
    }

    .copy-notice {
        position: fixed;
        top:20px;
        left:50%;
        transform: translateX(-50%);
        background: #28a745;
        color: #fff;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 500;
        opacity: 0;
        pointer-events: none;
        transition: all 0.5s ease;
        z-index:2000;
    }
    .copy-notice.show {
        opacity:1;
        top:40px;
    }
</style>

<div class="table-header">
    <button class="btn btn-reload" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> بارگذاری مجدد
    </button>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card custom-card">
            <div class="card-body">
                <h6 class="card-title">لیست سفارش‌ها</h6>
                <p class="text-muted mb-3">تمامی سفارش‌های ثبت شده کاربران</p>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th>سفارش شماره</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>نمایش آیتم‌ها</th>
                            <th>مشخصات</th>
                            <th>تایید</th>
                            <th>رد</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list_order as $order): ?>
                            <tr>
                                <td><?= $order['id']; ?></td>
                                <td>
                                    <?php $username = user_show_admin_detils($order['user_id']); echo $username['username'] ?? 'ناشناخته'; ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($order['status'] ?? '') {
                                        case 'pending':  echo 'منتظر تایید'; break;
                                        case 'approved': echo 'تایید شده'; break;
                                        case 'rejected': echo 'رد شده'; break;
                                        default: echo 'نامشخص';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?m=users_final_orders&p=detail_item_user&order_id=<?= $order['id'] ?>">
                                        <button class="btn btn-edit"><i class="bi bi-eye-fill"></i> مشاهده</button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-view"
                                            data-address="<?= htmlspecialchars(get_order_address_admin_list($order['address_id']) ?? 'ثبت نشده'); ?>"
                                            data-phone="<?= htmlspecialchars(get_order_address_admin($order['contact_id']) ?? 'ثبت نشده'); ?>"
                                            data-cart="<?= htmlspecialchars(get_order_cart_admin($order['card_id']) ?? 'ثبت نشده'); ?>">
                                        مشاهده
                                    </button>
                                </td>
                                <td>
                                    <a href="?m=users_final_orders&p=update_approved&order_id=<?= $order['id']; ?>&status=approved">
                                        <button class="btn btn-approve"><i class="bi bi-check-circle-fill"></i> تایید</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="?m=users_final_orders&p=update_order_all&order_id=<?= $order['id']; ?>&status=rejected">
                                        <button class="btn btn-reject"><i class="bi bi-x-circle-fill"></i> رد</button>
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

<div id="popup" class="popup-overlay">
    <div class="popup-content">
        <span class="popup-close" id="popupClose">&times;</span>
        <h5>مشخصات سفارش</h5>
        <p><strong>آدرس:</strong><br><span class="copy-text" id="popupAddress"></span></p>
        <p><strong>شماره تلفن:</strong><br><span class="copy-text" id="popupPhone"></span></p>
        <p><strong>شماره کارت:</strong><br><span class="copy-text" id="popupCart"></span></p>
    </div>
</div>

<div class="copy-notice" id="copyNotice">کپی شد!</div>

<script>
    const popup = document.getElementById('popup');
    const popupClose = document.getElementById('popupClose');
    const copyNotice = document.getElementById('copyNotice');

    document.querySelectorAll('.btn-view').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('popupAddress').textContent = this.dataset.address;
            document.getElementById('popupPhone').textContent = this.dataset.phone;
            document.getElementById('popupCart').textContent = this.dataset.cart;
            popup.classList.add('show');
        });
    });

    function closePopup() {
        popup.classList.remove('show');
    }
    popupClose.addEventListener('click', closePopup);
    popup.addEventListener('click', e => { if(e.target === popup) closePopup(); });

    document.querySelectorAll('.copy-text').forEach(el => {
        el.addEventListener('click', () => {
            const text = el.textContent;
            navigator.clipboard.writeText(text).then(() => {
                copyNotice.classList.add('show');
                setTimeout(() => copyNotice.classList.remove('show'), 2000);
            });
        });
    });
</script>
