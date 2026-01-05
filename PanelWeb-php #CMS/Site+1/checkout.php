<?php
include '../include/functions.php';
@session_start();
//var_dump($_SESSION['user_id']);
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$row = list_menu_defult();
$user_id = $_SESSION['user_id'];
$cart_products = get_cart_products($user_id);
//dell-pro
if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];
    delete_v_cart($id);
    header('Location: checkout.php');
    exit;
}

//--------------------------------------------

if (isset($_REQUEST['checkout'])) {
    $contact_id = $_REQUEST['contact_id'] ?? null;
    $address_id = $_REQUEST['address_id'] ?? null;
    $card_id = $_REQUEST['card_id'] ?? null;


    if (!$contact_id || !$address_id || !$card_id) {
        $empty = "چیزیو انتخاب نکرده از اطلاعات دریافتیش";
    } else {
        $order_id = finalize_order($user_id, $address_id, $card_id, $contact_id);

        if ($order_id !== false) {
            header("Location: invoice.php?order_id=" . $order_id);
            exit;
        }
    }
}



if (isset($_REQUEST['btn_contact'])) {
    $data = $_REQUEST['frm'];
    get_content($user_id,$data);

}
if (isset($_REQUEST['btn_address'])) {
    $data = $_REQUEST['frm'];
    get_address($user_id,$data);
}
if (isset($_REQUEST['btn_buy_cart'])) {
    $data = $_REQUEST['frm'];
    get_buy_cart($user_id,$data);
}
$show_content_user = show_content_user($user_id);
$show_addresses_user = show_addresses_user($user_id);
$show_buycart_user = show_buycart_user($user_id);
//---------



