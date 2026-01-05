<?php
include '../include/functions.php';
@$user_id = $_SESSION['user_id'];
//var_dump($user_id);


@$cart_products = get_cart_products($user_id);

if(isset($_REQUEST['btn'])){
if(isset($_REQUEST['btn'])){
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php?error=login_required");
        exit;
    }
    $product_id = $_REQUEST['add_product_id'];
    $quantity = ($_REQUEST['quantity'] ?? 1);
    $user_id = $_SESSION['user_id'];
    add_v_cart($user_id, $product_id, $quantity);
    header("Location: index.php");
}
}
if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];
    delete_v_cart($id);
    header('Location: index.php');
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
        <meta name="author" content="REZA">
        <meta name="email" content="reza.r495@gmail.com">
        <meta name="profile" content="localhost/">

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
    <style>
    .slick-prev, .slick-next {
    top: 35%; /* وسط عمودی */
    transform: translateY(-50%); /* دقیق وسط */
    z-index: 10;
    }
    .slick-prev { left: 10px; }
    .slick-next { right: 10px; }
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
                        <a href="#" class="header-widget" title="Compare List">
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
                <p><a href="#">Reza - Rostmi</a></p>
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
                                <h6>      قیمت      <?= $item['price'] ?>  </h6>
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
                                        <li><a href="index.html">صفحه اصلی</a></li>
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
                    PRODUCT VIEW END
        =======================================-->


        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="home-index-slider slider-arrow slider-dots">
            <div class="banner-part banner-1">
                <div class="container">
                    <div class="row align-مورد-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-content">
                                <h1>تحویل رایگان درب منزل تا 24 ساعت در حال حاضر.</h1>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                                <div class="banner-btn">
                                    <a class="btn btn-inline" href="shop-all-product.php">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span>خرید همین حالا</span>
                                    </a>
                                    <a class="btn btn-outline" href="#">
                                        <i class="fas fa-gift"></i>
                                        <span>دریافت تخفیف</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                         
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-img">
                                <img src="images/home/index/01.png" alt="index">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-part banner-2">
                <div class="container">
                    <div class="row align-مورد-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-img">
                                <img src="images/home/index/02.png" alt="index">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-content">
                                <h1>تازه ترین محصولات در سبد خرید شما!</h1>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                                <div class="banner-btn">
                                    <a class="btn btn-inline" href="shop-all-product.php">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span>خرید همین حالا</span>
                                    </a>
                                    <a class="btn btn-outline" href="#">
                                        <i class="fas fa-gift"></i>
                                        <span>دریافت تخفیف</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->

         
        <!--=====================================
                    SUGGEST PART START
        =======================================-->

        <section class="section suggest-part">
            <div class="container">
                <ul class="suggest-slider slider-arrow">
                    <?php
                    foreach ($show_widget as $values):
                    ?>
                    <li>
                        <a class="suggest-card" href="#">
                            <img src="../<?= $values['img']; ?>" alt="suggest">
                            <h5><?= $values['title']; ?><span><?= $values['text']; ?></span></h5>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        <!--=====================================
                    SUGGEST PART END
        =======================================-->


        <!--=====================================
                    RECENT PART START
        =======================================-->
        <section class="section recent-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>محصولات جدید</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                    <?php $counter = 0; ?>
                    <?php $product = list_product_defult();
                    foreach ($product as $show_pro):
                        if ($counter >= 10) break;
                        $counter++;
                        ?>
                        <div class="col">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-label">
                                        <label class="label-text sale">فروش</label>
                                    </div>
                                    <button class="product-wish wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <a class="product-image" href="#">
                                        <img src="../<?php echo $show_pro['img']; ?>" alt="product">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <a href="#">(3)</a>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="#"><?php echo $show_pro['title']; ?></a>
                                    </h6>
                                    <h6 class="product-price">
                                        <span><small></small> قیمت <?php echo $show_pro['price']; ?></span>
                                    </h6>

                                    <form method="post" action="">
                                        <input type="hidden" name="add_product_id" value="<?php echo $show_pro['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" name="btn" class="product-add" title="افزودن به سبد خرید">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>افزودن</span>
                                        </button>
                                    </form>


                                    <div class="product-action">
                                        <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                        <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                        <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>





                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-btn-25">
                            <a href="shop-all-product.php" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>موارد بیشتر</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    RECENT PART END
        =======================================-->


        <!--=====================================
                    PROMOTION PART START
        =======================================-->
        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promo-img">
                            <a href="#"><img src="images/promo/home/03.jpg" alt="promo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                    PROMOTION PART END
        =======================================-->


        <!--=====================================
                    FEATURED PART START
        =======================================-->
        <section class="section feature-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>محصولات ویژه</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                    <?php $counter = 0; ?>
                    <?php
                    $products = list_product_defult();
                    foreach ($product as $show_pro):
                        if ($counter >= 6) break;
                        $counter++;
                        ?>
                        <div class="col">
                            <div class="feature-card">
                                <div class="feature-media">
                                    <div class="feature-label">
                                        <label class="label-text feat">ویژه</label>
                                    </div>
                                    <button class="feature-wish wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <a class="feature-image" href="#">
                                        <img src="../<?php echo $show_pro['img']; ?>" alt="product">
                                    </a>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-name">
                                        <a href="#"><?php echo $show_pro['title']; ?></a>
                                    </h6>
                                    <div class="feature-rating">
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="active icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <a href="product-video.html">-</a>
                                    </div>

                                    <p class="feature-desc"><?php echo $show_pro['text']; ?></p>


                                    <form method="POST" action="index.php" class="product-add-form">
                                        <input type="hidden" name="add_product_id" value="<?php echo $show_pro['id']; ?>">
                                        <div class="product-action">
                                            <button type="button" class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                            <input class="action-input" title="تعداد مورد نیاز" type="number" name="quantity" value="1" min="1">
                                            <button type="button" class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                        </div>
                                        <button name="btn" class="product-add" title="افزودن به سبد خرید">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>افزودن</span>
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>


        <!--=====================================
                    FEATURE PART END
        =======================================-->


        <!--=====================================
                    COUNTDOWN PART START
        =======================================-->
        <section class="section countdown-part">
            <div class="container">
                <div class="row align-مورد-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="countdown-content">
                            <h3>تخفیف شگفت انگیز برای سبزیجات</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                            <div class="countdown countdown-clock" data-countdown="2025/12/15">
                                <span class="countdown-time"><span>00</span><small>روز</small></span>
                                <span class="countdown-time"><span>00</span><small>ساعت</small></span>
                                <span class="countdown-time"><span>00</span><small>دقیقه</small></span>
                                <span class="countdown-time"><span>00</span><small>ثانیه</small></span>
                            </div>
                            <a href="shop-4column.html" class="btn btn-inline">
                                <i class="fas fa-shopping-basket"></i>
                                <span>خرید همین حالا</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="countdown-img">
                            <img src="images/countdown.png" alt="countdown">
                            <div class="countdown-off">
                                <span>20%</span>
                                <span>تخفیف</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         
        <!--=====================================
                    COUNTDOWN PART END
        =======================================-->


        <!--=====================================
                    NEW ITEM PART START
        =======================================-->
        <section class="section newitem-part">
            <div class="container">

                <!-- عنوان بخش -->
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>محصولات تازه روز</h2>
                        </div>
                    </div>
                </div>

                <!-- اسلایدر محصولات -->
                <div class="row">
                    <div class="col">
                        <ul class="new-slider slider-arrow">
                            <?php
                            $product = list_product_defult();
                            foreach ($product as $show_pro):
                                ?>
                                <li>
                                    <div class="product-card">
                                        <div class="product-media">
                                            <div class="product-label">
                                                <label class="label-text new">جدید</label>
                                            </div>
                                            <button class="product-wish wish">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                            <a class="product-image" href="#">
                                                <img src="../<?php echo $show_pro['img']; ?>" alt="product">
                                            </a>
                                            <div class="product-widget">
                                                <a title="Product Compare" href="compare.html" class="fas fa-random"></a>
                                                <a title="Product Video" href="#" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                                <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                            </div>
                                        </div>

                                        <div class="product-content">
                                            <div class="product-rating">
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="active icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <a href="product-video.html">(3)</a>
                                            </div>

                                            <h6 class="product-name">
                                                <a href="product-video.html"><?php echo $show_pro['title']; ?></a>
                                            </h6>

                                            <h6 class="product-price">
                                                <span><?php //echo $show_pro['text']; ?><small></small></span>
                                            </h6>

                                            <button class="product-add" title="افزودن به سبد خرید">
                                                <i class="fas fa-shopping-basket"></i>
                                                <span>افزودن</span>
                                            </button>

                                            <div class="product-action">
                                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- دکمه مشاهده بیشتر -->
                <div class="row">
                    <div class="col">
                        <div class="section-btn-25">
                            <a href="shop-all-product.php" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>موارد بیشتر</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!--=====================================
                    NEW ITEM PART END
        =======================================-->


        <!--=====================================
                    PROMOTION PART START
        =======================================-->
        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                        <div class="promo-img">
                            <a href="#"><img src="images/promo/home/01.jpg" alt="promo"></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                        <div class="promo-img">
                            <a href="#"><img src="images/promo/home/02.jpg" alt="promo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                    PROMOTION PART END
        =======================================-->

         



        <!--=====================================
                    BRAND PART START
        =======================================-->
        <section class="section brand-part">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h2>خرید بر اساس برندها</h2>
                        </div>
                    </div>
                </div>
                <div class="brand-slider slider-arrow">
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/01.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        <div class="brand-meta">
                            <h4>محصولات طبیعی</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/02.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        <div class="brand-meta">
                            <h4>وگان لاوور</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/03.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        <div class="brand-meta">
                            <h4>ارگانیک فوودی</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/04.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        <div class="brand-meta">
                            <h4>اکوماکرت</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/05.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        <div class="brand-meta">
                            <h4>فرش فورتن</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                    <div class="brand-wrap">
                        <div class="brand-media">
                            <img src="images/brand/06.jpg" alt="brand">
                            <div class="brand-overlay">
                                <a href="#"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                         
                        <div class="brand-meta">
                            <h4>اکنوتر</h4>
                            <p>(45 مورد)</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-btn-50">
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمام برنده ها</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    BRAND PART END
        =======================================-->

         
        <!--=====================================
                  TESTIMONIAL PART START
        =======================================-->
        <section class="section testimonial-part">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h2>نظرات مشتری ها</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-slider slider-arrow">
                            <div class="testimonial-card">
                                <i class="fas fa-quote-left"></i>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>                                
								<h5>محمد محمدی</h5>
                                <ul>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                </ul>
                                <img src="images/avatar/01.jpg" alt="testimonial">
                            </div>
                            <div class="testimonial-card">
                                <i class="fas fa-quote-left"></i>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>                               
								<h5>محمد محمدی</h5>
                                <ul>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                </ul>
                                <img src="images/avatar/02.jpg" alt="testimonial">
                            </div>
                            <div class="testimonial-card">
                                <i class="fas fa-quote-left"></i>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>                                
								<h5>محمد محمدی</h5>
                                <ul>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                </ul>
                                <img src="images/avatar/03.jpg" alt="testimonial">
                            </div>
                            <div class="testimonial-card">
                                <i class="fas fa-quote-left"></i>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>                                
								<h5>محمد محمدی</h5>
                                <ul>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                </ul>
                                <img src="images/avatar/04.jpg" alt="testimonial">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                   TESTIMONIAL PART END
        =======================================-->
         

        <!--=====================================
                      BLOG PART START
        =======================================-->
        <section class="section blog-part">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h2>خبرهای روز</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="blog-slider slider-arrow .bamdik">

                            <?php
                            $news_defult_show = list_news_defult();
                            foreach ($news_defult_show as $show_news):
                            ?>

                                <div class="blog-card">
                                    <div class="blog-media">
                                        <a class="blog-img" href="#">
                                            <img src="<?= $show_news['img']; ?>" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <span>ادمین</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span><?= $show_news['date']; ?></span>
                                            </li>
                                        </ul>

                                        <h4 class="blog-title">
                                            <a href="#">
                                                <?= $show_news['title']; ?>
                                            </a>
                                        </h4>

                                        <p class="blog-desc">
                                            <?= $show_news['text']; ?>
                                        </p>

                                        <a class="blog-btn" href="#">
                                            <span>بیشتر بخوانید</span>
                                            <i class="icofont-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-btn-25">
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمام مطالب بلاگ</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!--=====================================
                      BLOG PART END
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
                                    <li><a href="contact.php">ارتباط با ما</a></li>
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






