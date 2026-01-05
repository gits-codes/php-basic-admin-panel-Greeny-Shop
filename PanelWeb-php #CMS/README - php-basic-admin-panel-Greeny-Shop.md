language #EN - English
# University PHP Store Project

This project is a basic university-level online store developed using pure procedural PHP.
The main goal of this project is to practice core PHP concepts such as authentication,
sessions, form handling, shopping cart logic, and database operations without using any framework.

---

## Project Modules & Features

- **Dashboard** – Admin overview panel
- **Menu Management** – Create and edit site menus
- **Product Categories** – Manage categories for products
- **Product Management** – Add, edit, and delete products
- **Page Management** – Add and edit static pages
- **News Categories** – Manage categories for news/blog posts
- **News Management** – Add, edit, and delete news articles
- **Widgets below slider** – Customize homepage widgets
- **User Orders** – View and manage user orders
- **Image Upload** – Upload product or page images
- **Contacts** – Manage messages from contact forms
- **Site Settings** – Configure site-wide settings
- **User Module**:
  - Register / Login / Logout
  - Profile management
  - Shopping cart with secure session handling

Other key features:

- Public product listing accessible without login
- Shopping cart functionality with multiple product addition
- Order summary with total price and shipping calculation
- Checkout process with address, phone, and payment info (simulated)
- Order confirmation page displaying products, total price, shipping address, and order date

---

## User Flow

1. Users can browse products without logging in.
2. Selecting a product redirects to login if not logged in.
3. Users can register if they don’t have an account.
4. After login, users can add products to the cart.
5. Multiple items can be added to the cart.
6. During checkout:
   - Prices are calculated
   - Shipping cost is added
   - Total displayed
7. Users provide shipping address, phone number, and payment info (simulated).
8. After submission, users see an order confirmation page with purchased items, shipping address, and order date.

---

## Technologies Used

- PHP (Procedural / Pure PHP)
- MySQL
- HTML
- CSS
- Bootstrap
- PHP Sessions

---

## Important Notes

- This project is developed using procedural PHP.
- MVC architecture and OOP principles are NOT used.
- The payment process is simulated.
- No real payment gateway is implemented.
- This project is intended for educational and university purposes only.

---

## UI Templates

Some UI templates are based on free resources and were customized for this project.  
If any template used here belongs to you, I apologize and greatly appreciate your work.

---

## How to Run the Project

1. Clone the repository
2. Import the provided SQL file into MySQL
3. Configure database credentials in the project files
4. Run the project on a local server such as XAMPP, WAMP, or Laragon
+Some UI templates are based on free resources and have been customized for this project.  
If any template used here belongs to you, I apologize and greatly appreciate your work.

----------------------------------------------------------------------------------------------
language #FA - Persian - زبان فارسی

# پروژه فروشگاه دانشگاهی با PHP

این پروژه یک فروشگاه آنلاین ساده در سطح دانشگاه است که با PHP به صورت بیسیک و procedural ساخته شده است.  
هدف اصلی پروژه تمرین مفاهیم پایه PHP مانند احراز هویت، سشن‌ها، مدیریت فرم‌ها، منطق سبد خرید و عملیات دیتابیس بدون استفاده از هیچ فریم‌ورکی است.

---

## ماژول‌ها و امکانات پروژه

- **داشبورد** – پنل مدیریت اصلی
- **مدیریت منو** – ایجاد و ویرایش منوهای سایت
- **دسته‌بندی محصولات** – مدیریت دسته‌بندی محصولات
- **مدیریت محصولات** – افزودن، ویرایش و حذف محصولات
- **مدیریت صفحات** – افزودن و ویرایش صفحات ثابت
- **دسته‌بندی اخبار** – مدیریت دسته‌بندی اخبار و بلاگ
- **مدیریت اخبار** – افزودن، ویرایش و حذف اخبار
- **ویجت‌های زیر اسلایدر** – شخصی‌سازی ویجت‌های صفحه اصلی
- **سفارشات کاربران** – مشاهده و مدیریت سفارشات
- **آپلود تصاویر** – بارگذاری تصاویر محصولات یا صفحات
- **تماس‌ها** – مدیریت پیام‌های فرم تماس
- **تنظیمات سایت** – تنظیمات کلی سایت
- **ماژول کاربران**:
  - ثبت‌نام / ورود / خروج
  - مدیریت پروفایل
  - سبد خرید با مدیریت امن سشن

امکانات دیگر:

- نمایش عمومی محصولات بدون نیاز به لاگین
- سبد خرید با امکان افزودن چند محصول
- محاسبه مجموع قیمت و هزینه ارسال
- فرآیند تسویه حساب
- صفحه تایید سفارش شامل محصولات خریداری‌شده، مجموع قیمت، آدرس ارسال و تاریخ سفارش

---

## جریان کاربر (User Flow)

1. کاربران بدون ورود به سایت می‌توانند محصولات را مشاهده کنند.
2. انتخاب محصول، در صورت عدم ورود، به صفحه ورود هدایت می‌کند.
3. کاربر می‌تواند ثبت‌نام کند.
4. پس از ورود، امکان افزودن محصول به سبد وجود دارد.
5. امکان افزودن چند محصول به سبد وجود دارد.
6. در مرحله تسویه:
   - قیمت‌ها محاسبه می‌شوند
   - هزینه ارسال اضافه می‌شود
   - مجموع نهایی نمایش داده می‌شود
7. کاربر اطلاعات زیر را وارد می‌کند: آدرس، شماره تماس و اطلاعات کارت خرید (فقط برای ثبت سفارش، پرداخت واقعی انجام نمی‌شود)
8. پس از ثبت سفارش، صفحه تایید سفارش نمایش داده می‌شود.

---

## تکنولوژی‌های استفاده‌شده

- PHP (Procedural / بیسیک)
- MySQL
- HTML
- CSS
- Bootstrap
- PHP Sessions

---

## نکات مهم

- این پروژه با PHP بیسیک و procedural توسعه یافته است.
- معماری MVC و اصول OOP استفاده نشده است.
- فرآیند پرداخت شبیه‌سازی شده و درگاه پرداخت واقعی ندارد.
- این پروژه صرفاً برای اهداف آموزشی و دانشگاهی طراحی شده است.

---

## قالب‌ها و منابع UI

برخی قالب‌های رابط کاربری (UI) از منابع رایگان گرفته شده و برای این پروژه شخصی‌سازی شده‌اند.  
در صورت استفاده از قالب آماده شما، پوزش می‌طلبم و قدردان اشتراک آن هستم.

---

## نحوه اجرای پروژه

1. کلون کردن مخزن (Clone)
2. ایمپورت فایل SQL موجود به MySQL
3. تنظیم اطلاعات دیتابیس در فایل‌های پروژه
4. اجرای پروژه روی سرور محلی مانند XAMPP، WAMP یا Laragon
+برخی قالب‌های رابط کاربری (UI) از منابع رایگان گرفته شده و برای این پروژه شخصی‌سازی شده‌اند.  
در صورت استفاده از قالب آماده شما، پوزش می‌طلبم و قدردان اشتراک آن هستم.
