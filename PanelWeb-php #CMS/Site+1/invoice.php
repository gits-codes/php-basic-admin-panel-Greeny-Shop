<?php
include '../include/functions.php';



if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$order_id = $_REQUEST['order_id'] ?? null;
$cart_products = get_cart_products($user_id);
$item = [];
if ($order_id) {
    $item = show_order_iteams($order_id);
}

$row = list_menu_defult();

$all_orders = list_show_users_orders_with_items($user_id);



$order = null;
if ($order_id) {
    $orders = get_single_order($user_id, $order_id);
    $address = get_order_address($orders['address_id']);
}



?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
        <!--=====================================
                    META TAG PART START
        =======================================-->
        <!-- REQUIRE META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- AUTHOR META -->
        <meta name="author" content="">
        <meta name="email" content="">
        <meta name="profile" content="">

        <!-- TEMPLATE META -->
        <meta name="name" content="Greeny">
        <meta name="title" content="Greeny - eCommerce HTML Template">
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, webshop, farm, grocery, natural, online store">
        <!--=====================================
                    META-TAG PART END
        =======================================-->

        <!-- WEBPAGE TITLE -->
        <title>Greeny - Invoice</title>

        <!--=====================================
                    CSS LINK PART START
        =======================================-->
        <!-- FAVICON -->
        <link rel="icon" href="images/favicon.png">

        <!-- FONTS -->
        <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
        <link rel="stylesheet" href="fonts/icofont/icofont.min.css">
        <link rel="stylesheet" href="fonts/fontawesome/fontawesome.min.css">

        <!-- VENDOR -->
        <link rel="stylesheet" href="vendor/venobox/venobox.min.css">
        <link rel="stylesheet" href="vendor/slickslider/slick.min.css">
        <link rel="stylesheet" href="vendor/niceselect/nice-select.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">

        <!-- CUSTOM -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/invoice.css">
    <style>


        .order-items-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 10px 0;
        }

        .order-item-card {
            border: 1px solid #b2f2bb;
            padding: 10px;
            border-radius: 10px;
            width: 140px;
            text-align: center;
            background: #e6f9ed;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .order-item-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .order-item-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .order-item-card h6 {
            font-size: 14px;
            margin: 5px 0;
            color: #2c7a4b;
        }

        .order-item-card span {
            font-size: 13px;
            color: #555;
        }

        /* واکنش‌گرا */
        @media (max-width: 768px) {
            .order-item-card {
                width: 100px;
                padding: 6px;
            }
            .order-item-img {
                width: 70px;
                height: 50px;
            }
        }
            /*-*/
            .toggle-details-btn {
                padding: 8px 14px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 14px;
                display: inline-flex;
                align-items: center;
                gap: 5px;
                transition: background 0.2s, transform 0.2s;
            }

            .toggle-details-btn:hover {
                background: #45a049;
            }

            .toggle-details-btn .arrow {
                display: inline-block;
                transition: transform 0.3s;
            }


            .toggle-details-btn.active .arrow {
                transform: rotate(180deg);
            }


    </style>


    <!--=====================================
                CSS LINK PART END
    =======================================-->
    </head>
    <body>
        <div class="backdrop"></div>
        <a class="backtop fas fa-arrow-up" href="#"></a>
         
         <!--=====================================
                    HEADER TOP PART START
        =======================================-->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="header-top-welcome">
                            <p>به فروشگاه رویایی خودتان، خوش آمدید!</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3">
                        <div class="header-top-select">
                            <div class="header-select">
                                <i class="icofont-world"></i>
                                <select class="select">
                                    <option value="persian" selected>فارسی</option>
                                    <option value="english">انگلیسی</option>
                                    <option value="arabic">عربی</option>
                                </select>
                            </div>
                            <div class="header-select">
                                <i class="icofont-money"></i>
                                <select class="select">
                                      <option value="persian" selected>ریال</option>
                                    <option value="english">دلار</option>
                                    <option value="arabic">درهم</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-4">
                        <ul class="header-top-list">
                            <li><a href="offer.html">تخفیفات</a></li>
                            <li><a href="faq.html">راهنما</a></li>
                            <li><a href="contact.html">ارتباط با ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                    HEADER TOP PART END 
        =======================================-->


        <!--=====================================
                    HEADER PART START
        =======================================-->
        <header class="header-part">
            <div class="container">
                <div class="header-content">
                    <div class="header-media-group">
                        <button class="header-user"><img src="images/user.png" alt="user"></button>
                        <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                        <button class="header-src"><i class="fas fa-search"></i></button>
                    </div>

                    <a href="index.php" class="header-logo">
                        <img src="images/logo.png" alt="logo">
                    </a>
                    <?php if(!isset($_SESSION['user_id'])){
                        echo '<a href="login.php" class="header-widget" title="My Account">
                        <img src="images/user.png" alt="user">
                        <span>ورود</span>
                    </a>';
                    }
                    else{
                        echo '<a href="logout.php" class="header-widget" title="My Account">
                        <img src="images/user.png" alt="user">
                        <span>خروج</span>
                    </a>';
                    }
                    ?>
                    <form class="header-form">
                        <input type="text" placeholder="جست و جو کن ...">
                        <button><i class="fas fa-search"></i></button>
                    </form>

                    <div class="header-widget-group">
                        <a href="compare.html" class="header-widget" title="Compare List">
                            <i class="fas fa-random"></i>
                            <sup>0</sup>
                        </a>
                        <a href="wishlist.html" class="header-widget" title="Wishlist">
                            <i class="fas fa-heart"></i>
                            <sup>0</sup>
                        </a>
                        <button class="header-widget header-cart" title="Cartlist">
                            <i class="fas fa-shopping-basket"></i>
                            <sup>!</sup>
                            <span><small></small></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!--=====================================
                    HEADER PART END
        =======================================-->


        <!--=====================================
               NAVBAR PART START
   =======================================-->
        <nav class="navbar-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-content">
                            <ul class="navbar-list">
                                <?php foreach ($row as $val): ?>
                                    <li class="navbar-item dropdown">
                                        <a class="navbar-link dropdown-arrow" href="<?php echo $val['url']; ?>">
                                            <?php echo $val['title']; ?>
                                        </a>

                                        <?php
                                        $sub_menu_defult = list_sub_menu_defult($val['id']);
                                        if ($sub_menu_defult): ?>
                                            <ul class="dropdown-position-list">
                                                <?php foreach ($sub_menu_defult as $show): ?>
                                                    <li>
                                                        <a href="<?php echo $show['url']; ?>">
                                                            <?php echo $show['title']; ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="navbar-info-group">
                                <div class="navbar-info">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p>
                                        <small>شماره تماس</small>
                                        <span><?php echo $settings['phone'] ?: 'در حال به‌روزرسانی'; ?></span>
                                    </p>
                                </div>

                                <div class="navbar-info">
                                    <i class="icofont-ui-email"></i>
                                    <p>
                                        <small>ایمیل ما</small>
                                        <span><?php echo $settings['email'] ?: 'در حال به‌روزرسانی'; ?></span>
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </nav>

        <!--=====================================
                    NAVBAR PART END
        =======================================-->


        <!--=====================================
                CATEGORY SIDEBAR PART START
        =======================================-->
        <aside class="category-sidebar">
            <div class="category-header">
                <h4 class="category-title">
                    <i class="fas fa-align-left"></i>
                    <span>منو</span>
                </h4>
                <button class="category-close"><i class="icofont-close"></i></button>
            </div>

            <ul class="category-list">
                <?php foreach ($row as $val): ?>
                    <?php

                    $sub_menu_defult = list_sub_menu_defult($val['id']);
                    ?>
                    <li class="category-item">


                        <a class="category-link dropdown-link" href="#">
                            <i class="fa fa-angle-down"></i>
                            <span><?php echo $val['title']; ?></span>
                        </a>


                        <?php if ($sub_menu_defult): ?>
                            <ul class="dropdown-list">
                                <?php foreach ($sub_menu_defult as $show): ?>
                                    <li>
                                        <a href="<?php echo $show['url']; ?>">
                                            <?php echo $show['title']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="category-footer">
                <p><a href="#">&copy;  <?php echo $settings['copyright']; ?> </a></p>
            </div>
        </aside>

        <!--=====================================
                CATEGORY SIDEBAR PART END
        =======================================-->


        <!--=====================================
                  CART SIDEBAR PART START
        =======================================-->
        <aside class="cart-sidebar">
            <div class="cart-header">
                <div class="cart-total">
                    <i class="fas fa-shopping-basket"></i>
                    <span>کل مورد</span>
                </div>
                <button class="cart-close"><i class="icofont-close"></i></button>
            </div>
            <ul class="cart-list">
                <?php foreach ($cart_products as $item): ?>
                    <li class="cart-item">
                        <div class="cart-media">
                            <a href="#"><img src="../<?= $item['img'] ?>" alt="product"></a>

                            <!-- فرم حذف محصول -->
                            <form method="get" style="display:inline;">
                                <button type="submit" name="delete" value="<?= $item['cart_id'] ?>" class="cart-delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="#" style="padding-right: 5%;"> <?= $item['title'] ?> </a></h6>
                                <p><br></p>
                            </div>
                            <div class="cart-action-group">
                                <div class="product-action">
                                    <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="<?= $item['quantity'] ?>">
                                    <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                </div>
                                <h6>قیمت</h6>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="cart-footer">
                <button class="coupon-btn">آیا کد تخفیف دارید؟</button>
                <form class="coupon-form">
                    <input type="text" placeholder="کد تخفیف خود را وارد کنید">
                    <button type="submit"><span>ثبت</span></button>
                </form>
                <a class="cart-checkout-btn" href="checkout.php">
                    <span class="checkout-label">برو به تسویه حساب</span>
                    <span class="checkout-price">قیمت</span>
                </a>
            </div>
        </aside>

        <!--=====================================
                    CART SIDEBAR PART END
        =======================================-->


        <!--=====================================
                  NAV SIDEBAR PART START
        =======================================-->
        <aside class="nav-sidebar">
            <div class="nav-header">
                <a href="#"><img src="images/logo.png" alt="logo"></a>
                <button class="nav-close"><i class="icofont-close"></i></button>
            </div>
            <div class="nav-content">
                <div class="nav-btn">
                    <a href="login.html" class="btn btn-inline">
                        <i class="fa fa-unlock-alt"></i>
                        <span>به اینجا بپیوندید</span>
                    </a>
                </div>
                <!-- This commentable code show when user login or register -->
                <!-- <div class="nav-profile">
                    <a class="nav-user" href="#"><img src="images/user.png" alt="user"></a>
                    <h4 class="nav-name"><a href="profile.html">Miron Mahmud</a></h4>
                </div> -->
                <div class="nav-select-group">
                    <div class="nav-select">
                        <i class="icofont-world"></i>
                        <select class="select">
							<option value="persian" selected>فارسی</option>
                            <option value="english">انگلیسی</option>
                            <option value="arabic">عربی</option>
                        </select>
                    </div>
                    <div class="nav-select">
                        <i class="icofont-money"></i>
                        <select class="select">
                            <option value="persin" selected>ریال</option>
                            <option value="english">دلار</option>
                            <option value="arabic">درهم</option>
                        </select>
                    </div>
                </div>
                <ul class="nav-list">
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-home"></i>خانه</a>
                        <ul class="dropdown-list">
                                        <li><a href="home-grid.html">صفحه اصلی گرید</a></li>
                                        <li><a href="index.php">صفحه اصلی</a></li>
                                        <li><a href="home-classic.html">صفحه اصلی کلاسیک</a></li>
                                        <li><a href="home-standard.html">صفحه اصلی استاندارد</a></li>
                                        <li><a href="home-category.html">صفحه اصلی دسته بندی</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-food-cart"></i>فروشگاه</a>
                        <ul class="dropdown-list">
                                                            <li><a href="shop-5column.html">فروشگاه 5 ستون</a></li>
                                                            <li><a href="shop-4column.html">فروشگاه 4 ستون</a></li>
                                                            <li><a href="shop-3column.html">فروشگاه 3 ستون</a></li>
                                                            <li><a href="shop-2column.html">فروشگاه 2 ستون</a></li>
                                                            <li><a href="shop-1column.html">فروشگاه 1 ستون</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-page"></i>محصولات</a>
                        <ul class="dropdown-list">
                                                            <li><a href="product-tab.html">محصول تک تب</a></li>
                                                            <li><a href="product-grid.html">محصول تک ستون</a></li>
                                                            <li><a href="product-video.html">محصول تک ویدیو</a></li>
                                                            <li><a href="product-simple.html">معرفی محصول</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-bag-alt"></i>صفحات</a>
                        <ul class="dropdown-list">
                                        <li><a href="faq.html">سوالات متداول</a></li>
                                        <li><a href="offer.html">تخفیفات</a></li>
                                        <li><a href="profile.html">پروفایل من</a></li>
                                        <li><a href="wallet.html">کیف پول من</a></li>
                                        <li><a href="about.html">درباره ما</a></li>
                                        <li><a href="contact.html">ارتباط باما</a></li>
                                        <li><a href="privacy.html">سیاست حفظ حریم خصوصی</a></li>
                                        <li><a href="coming-soon.html">در دست ساخت</a></li>
                                        <li><a href="blank-page.html">صفحه خالی</a></li>
                                        <li><a href="error.html">خطای 404</a></li>
                                        <li><a href="email-template.html">قالب ایمیل</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-lock"></i>اهراز هویت</a>
                        <ul class="dropdown-list">
                                        <li><a href="login.html">لاگین</a></li>
                                        <li><a href="register.html">ثبت نام</a></li>
                                        <li><a href="reset-password.html">حذف پسوورد</a></li>
                                        <li><a href="change-password.html">تغییر پسوورد</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link dropdown-link" href="#"><i class="icofont-book-alt"></i>بلاگ ها</a>
                        <ul class="dropdown-list">
                                        <li><a href="blog-grid.html">بلاگ گریدبندی</a></li>
                                        <li><a href="blog-standard.html">بلاگ استاندارد</a></li>
                                        <li><a href="blog-details.html">اطلاعات بلاگ</a></li>
                                        <li><a href="blog-author.html">نویسنده وبلاگ</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i>تخفیفات</a></li>
                    <li><a class="nav-link" href="about.html"><i class="icofont-info-circle"></i>درباره ما</a></li>
                    <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>سوالات متداول</a></li>
                    <li><a class="nav-link" href="contact.html"><i class="icofont-contacts"></i>ارتباط با ما</a></li>
                    <li><a class="nav-link" href="privacy.html"><i class="icofont-warning"></i>سیاست حفظ حریم خصوصی</a></li>
                    <li><a class="nav-link" href="coming-soon.html"><i class="icofont-options"></i>دردست ساخت</a></li>
                    <li><a class="nav-link" href="error.html"><i class="icofont-ui-block"></i>خطای 404</a></li>
                    <li><a class="nav-link" href="login.html"><i class="icofont-logout"></i>خروج</a></li>
                </ul>
                <div class="nav-info-group">
                    <div class="nav-info">
                        <i class="icofont-ui-touch-phone"></i>
                        <p>
                            <small>شماره تماس</small>
                            <span><?php echo $settings['phone'] ?: 'در حال به‌روزرسانی'; ?></span>
                        </p>
                    </div>
                    <div class="nav-info">
                        <i class="icofont-ui-email"></i>
                        <p>
                            <small>ایمیل ما</small>
                            <span><?php echo $settings['email'] ?: 'در حال به‌روزرسانی'; ?></span>
                        </p>
                    </div>
                </div>
                <div class="nav-footer">
					<p><?php echo $settings['copyright']; ?><a href="#">Mrzic</a></p>
                </div>
            </div>
        </aside>
        <!--=====================================
                  NAV SIDEBAR PART END
        =======================================-->


        <!--=====================================
                    MOBILE-MENU PART START
        =======================================-->
        <div class="mobile-menu">
            <?php foreach ($row as $val): ?>
                <a href="<?php echo $val['url']; ?>" title="Home Page">
                    <i class="fas fa fa-angle-down"></i>
                    <span><?php echo $val['title']; ?></span>
                </a>
            <?php endforeach; ?>
            <button class="cate-btn" title="Category List">
                <i class="fas fa-list"></i>
                <span>دسته بندی</span>
            </button>
        </div>
        <!--=====================================
                    MOBILE-MENU PART END
        =======================================-->
         

        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>فاکتور سفارش</h2>
                <ol class="breadcrumb">
                    <li class=""><a href="index.php">⁠ خانه ⁠</a></li>
                    <li class=""><a href="shop-all-product.php"> ⁠⬅ فروشگاه⁠ </a></li>
                    <li class=""><a href="checkout.php"> ⁠⬅ تسویه حساب⁠ ⬅</a></li>
                    <li class=" active" aria-current="page"> ⁠ فاکتور ⁠</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    INVOICE PART START
        =======================================-->
        <section class="inner-section invoice-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-info">
                            <p>متشکرم! ما سفارش شما را دریافت کردیم.</p>
                        </div>
                    </div>







                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>سفارش دریافت شده</h4>
                            </div>
                            <div class="account-content">
                                <div class="invoice-recieved">
                                    <?php if($orders): ?>
                                        <h6>شماره سفارش <span><?= $orders['id']; ?></span></h6>
                                        <h6>تاریخ سفارش <span><?= to_Persian_Date($orders['order_time']) ?? 'نیاز به بروزرسانی'; ?></span></h6>
                                        <h6>مبلغ کل <span><?= $orders['total_price'] ?? '1,250,000 ریال'; ?></span></h6>
                                        <h6>روش پرداخت <span><?= $orders['payment_method'] ?? 'آنلاین'; ?></span></h6>
                                    <?php else: ?>
                                        <p>سفارشی پیدا نشد.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>









                    <?php
                    $total_quantity = 0;

                    // چک می‌کنیم که سفارش و آیتم‌ها موجود باشند
                    if (!empty($item)) {
                        foreach ($item as $i) {
                            $total_quantity += $i['quantity'];
                        }
                    }
                    ?>

                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>جزئیات سفارش</h4>
                            </div>
                            <div class="account-content">
                                <ul class="invoice-details">
                                    <li>
                                        <h6>تعداد کل</h6>
                                        <p><?= $total_quantity ?> عدد</p>
                                    </li>
                                    <li>
                                        <h6>زمان سفارش</h6>
                                        <p><?= to_Persian_Date($orders['order_time']) ?? 'نیاز به بروزرسانی'; ?></p>
                                    </li>
                                    <li>
                                        <h6>زمان تحویل</h6>
                                        <p>باید موقع ارسال پک ثبت بشه</p>
                                    </li>
                                    <li>
                                        <h6>مکان تحویل</h6>
                                        <p><?= $address['address'] ?? 'نامشخص' ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>












                    <div class="col-lg-12">
                        <div class="table-scroll">
                            <table class="table-list">
                                <thead>
                                <tr>
                                    <th>سریال</th>
                                    <th>وضعیت</th>
                                    <th>نام</th>
                                    <th>پرداخت</th>
                                    <th>جزئیات</th>
                                    <th>تعداد آیتم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($all_orders as $index => $entry): ?>
                                    <?php
                                    $order = $entry['order'];

                                    //quantity
                                    $total_quantity = 0;
                                    foreach ($entry['items'] as $item) {
                                        $total_quantity += $item['quantity'];
                                    }
                                    ?>
                                    <tr class="order-main">
                                        <td><?= $order['id']; ?></td>
                                        <td>
                                            <?php
                                            switch($order['status'] ?? '') {
                                                case 'pending': echo 'منتظر تایید'; break;
                                                case 'approved': echo 'تایید شد'; break;
                                                case 'rejected': echo 'لغو شد'; break;
                                                default: echo 'نامشخص';
                                            }
                                            ?>
                                        </td>
                                        <td><?= user_show_admin_detils($order['user_id'])['username']; ?></td>
                                        <td>پرداخت شده</td>
                                        <td>
                                            <button class="toggle-details-btn" data-target="details-<?= $index ?>">
                                                نمایش جزئیات
                                                <span class="arrow">▼</span>
                                            </button>
                                        </td>
                                        <td><?= count($entry['items']); ?></td>
                                    </tr>

                                    <tr class="order-details-row" id="details-<?= $index ?>" style="display:none;">
                                        <td colspan="6">
                                            <div class="order-items-wrapper">
                                                <?php foreach ($entry['items'] as $row):
                                                    $product = get_product($row['product_id']); ?>
                                                    <div class="order-item-card">
                                                        <img src="../<?= $product['img'] ?>" class="order-item-img" alt="<?= $product['title'] ?>">
                                                        <h6><?= $product['title'] ?></h6>
                                                        <span>تعداد: <?= $row['quantity'] ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt-5">
                        <a class="btn btn-inline" href="#">
                            <i class="icofont-download"></i>
                            <span>دانلود فاکتور</span>
                        </a>
                        <div class="back-home">
                            <a href="index.php">برگشت به خانه</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    INVOICE PART END
        =======================================-->




        <!--=====================================
                    NEWSLETTER PART START
        =======================================-->
        <section class="news-part" style="background: url(images/newsletter.jpg) no-repeat center;">
            <div class="container">
                <div class="row align-مورد-center">
                    <div class="col-md-5 col-lg-6 col-xl-7">
                        <div class="news-text">
                            <h2>%20 تخفیف برای عضویت در خبرنامه</h2>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <form class="news-form">
                            <input type="text" placeholder="آدرس ایمیل خود را وارد کنید">
                            <button><span><i class="icofont-ui-email"></i>عضویت</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    NEWSLETTER PART END
        =======================================-->


        <!--=====================================
                    INTRO PART START
        =======================================-->
        <section class="intro-part">
            <div class="container">
                <div class="row intro-content">
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="intro-content">
                                <h5>تحویل درب منزل رایگان</h5>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <div class="intro-content">
                                <h5>مرجوعی کالا بی قید و شرط</h5>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="intro-content">
                                <h5>سیستم پشتیبانی سریع</h5>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</p>
                            </div>
                        </div>
                    </div>
                     
                    <div class="col-sm-6 col-lg-3">
                        <div class="intro-wrap">
                            <div class="intro-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="intro-content">
                                <h5>راه های پرداخت امن</h5>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    INTRO PART END
        =======================================-->
         

        <!--=====================================
                     FOOTER PART START
        =======================================-->
        <footer class="footer-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="footer-widget">
                            <a class="footer-logo" href="#">
                                <img src="images/logo.png" alt="logo">
                            </a>
                            <p class="footer-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                            <ul class="footer-social">
                                <li><a class="icofont-facebook" href="#"></a></li>
                                <li><a class="icofont-twitter" href="#"></a></li>
                                <li><a class="icofont-linkedin" href="#"></a></li>
                                <li><a class="icofont-instagram" href="#"></a></li>
                                <li><a class="icofont-pinterest" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="footer-widget contact">
                            <h3 class="footer-title">راه های ارتباط</h3>
                            <ul class="footer-contact">
                                <li>
                                    <i class="icofont-ui-email"></i>
                                    <p>
                                        <small>ایمیل ما</small>
                                        <span><?php echo $settings['email'] ?: 'در حال به‌روزرسانی'; ?></span>
                                    </p>
                                </li>
                                <li>
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p>
                                        <span>شماره تماس</span>
                                        <span><?php echo $settings['phone'] ?: 'در حال به‌روزرسانی'; ?></span>
                                    </p>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <p><?php echo $settings['address'] ?: 'در حال به‌روزرسانی'; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                     
                    <div class="col-sm-6 col-xl-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">دسترسی سریع</h3>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">اکانت من</a></li>
                                    <li><a href="#">تاریخچه خرید</a></li>
                                    <li><a href="#">رهگیری سفارش</a></li>
                                    <li><a href="#">بهترین فروش</a></li>
                                    <li><a href="#">جدید ترین محصولات</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">لوکیشن</a></li>
                                    <li><a href="#">زیرمجموعه گیری</a></li>
                                    <li><a href="#">اترابط با ما</a></li>
                                    <li><a href="#">قوانین</a></li>
                                    <li><a href="#">سوالات متداول</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">دانلود اپلیکیشن</h3>
                            <p class="footer-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است!</p>
                            <div class="footer-app">
                                <a href="#"><img src="images/google-store.png" alt="google"></a>
                                <a href="#"><img src="images/app-store.png" alt="app"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom">
                            <p class="footer-copytext">&copy;  تمامی حقوق این سایت متعلق به <a target="_blank" href="#">Mrzic</a></p>
                            <div class="footer-card">
                                <a href="#"><img src="images/payment/jpg/01.jpg" alt="payment"></a>
                                <a href="#"><img src="images/payment/jpg/02.jpg" alt="payment"></a>
                                <a href="#"><img src="images/payment/jpg/03.jpg" alt="payment"></a>
                                <a href="#"><img src="images/payment/jpg/04.jpg" alt="payment"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====================================
                      FOOTER PART END
        =======================================-->
        

        <!--=====================================
                    JS LINK PART START
        =======================================-->
        <!-- VENDOR -->
        <script src="vendor/bootstrap/jquery-1.12.4.min.js"></script>
        <script src="vendor/bootstrap/popper.min.js"></script>
        <script src="vendor/bootstrap/bootstrap.min.js"></script>
        <script src="vendor/countdown/countdown.min.js"></script>
        <script src="vendor/niceselect/nice-select.min.js"></script>
        <script src="vendor/slickslider/slick.min.js"></script>
        <script src="vendor/venobox/venobox.min.js"></script>

        <!-- CUSTOM -->
        <script src="js/nice-select.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/accordion.js"></script>
        <script src="js/venobox.js"></script>
        <script src="js/slick.js"></script>
        <script src="js/main.js"></script>
        <script>
            document.querySelectorAll('.toggle-details-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetId = btn.dataset.target; // همان چیزی که در data-target گذاشتی
                    const wrapperRow = document.getElementById(targetId);

                    if(wrapperRow.style.display === 'none' || wrapperRow.style.display === '') {
                        wrapperRow.style.display = 'table-row'; // برای <tr>
                        btn.classList.add('active');
                    } else {
                        wrapperRow.style.display = 'none';
                        btn.classList.remove('active');
                    }
                });
            });
        </script>





        <!--=====================================
                    JS LINK PART END
        =======================================-->
    </body>

</html>






