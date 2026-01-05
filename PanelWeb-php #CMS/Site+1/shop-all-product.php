<?php

include '../include/functions.php';
@$user_id = $_SESSION['user_id'];

$cart_products = get_cart_products($user_id);

if (isset($_REQUEST['btn'])) {
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php?error=login_required");
        exit;
    }
    $product_id = $_REQUEST['add_product_id'];
    $quantity = ($_REQUEST['quantity'] ?? 1);
    $user_id = $_SESSION['user_id'];
    add_v_cart($user_id, $product_id, $quantity);
    header('Location: shop-all-product.php');
}
if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    delete_v_cart($id);
    header('Location: shop-all-product.php');
}
$row = list_menu_defult();
$show_widget = list_widget_admin();

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
        <link rel="stylesheet" href="css/index.css">
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
                            <li><a href="#">تخفیفات</a></li>
                            <li><a href="#">راهنما</a></li>
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
                        <a href="checkout.php" class="header-widget" title="Wishlist">
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


                            <form method="get" style="display:inline;">
                                <button type="submit" name="delete" value="<?= $item['cart_id'] ?>" class="cart-delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>

                        </div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="product-single.html"><?= $item['title'] ?></a></h6>
                                <p>قیمت واحد - 5 ریال</p>
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
                                        <li><a href="#">سوالات متداول</a></li>
                                        <li><a href="#">تخفیفات</a></li>
                                        <li><a href="#">پروفایل من</a></li>
                                        <li><a href="#">کیف پول من</a></li>
                                        <li><a href="#">درباره ما</a></li>
                                        <li><a href="contact.php">ارتباط باما</a></li>
                                        <li><a href="#">سیاست حفظ حریم خصوصی</a></li>
                                        <li><a href="#">در دست ساخت</a></li>
                                        <li><a href="#">صفحه خالی</a></li>
                                        <li><a href="#">خطای 404</a></li>
                                        <li><a href="#">قالب ایمیل</a></li>
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
                    <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>سوالات متداول</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-contacts"></i>ارتباط با ما</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-warning"></i>سیاست حفظ حریم خصوصی</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-options"></i>دردست ساخت</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-ui-block"></i>خطای 404</a></li>
                    <li><a class="nav-link" href="#"><i class="icofont-logout"></i>خروج</a></li>
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
                            <span><?php echo $settings['email'] ?: 'در حال به‌روزرسانی'; ?>/span>
                        </p>
                    </div>
                </div>
                <div class="nav-footer">
                    <p>ایده تا اجرا<a href="#">REZA</a></p>
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
                <h2>فروشگاه</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">⁠ خانه ⁠</a></li>
                    <li class=" active" aria-current="page"><a href="shop-all-product.php">➜ فروشگاه </a></li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->



        <!--=====================================
                    SHOP PART START
        =======================================-->
        <section class="inner-section shop-part">
            <div class="container">
                <div class="row content-reverse">
                    <div class="col-lg-3">
                        <div class="shop-widget-promo">
                            <a href="#"><img src="images/promo/shop/01.jpg" alt="promo"></a>
                        </div>
                        <div class="shop-widget">
                            <h6 class="shop-widget-title">فیلتر براساس قیمت</h6>
                            <form>
                                <div class="shop-widget-group">
                                    <input type="text" placeholder="کم - 00">
                                    <input type="text" placeholder="بیشتر - 50">
                                </div>
                                <button class="shop-widget-btn">
                                    <i class="fas fa-search"></i>
                                    <span>اعمال</span>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget">
                            <h6 class="shop-widget-title">فیلتر براساس امتیاز</h6>
                            <form>
                                <ul class="shop-widget-list">
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="feat1">
                                            <label for="feat1">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                            </label>
                                        </div>
                                        <span class="shop-widget-number">(13)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="feat2">
                                            <label for="feat2">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <span class="shop-widget-number">(28)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="feat3">
                                            <label for="feat3">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <span class="shop-widget-number">(35)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="feat4">
                                            <label for="feat4">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <span class="shop-widget-number">(47)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="feat5">
                                            <label for="feat5">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <span class="shop-widget-number">(59)</span>
                                    </li>
                                </ul>
                                <button class="shop-widget-btn">
                                    <i class="far fa-trash-alt"></i>
                                    <span>پاک کردن فیلتر</span>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget">
                            <h6 class="shop-widget-title">فیلتر براساس تگ</h6>
                            <form>
                                <ul class="shop-widget-list">
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="tag1">
                                            <label for="tag1">جدیدترین ها</label>
                                        </div>
                                        <span class="shop-widget-number">(13)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="tag2">
                                            <label for="tag2">فروش</label>
                                        </div>
                                        <span class="shop-widget-number">(28)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="tag3">
                                            <label for="tag3">امتیاز</label>
                                        </div>
                                        <span class="shop-widget-number">(35)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="tag4">
                                            <label for="tag4">ویژه ها</label>
                                        </div>
                                        <span class="shop-widget-number">(47)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="tag5">
                                            <label for="tag5">تخفیفی</label>
                                        </div>
                                        <span class="shop-widget-number">(59)</span>
                                    </li>
                                </ul>
                                <button class="shop-widget-btn">
                                    <i class="far fa-trash-alt"></i>
                                    <span>پاک کردن فیلتر</span>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget">
                            <h6 class="shop-widget-title">فیلتر براساس برند</h6>
                            <form>
                                <input class="shop-widget-search" type="text" placeholder="جستجو ...">
                                <ul class="shop-widget-list shop-widget-scroll">
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand1">
                                            <label for="brand1">ماری گولد</label>
                                        </div>
                                        <span class="shop-widget-number">(13)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand2">
                                            <label for="brand2">تردر</label>
                                        </div>
                                        <span class="shop-widget-number">(28)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand3">
                                            <label for="brand3">کی یا</label>
                                        </div>
                                        <span class="shop-widget-number">(35)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand4">
                                            <label for="brand4">دایموند</label>
                                        </div>
                                        <span class="shop-widget-number">(47)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand5">
                                            <label for="brand5">الیاس</label>
                                        </div>
                                        <span class="shop-widget-number">(59)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand6">
                                            <label for="brand6">فرمنت</label>
                                        </div>
                                        <span class="shop-widget-number">(64)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand7">
                                            <label for="brand7">اواکودا</label>
                                        </div>
                                        <span class="shop-widget-number">(77)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="brand8">
                                            <label for="brand8">بارکولاس</label>
                                        </div>
                                        <span class="shop-widget-number">(85)</span>
                                    </li>
                                </ul>
                                <button class="shop-widget-btn">
                                    <i class="far fa-trash-alt"></i>
                                    <span>پاک کردن فیلتر</span>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget">
                            <h6 class="shop-widget-title">فیلتر براساس دسته بندی</h6>
                            <form>
                                <input class="shop-widget-search" type="text" placeholder="جستجو ...">
                                <ul class="shop-widget-list shop-widget-scroll">
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate1">
                                            <label for="cate1">سبزیجات</label>
                                        </div>
                                        <span class="shop-widget-number">(13)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate2">
                                            <label for="cate2">خواربار</label>
                                        </div>
                                        <span class="shop-widget-number">(28)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate3">
                                            <label for="cate3">میوه ها</label>
                                        </div>
                                        <span class="shop-widget-number">(35)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate4">
                                            <label for="cate4">لبنیات</label>
                                        </div>
                                        <span class="shop-widget-number">(47)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate5">
                                            <label for="cate5">دریایی</label>
                                        </div>
                                        <span class="shop-widget-number">(59)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate6">
                                            <label for="cate6">رژیمی</label>
                                        </div>
                                        <span class="shop-widget-number">(64)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate7">
                                            <label for="cate7">خشک</label>
                                        </div>
                                        <span class="shop-widget-number">(77)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate8">
                                            <label for="cate8">فست فود</label>
                                        </div>
                                        <span class="shop-widget-number">(85)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate9">
                                            <label for="cate9">نوشیدنی</label>
                                        </div>
                                        <span class="shop-widget-number">(92)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate10">
                                            <label for="cate10">قهوه</label>
                                        </div>
                                        <span class="shop-widget-number">(21)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate11">
                                            <label for="cate11">پروتئین</label>
                                        </div>
                                        <span class="shop-widget-number">(14)</span>
                                    </li>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="checkbox" id="cate12">
                                            <label for="cate12">ماهی</label>
                                        </div>
                                        <span class="shop-widget-number">(56)</span>
                                    </li>
                                </ul>
                                <button class="shop-widget-btn">
                                    <i class="far fa-trash-alt"></i>
                                    <span>پاک کردن فیلتر</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="top-filter">
