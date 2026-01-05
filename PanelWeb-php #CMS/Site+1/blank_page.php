<?php
include '../include/functions.php';
$id = $_REQUEST["id"];
$result = show_page_edit($id);
//var_dump($result);
$row = list_menu_defult();
//$phone_email = get_contact_info();
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
        <meta name="author" content="mironcoder">
        <meta name="email" content="mironcoder@gmail.com">
        <meta name="profile" content="https://themeforest.net/user/mironcoder">

        <!-- TEMPLATE META -->
        <meta name="name" content="Greeny">
        <meta name="title" content="Greeny - eCommerce HTML Template">
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, webshop, farm, grocery, natural, online store">
        <!--=====================================
                    META-TAG PART END
        =======================================-->

        <!-- WEBPAGE TITLE -->
        <title><?php echo $result['title']; ?></title>
    <meta name="description" content="<?php echo $result['description']; ?>">
    <meta name="keywords" content="<?php echo $result['keyword']; ?>">
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
        <!--=====================================
                    CSS LINK PART END
        =======================================-->
    <style>
        .page-body {
            margin: 30px auto 100px auto;
            max-width: 1250px;
            padding: 0 20px;
            line-height: 1.9;
            text-align: justify;
            word-wrap: break-word;
        }

        /* نسخه موبایل */
        @media (max-width: 600px) {
            .page-body {
                margin: 20px auto 80px auto;
                padding: 0 15px;
                line-height: 1.85;
            }
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
                    <a href="login.html" class="header-widget" title="My Account">
                        <img src="images/user.png" alt="user">
                        <span>ورود</span>
                    </a>

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
                            <sup>9+</sup>
                            <span>قیمت کل<small>345000 ريال</small></span>
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
                    <span>کل مورد (5)</span>
                </div>
                <button class="cart-close"><i class="icofont-close"></i></button>
            </div>
            <ul class="cart-list">
                <li class="cart-item">
                    <div class="cart-media">
                        <a href="#"><img src="images/product/01.jpg" alt="product"></a>
                        <button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="cart-info-group">
                        <div class="cart-info">
                            <h6><a href="product-single.html">نام محصول موجود</a></h6>
                            <p>قیمت واحد - 5 ریال</p>
                        </div>
                        <div class="cart-action-group">
                            <div class="product-action">
                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                            </div>
                            <h6>56 ريال</h6>
                        </div>
                    </div>
                </li> 
                <li class="cart-item">
                    <div class="cart-media">
                        <a href="#"><img src="images/product/02.jpg" alt="product"></a>
                        <button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="cart-info-group">
                        <div class="cart-info">
                            <h6><a href="product-single.html">نام محصول</a></h6>
                            <p>قیمت واحد - 5 ریال</p>
                        </div>
                        <div class="cart-action-group">
                            <div class="product-action">
                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                            </div>
                            <h6>56 ريال</h6>
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="cart-media">
                        <a href="#"><img src="images/product/03.jpg" alt="product"></a>
                        <button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="cart-info-group">
                        <div class="cart-info">
                            <h6><a href="product-single.html">نام محصول</a></h6>
                            <p>قیمت واحد - 5 ریال</p>
                        </div>
                        <div class="cart-action-group">
                            <div class="product-action">
                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                            </div>
                            <h6>56 ريال</h6>
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="cart-media">
                        <a href="#"><img src="images/product/04.jpg" alt="product"></a>
                        <button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="cart-info-group">
                        <div class="cart-info">
                            <h6><a href="product-single.html">نام محصول</a></h6>
                            <p>قیمت واحد - 5 ریال</p>
                        </div>
                        <div class="cart-action-group">
                            <div class="product-action">
                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                            </div>
                            <h6>56 ريال</h6>
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="cart-media">
                        <a href="#"><img src="images/product/05.jpg" alt="product"></a>
                        <button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="cart-info-group">
                        <div class="cart-info">
                            <h6><a href="product-single.html">نام محصول</a></h6>
                            <p>قیمت واحد - 5 ریال</p>
                        </div>
                        <div class="cart-action-group">
                            <div class="product-action">
                                <button class="action-minus" title="کم کردن"><i class="icofont-minus"></i></button>
                                <input class="action-input" title="تعداد مورد نیاز" type="text" name="quantity" value="1">
                                <button class="action-plus" title="زیاد کردن"><i class="icofont-plus"></i></button>
                            </div>
                            <h6>56 ريال</h6>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="cart-footer">
                <button class="coupon-btn">آیا کد تخفیف دارید؟</button>
                <form class="coupon-form">
                    <input type="text" placeholder="کد تخفیف خود را وارد کنید">
                    <button type="submit"><span>ثبت</span></button>
                </form>
                <a class="cart-checkout-btn" href="checkout.html">
                    <span class="checkout-label">برو به تسویه حساب</span>
                    <span class="checkout-price">369 ريال</span>
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
					<p>از ایده تا اجرا به دست <a href="#">REZA</a></p>
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


        <div class="page-body">
            <?= $result['body']; ?>
        </div>



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
                            <p class="footer-copytext">&copy;  از ایده تا اجرا به دست <a target="_blank" href="#">REZA</a></p>
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

<!-- Mirrored from zoibot.ir/themes/greeny/landing/rtl/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 03:38:32 GMT -->
</html>