?>
<!DOCTYPE html>
<html lang="en" dir="rtl" xmlns="http://www.w3.org/1999/html">

    
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
    <title>
        <?php echo $settings['title']; ?>
    </title>
    <meta name="description" content="<?php echo $settings['description']; ?>">

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
        <link rel="stylesheet" href="css/checkout.css">
        <!--=====================================
                    CSS LINK PART END
        =======================================-->
    <style>
        /* کارت‌های انتخابی */
        .profile-card.contact,
        .profile-card.address,
        .payment-card.payment {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 14px;
            background: #fafafa;
            cursor: pointer;
            transition: 0.25s ease;
            position: relative;
        }

        /* هاور کارت */
        .profile-card.contact:hover,
        .profile-card.address:hover,
        .payment-card.payment:hover {
            background: #f1f5ff;
            border-color: #7c3aed;
        }

        /* کارت انتخاب‌شده */
        .profile-card.contact.selected,
        .profile-card.address.selected,
        .payment-card.payment.selected {
            background: #b3ffc2bd;
            border-color: #c7ffd2;
            box-shadow: 0 0 0 3px rgb(8, 196, 2);
        }

        /* رادیو مخفی */
        .profile-card.contact input[type="radio"],
        .profile-card.address input[type="radio"],
        .payment-card.payment input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            width: 0;
            height: 0;
            opacity: 0;
            position: absolute;
        }

        /* اگر بخوای می‌توانی تیک گوشه کارت اضافه کنی */
        .profile-card.contact .checkmark,
        .profile-card.address .checkmark,
        .payment-card.payment .checkmark {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #7c3aed;
            background-color: #7c3aed;
            display: none;
        }

        .profile-card.contact.selected .checkmark,
        .profile-card.address.selected .checkmark,
        .payment-card.payment.selected .checkmark {
            display: block;
        }
    </style>



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
                            <li><a href="#">تخفیفات</a></li>
                            <li><a href="faq.html">راهنما</a></li>
                            <li><a href="contact.php">ارتباط با ما</a></li>
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
                    // لیست زیرمنوها برای هر سرگروه
                    $sub_menu_defult = list_sub_menu_defult($val['id']);
                    ?>
                    <li class="category-item">

                        <!-- لینک سرگروه -->
                        <a class="category-link dropdown-link" href="#">
                            <i class="fa fa-angle-down"></i>
                            <span><?php echo $val['title']; ?></span>
                        </a>

                        <!-- زیرمنوها -->
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
                    <h4 class="nav-name"><a href="profile.html">محمد محمدی</a></h4>
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
                                        <li><a href="#">تخفیفات</a></li>
                                        <li><a href="profile.html">پروفایل من</a></li>
                                        <li><a href="wallet.html">کیف پول من</a></li>
                                        <li><a href="about.html">درباره ما</a></li>
                                        <li><a href="contact.php">ارتباط باما</a></li>
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
                    <li><a class="nav-link" href="#"><i class="icofont-sale-discount"></i>تخفیفات</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-info-circle"></i>درباره ما</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-support-faq"></i>سوالات متداول</a></li>
                    <li><a class="nav-link" href="contact.php"><i class="icofont-contacts"></i>ارتباط با ما</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-warning"></i>سیاست حفظ حریم خصوصی</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-options"></i>دردست ساخت</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-ui-block"></i>خطای 404</a></li>
                    <li><a class="nav-link" href="logout.php"><i class="icofont-logout"></i>خروج</a></li>
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
                    <p class="footer-copytext">&copy;  <?php echo $settings['copyright']; ?> <a target="_blank" href="#"></a></p>
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
                    PRODUCT VIEW START
        =======================================-->
        <div class="modal fade" id="product-view">
            <div class="modal-dialog"> 
                <div class="modal-content">
                    <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                    <div class="product-view">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="view-gallery">
                                    <div class="view-label-group">
                                        <label class="view-label new">جدید</label>
                                        <label class="view-label off">-%10</label>
                                    </div>
                                    <ul class="preview-slider slider-arrow"> 
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                    </ul>
                                    <ul class="thumb-slider">
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                        <li><img src="images/product/01.jpg" alt="product"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="view-details">
                                    <h3 class="view-name">
                                        <a href="product-video.html">نام محصول</a>
                                    </h3>
                                    <div class="view-meta">
                                        <p>کد محصول:<span>1234567</span></p>
                                        <p>برند:<a href="#">سبزیکاران</a></p>
                                    </div>
                                    <div class="view-rating">
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <a href="product-video.html">(3 امتیاز)</a>
                                    </div>
                                    <h3 class="view-price">
                                        <del>38 ريال</del>
                                        <span>24 ريال<small>/هر کیلو</small></span>
                                    </h3>
                                    <p class="view-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                    <div class="view-list-group">
                                        <label class="view-list-title">تگ ها:</label>
                                        <ul class="view-tag-list">
                                            <li><a href="#">ارگانیک</a></li>
                                            <li><a href="#">سبیجات</a></li>
                                            <li><a href="#">فلفل</a></li>
                                        </ul>
                                    </div>
                                    <div class="view-list-group">
                                        <label class="view-list-title">اشتراک:</label>
                                        <ul class="view-share-list">
                                            <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                            <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                        </ul>
                                    </div>
                                    <div class="view-add-group">
                                        <button class="product-add" title="افزودن به سبد خرید">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>افزودن به سبد خرید</span>
                                        </button>
                                        <div class="product-action">
                                            <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                            <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                            <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="view-action-group">
                                        <a class="view-wish wish" href="#" title="افزودن به لیست علاقه مندی ها">
                                            <i class="icofont-heart"></i>
                                            <span>افزودن به علاقه مندی</span>
                                        </a>
                                        <a class="view-compare" href="compare.html" title="مقایسه با دگر محصولات">
                                            <i class="fas fa-random"></i>
                                            <span>مقایسه کن</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    PRODUCT VIEW END
        =======================================-->



        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>تسویه حساب</h2>
                <ol class="breadcrumb">
                    <li class=""><a href="index.php">⁠ خانه ⁠</a></li>
                    <li class=""><a href="shop-all-product.php"> ⁠➡ فروشگاه⁠ ⬅</a></li>
                    <li class=" active" aria-current="page"> ⁠ تسویه حساب ⁠</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    CHECKOUT PART START
        =======================================-->
        <section class="inner-section checkout-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>سفارش شما</h4>
                            </div>
                            <div class="account-content">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
												<th scope="col">سریال</th>
												<th scope="col">محصول</th>
												<th scope="col">نام</th>
												<th scope="col">قیمت</th>
												<th scope="col">برند</th>
												<th scope="col">تعداد</th>
												<th scope="col">اقدامات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($cart_products as $item): ?>
											<tr>
												<td class="table-serial"><h6><?= $item['product_id']; ?></h6></td>
												<td class="table-image"><img src="../<?= $item['img']; ?>" alt="product"></td>
												<td class="table-name"><h6><?= $item['title']; ?></h6></td>
												<td class="table-price"><h6><?= $item['price']; ?><small>/ کیلو</small></h6></td>
												<td class="table-vendor"><a href="#">مزرعه گرینی</a></td>
												<td class="table-quantity"><h6><?= $item['quantity']; ?></h6></td>
												<td class="table-action">
													<a class="trash" href="?delete=<?= $item['cart_id'] ?>" title="حذف از لیست"><i class="icofont-trash"></i></a>
												</td>
											</tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="chekout-coupon">
                                    <button class="coupon-btn">آیا کد تخفیف دارید؟</button>
                                    <form class="coupon-form">
                                        <input type="text" placeholder="کد تخفیف خود را وارد کنید">
                                        <button type="submit"><span>اعمال</span></button>
                                    </form>
                                </div>

                                <div class="checkout-charge">
                                    <ul>
                                        <?php
                                        $total = 0;
                                        foreach ($cart_products as $item) {
                                            $total += $item['quantity'] * $item['price'];
                                        }
                                        ?>

                                        <li>
                                            <span>جمع کل</span>
                                            <span><?= $total; ?> ریال</span>
                                        </li>

                                        <li>
                                            <span>هزینه ارسال</span>
                                            <span>1500000 ریال</span>
                                        </li>
                                        <li>
                                            <span>تخفیف</span>
                                            <span>0</span>
                                        </li>
                                        <li>
                                            <span>جمع کل <small>(جمع جزء، هزینه ارسال)</small></span>
                                            <span><?= $total = $total += 1500000 ?> ريال</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <form method="POST">
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>شماره تماس</h4>
                                <button data-bs-toggle="modal" data-bs-target="#contact-add">افزودن شماره تماس</button>
                            </div>

                            <div class="account-content">
                                <div class="row">
                                    <?php foreach($show_content_user as $show_number): ?>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <img src="images/payment/png/smartphone_138972.png" alt="payment" style="width: 25px;">
                                                <label>
                                                    <input type="radio" name="contact_id" value="<?= $show_number['id']; ?>">
                                                </label>
                                                <h6><?= $show_number['label_phone']; ?></h6>
                                                <p><?= $show_number['phone']; ?></p>

                                                <ul class="user-action">
                                                    <li>
                                                        <button class="edit icofont-edit" title="ویرایش" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li>
                                                        <button class="trash icofont-ui-delete" title="حذف" data-bs-dismiss="alert"></button>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- آدرس ارسال -->
                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">

                                    <h4>آدرس ارسال</h4>
                                    <button data-bs-toggle="modal" data-bs-target="#address-add">افزودن آدرس</button>
                                </div>

                                <div class="account-content">
                                    <div class="row">
                                        <?php foreach($show_addresses_user as $show_address): ?>
                                            <div class="col-md-6 col-lg-4 alert fade show">
                                                <div class="profile-card address">
                                                    <img src="images/payment/png/17410950.png" alt="payment" style="width: 20px;">
                                                    <label>
                                                        <input type="radio" name="address_id" value="<?= $show_address['id']; ?>">
                                                    </label>

                                                    <h6><?= $show_address['label_address']; ?></h6>
                                                    <p><?= $show_address['address']; ?></p>

                                                    <ul class="user-action">
                                                        <li><button class="edit icofont-edit" title="ویرایش" data-bs-toggle="modal" data-bs-target="#address-edit"></button></li>
                                                        <li><button class="trash icofont-ui-delete" title="حذف" data-bs-dismiss="alert"></button></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <!-- کارت بانکی -->
                        <div class="col-lg-12">
                            <div class="account-card mb-0">
                                <div class="account-title">
                                    <h4>نحوه پرداخت</h4>
                                    <button data-bs-toggle="modal" data-bs-target="#payment-add">افزودن کارت بانکی</button>
                                </div>

                                <div class="account-content">

                                    <div class="row">

                                        <?php foreach($show_buycart_user as $show_buycart): ?>
                                            <div class="col-md-6 col-lg-4 alert fade show">
                                                <div class="payment-card payment">
                                                    <i class="icofont-envelope"></i>
                                                    <label>
                                                        <input type="radio" name="card_id" value="<?= $show_buycart['id']; ?>">
                                                    </label>

                                                    <img src="images/payment/png/credit-card_726488.png" alt="payment" style="width: 25px;">
                                                    <h4>شماره کارت</h4>

                                                    <p>
                                                        <span>****</span>
                                                        <span>****</span>
                                                        <span>****</span>
                                                        <sup><?= substr($show_buycart['card_number'], -4); ?></sup>
                                                    </p>

                                                    <h5><?= $show_buycart['owner']; ?></h5>

                                                    <button class="trash icofont-ui-delete" title="حذف" data-bs-dismiss="alert"></button>

                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="checkout-check">
                                    <input type="checkbox" id="checkout-check" required>
                                    <label for="checkout-check">با انجام این خرید شما با <a href="#">شرایط و ظوابط ما</a> موافقت می‌کنید.</label>
                                </div>

                                <button type="submit" name="checkout" class="btn btn-inline col-12 ">اقدام به پرداخت</button>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </section>
        <!--=====================================
                    CHECKOUT PART END
        =======================================-->


        <!--=====================================
                    MODAL ADD FORM START
        =======================================-->

        <!-- contact add form -->
        <div class="modal fade" id="contact-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" method="post">
                        <div class="form-title">
                            <h3>افزودن شماره تماس جدید</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">عنوان شماره</label>
                            <input class="form-control" type="text" placeholder="مثلا تلفن منزل یا خودم ..." name="frm[label_phone]">
                        </div>
                        <div class="form-group">
                            <label class="form-label">شماره</label>
                            <input class="form-control" type="text" placeholder="لطفا شماره تلفن وارد کنید" name="frm[phone]">
                        </div>
                        <button class="form-btn" type="submit" name="btn_contact">ذخیره شماره تلفن</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address add form -->
        <div class="modal fade" id="address-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" method="POST">
                        <div class="form-title">
                            <h3>افزودن آدرس جدید</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">موضوع</label>
                            <select class="form-select" name="frm[label_address]">
                                <option selected value="noPick">یک موضوع انتخاب کنید</option>
                                <option value="خانه">خانه</option>
                                <option value="دفتر">دفتر</option>
                                <option value="شرکت">شرکت</option>
                                <option value="اموزشگاه">آمورشگاه</option>
                                <option value="غیره">غیره</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">آدرس</label>
                            <textarea class="form-control" name="frm[address]" placeholder="آدرس خود را وارد کنید"></textarea>
                        </div>
                        <button class="form-btn" type="submit" name="btn_address">ذخیره آدرس جدید</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- payment add form -->
        <div class="modal fade" id="payment-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" method="post">
                        <div class="form-title">
                            <h3>افزودن کارت جدید</h3>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="form-label">عنوان شماره کارت</label>
                                <input class="form-control" type="text" placeholder="مثلا کارت رضا یا خودم ..." name="frm[owner]">
                            </div>
                            <label class="form-label">شماره کارت</label>
                            <input class="form-control" type="text" placeholder="شماره کارت خود را وارد کنید" name="frm[card_number]">
                        </div>
                        <button class="form-btn" type="submit" name = "btn_buy_cart">ذخیره کارت جدید</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL ADD FORM END
        =======================================-->

        
        <!--=====================================
                    MODAL EDIT FORM START
        =======================================-->
        <!-- contact edit form -->
        <div class="modal fade" id="contact-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>ویرایش شماره تماس</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">موضوع</label>
                            <select class="form-select">
                                <option value="primary" selected>اصلی</option>
                                <option value="secondary">فرعی</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">شماره</label>
                            <input class="form-control" type="text" value="0218888889">
                        </div>
                        <button class="form-btn" type="submit">ذخیره شماره تماس</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address edit form -->
        <div class="modal fade" id="address-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>ویرایش آدرس</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">موضوع</label>
                            <select class="form-select">
                                <option value="home" selected>خانه</option>
                                <option value="office">دفتر</option>
                                <option value="Bussiness">شرکت</option>
                                <option value="academy">آموزشگاه</option>
                                <option value="others">غیره</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">address</label>
                            <textarea class="form-control" placeholder="ایران - تهران - خیابان ظفر"></textarea>
                        </div>
                        <button class="form-btn" type="submit">ذخیره آدرس</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL EDIT FORM END
        =======================================-->



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
                                        <span>ایمیل ما</span>
                                        <span><?php echo $settings['email'] ?: 'در حال به‌روزرسانی'; ?></span>
                                    </p>
                                </li>
                                <li>
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p>
                                        <small>شماره تماس</small>
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
            document.querySelectorAll(".profile-card.contact").forEach(card => {
                card.addEventListener("click", () => {
                    const radio = card.querySelector("input[type='radio']");
                    if(radio) radio.checked = true;

                    // فقط کارت‌های شماره تماس از selected پاک می‌شوند
                    document.querySelectorAll(".profile-card.contact").forEach(c => c.classList.remove("selected"));
                    card.classList.add("selected");
                });
            });

            document.querySelectorAll(".profile-card.address").forEach(card => {
                card.addEventListener("click", () => {
                    const radio = card.querySelector("input[type='radio']");
                    if(radio) radio.checked = true;

                    // فقط کارت‌های آدرس
                    document.querySelectorAll(".profile-card.address").forEach(c => c.classList.remove("selected"));
                    card.classList.add("selected");
                });
            });

            document.querySelectorAll(".payment-card.payment").forEach(card => {
                card.addEventListener("click", () => {
                    const radio = card.querySelector("input[type='radio']");
                    if(radio) radio.checked = true;

                    // فقط کارت‌های پرداخت
                    document.querySelectorAll(".payment-card.payment").forEach(c => c.classList.remove("selected"));
                    card.classList.add("selected");
                });
            });
        </script>




        <script>
            document.querySelectorAll('.selectable-card').forEach(card => {
                card.addEventListener('click', function() {
                    // unselect کارت‌های هم گروه
                    const name = card.querySelector('input[type=radio]').name;
                    document.querySelectorAll('input[name="'+name+'"]').forEach(i => {
                        i.parentElement.classList.remove('selected');
                    });
                    // select کارت فعلی
                    card.classList.add('selected');
                    card.querySelector('input[type=radio]').checked = true;
                });
            });
        </script>
        <!--=====================================
                    JS LINK PART END
        =======================================-->
    </body>

</html>







