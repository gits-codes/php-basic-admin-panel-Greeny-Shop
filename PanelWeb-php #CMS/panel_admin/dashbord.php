<?php
ob_start();
include_once '../include/functions.php';
if (!isset($_SESSION['username'])) {
    header("location:index.php?login=first");
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>پنل مدیریتی</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- morris css -->
    <link rel="stylesheet" href="plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/ckeditor/ckeditor5.css">
    <link rel="stylesheet" href="assets/ckeditor/ckeditor5-content.css">
    <link rel="stylesheet" href="assets/ckeditor/ckeditor5-editor.css">
    <link rel="stylesheet" href="assets/ckeditor/ckeditor5.css.map">
    <style>
        .body {
            font-family: "Vazirmatn", Tahoma, Arial, sans-serif;
            font-size: 14px;
        }
        .left.side-menu {
            position: fixed !important;
            top: 0;
            bottom: 0;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            height: auto !important;
        }

        /* ============================
   Scrollbar for Chrome / Edge
   ============================ */
        .left.side-menu::-webkit-scrollbar,
        .sidebar-inner::-webkit-scrollbar {
            width: 6px;
        }

        .left.side-menu::-webkit-scrollbar-track,
        .sidebar-inner::-webkit-scrollbar-track {
            background: transparent;
        }

        .left.side-menu::-webkit-scrollbar-thumb,
        .sidebar-inner::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 10px;
        }

        .left.side-menu::-webkit-scrollbar-thumb:hover,
        .sidebar-inner::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.55);
        }

        /* ============================
           Scrollbar for Firefox
           ============================ */
        .left.side-menu,
        .sidebar-inner {
            scrollbar-width: thin; /* باریک */
            scrollbar-color: rgba(255, 255, 255, 0.30) transparent;
        }


    </style>
</head>


<body class="fixed-left">


<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="mdi mdi-close"></i>
        </button>



        <div class="sidebar-inner">

            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title "><h4 class="wwwww">پنل مدیریتی</h4></li>

                    <li>
                        <a href="dashbord.php?m=index&p=index" class="waves-effect">
                            <i class="dripicons-home"></i>
                            <span> داشبورد <span class="badge badge-success badge-pill float-right"> </span></span>
                        </a>

                    </li>
<!--                    //=======================================-->
<!--                    //          START MENU-->
<!--                    //=======================================-->
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-list"></i> <span> مدیریت منوها </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=menu&p=list">لیست منوها</a></li>
                            <li><a href="dashbord.php?m=menu&p=add">افزودن منو جدید</a></li>

                        </ul>
                    </li>
<!--                    //=======================================-->
<!--                    //          END MENU               -->
<!--                    //=======================================-->
<!--                    //=======================================-->
<!--                    //          START product and product_cat             -->
<!--                    //=======================================-->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-tags"></i> <span>دسته بندی محصولات</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=product_cat&p=list">لیست دسته بندی ها</a></li>
                            <li><a href="dashbord.php?m=product_cat&p=add">افزودن دسته بندی جدید</a></li>

                        </ul>
                    </li>

<!--------------------------------------->
<!--------------------------------------->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-archive"></i> <span>مدیریت محصولات</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=product&p=list">لیست محصولات</a></li>
                            <li><a href="dashbord.php?m=product&p=add">افزودن محصول جدید</a></li>

                        </ul>
                    </li>
                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          END product and product_cat             -->
                    <!--                    //=======================================-->

                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START page            -->
                    <!--                    //=======================================-->
                    <!------------------->


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-document"></i> <span>مدیریت صفحه</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=page&p=list">لیست صفحه ها</a></li>
                            <li><a href="dashbord.php?m=page&p=add">افزودن صفحه جدید</a></li>

                        </ul>
                    </li>



                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //         END page             -->
                    <!--                    //=======================================-->
                    <!------------------->







                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START news and news_cat            -->
                    <!--                    //=======================================-->
                    <!------------------->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-tags"></i> <span>دسته بندی اخبار</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=news_cat&p=list">لیست دسته بندی اخبار</a></li>
                            <li><a href="dashbord.php?m=news_cat&p=add">افزودن دسته بندی اخبار</a></li>

                        </ul>
                    </li>

                    <!--------------------------------------->
                    <!--------------------------------------->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-document-edit"></i> <span>مدیریت اخبار</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=news&p=list">لیست خبرها</a></li>
                            <li><a href="dashbord.php?m=news&p=add">افزودن خبر جدید</a></li>

                        </ul>
                    </li>
                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //         END news and news_cat             -->
                    <!--                    //=======================================-->
                    <!------------------->

                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START widget            -->
                    <!--                    //=======================================-->
                    <!------------------->


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-thumb"></i> <span>ویجت های زیراسلاید</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=widget&p=list">لیست ویجت ها</a></li>
                            <li><a href="dashbord.php?m=widget&p=add">افزودن ویجت جدید</a></li>

                        </ul>
                    </li>



                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //         END widget             -->
                    <!--                    //=======================================-->
                    <!------------------->
                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START uploader            -->
                    <!--                    //=======================================-->
                    <!------------------->


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span>سفارش نهایی کاربر</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=users_final_orders&p=list">لیست</a></li>


                        </ul>
                    </li>



                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //         END uploader             -->
                    <!--                    //=======================================-->
                    <!------------------->
                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START uploader            -->
                    <!--                    //=======================================-->
                    <!------------------->


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-upload"></i> <span>بارگذاری تصویر</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">

                            <li><a href="dashbord.php?m=uploader&p=list">لیست عکس ها</a></li>
                            <li><a href="dashbord.php?m=uploader&p=add">افزودن عکس جدید</a></li>

                        </ul>
                    </li>



                    <!------------------->
                    <!--                    //=======================================-->
                    <!--                    //         END uploader             -->
                    <!--                    //=======================================-->
                    <!------------------->



                    <!--                    ----------------------------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START contact            -->
                    <!--                    //=======================================-->
                    <!--                    ----------------------------------------->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-mail"></i> <span>تماس ها</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="dashbord.php?m=contact&p=list">لیست تماس ها</a></li>
                        </ul>
                    </li>

                    <!--                    ----------------------------------------->
                    <!--                    //=======================================-->
                    <!--                    //          END contact            -->
                    <!--                    //=======================================-->
                    <!--                    ----------------------------------------->
                    <!--                    ----------------------------------------->
                    <!--                    //=======================================-->
                    <!--                    //          START settings            -->
                    <!--                    //=======================================-->
                    <!--                    ----------------------------------------->

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-gear"></i> <span>تنظیمات سایت</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="dashbord.php?m=settings&p=edit">تنظیمات کلی</a></li>
                        </ul>
                    </li>

                    <!--                    ----------------------------------------->
                    <!--                    //=======================================-->
                    <!--                    //          END settings            -->
                    <!--                    //=======================================-->
                    <!--                    ----------------------------------------->