<!--                                    <div class="filter-show">-->
<!--                                        <label class="filter-label">نمایش :</label>-->
<!--                                        <select class="form-select filter-select">-->
<!--                                            <option value="1">12</option>-->
<!--                                            <option value="2">24</option>-->
<!--                                            <option value="3">36</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="filter-short">-->
<!--                                        <label class="filter-label">مرتب براساس :</label>-->
<!--                                        <select class="form-select filter-select">-->
<!--											<option selected>پیش‌فرض</option>-->
<!--                                             <option value="3">پرطرفدار</option>-->
<!--                                             <option value="1">ویژه</option>-->
<!--                                             <option value="2">توصیه</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="filter-action">-->
<!--                                        <a href="shop-3column.html" title="Three Column"><i class="fas fa-th"></i></a>-->
<!--                                        <a href="shop-2column.html" title="Two Column"><i class="fas fa-th-large"></i></a>-->
<!--                                        <a href="shop-1column.html" class="active" title="One Column"><i class="fas fa-th-list"></i></a>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
                            <?php
                            $products = list_product_defult();
                            foreach ($products as $show_pro):
                            ?>

                            <div class="col">
                                <div class="product-card">
                                    <form method="POST">
                                        <input type="hidden" name="add_product_id" value="<?= $show_pro['id'] ?>">
                                        <div class="product-media">
                                            <div class="product-label">
                                                <label class="label-text sale">فروش</label>
                                            </div>
                                            <button class="product-wish wish" type="button">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                            <a class="product-image" href="#">
                                                <img src="../<?= $show_pro['img']; ?>" alt="product">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-rating">
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="#"><?= $show_pro['title']; ?></a>
                                            </h6>
                                            <h6 class="product-price">
                                                <del>قیمت قبل</del>
                                                <span>عددی<small>قیمت </small></span>
                                            </h6>


                                            <div class="product-action">
                                                <button type="button" class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                                <button type="button" class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                            </div>

                                            <button class="product-add" type="submit" name="btn" title="افزودن به سبد خرید">
                                                <i class="fas fa-shopping-basket"></i>
                                                <span>افزودن</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="bottom-paginate">
                                    <p class="page-info">نمایش 12 از 60 نتیجه</p>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">60</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-long-arrow-alt-left"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    SHOP PART END
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
                                        <span>ایمیل ما</span>
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
                            <p class="footer-copytext">&copy;  <?php echo $settings['copyright']; ?> <a target="_blank" href="#"></a></p>
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
        <!--=====================================
                    JS LINK PART END
        =======================================-->
    </body>
</html>