<!--                    ----------------------------------------->
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">



                <nav class="navbar-custom">

                    <!-- Search input -->
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input" type="search" placeholder="جستجو"/>
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                                <i class="mdi mdi-magnify noti-icon"></i>
                            </a>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>اعلانات (3)</h5>
                                </div>

                                <div class="slimscroll-noti">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>سفارش شما قرار داده شده است</b><span
                                                    class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>پیام جدید دریافت شد</b><span class="text-muted">شما 87 پیام خوانده نشده دارید</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                        <p class="notify-details"><b>مورد شما حمل می شود</b><span class="text-muted">این یک واقعیت طولانی است که خواننده خواهد بود</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>پیام جدید دریافت شد</b><span class="text-muted">شما 87 پیام خوانده نشده دارید</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>سفارش شما قرار داده شده است</b><span
                                                    class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                                        </p>
                                    </a>

                                </div>


                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-all">
                                    مشاهده همه
                                </a>

                            </div>
                        </li>


                        <li class="list-inline-item dropdown notification-list nav-user">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle">
                                <span class="d-none d-md-inline-block ml-1"><?php echo $_SESSION['username']; ?><i
                                            class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> پروفایل</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> کیف پول من</a>
                                <a class="dropdown-item" href="#"><span
                                            class="badge badge-success float-right m-t-5">5</span><i
                                            class="dripicons-gear text-muted"></i> تنظیمات</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> قفل صفحه</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="dripicons-exit text-muted"></i> خروج</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button"
                               aria-haspopup="false" aria-expanded="false">
                                ایجاد جدید ترین <i class="mdi mdi-plus"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated">
                                <a class="dropdown-item" href="#">عملیات</a>
                                <a class="dropdown-item" href="#">اقدام دیگری</a>
                                <a class="dropdown-item" href="#">چیز های دیگر</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">پیوند جدا شده</a>
                            </div>
                        </li>
                        <li class="list-inline-item notification-list d-none d-sm-inline-block">
                            <a href="#" class="nav-link waves-effect">
                                فعالیت
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>


            <?php
            if (isset($_GET['m']) && isset($_GET['p'])){
                $module = $_GET['m'] ? $_GET['m'] : 'index';
                $action = $_GET['p'] ? $_GET['p'] : 'index';
                include_once "$module/$action.php";
            }
            else{

                include_once "index/index.php";
            }


            ?>


        </div>
    </div>
</div>
</div>
<!-- end row -->

</div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<footer class="footer">
    <span class="d-none d-md-inline-block">از ایده تا اجرا، به دست رضا <i
                class="mdi mdi-heart text-danger"></i>  </span>
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!--Morris Chart-->
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>

<!-- dashboard js -->
<script src="assets/pages/dashboard.int.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


<!-- ckeditor5 js -->
<script src="assets/ckeditor/ckeditor5.umd.js"></script>
<script src="assets/ckeditor/ckeditor5.umd.js.map"></script>
<script src="assets/ckeditor/ckeditor5.js.map"></script>
<script src="assets/ckeditor/ckeditor5.js"></script>

</body>


</html>

<?php
ob_end_flush();
?>
