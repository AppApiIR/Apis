# وب‌سرویس‌های اپ‌اپی

در اینجا لیستی از وب‌سرویس‌های اپ‌اپی و نحوه استفاده از آن‌ها با استفاده از PHP ارائه شده است.

## لیست وب‌سرویس‌ها

1. **ساخت جوک**  
   `https://appapi.ir/src/jok-fa/`

2. **ساخت بیوگرافی**  
   `https://appapi.ir/src/bio-fa/`

3. **نام کشور تصادفی**  
   `https://appapi.ir/src/country-fa/`

4. **قیمت ارزهای دیجیتال زنده**  
   `https://appapi.ir/src/crypto-prices/`

## آموزش استفاده از وب‌سرویس‌ها در PHP
## مقدمه
وب‌سرویس‌ها (Web Services) به شما این امکان را می‌دهند که از طریق اینترنت و پروتکل‌های استاندارد (مانند HTTP) به خدمات و داده‌های مختلف دسترسی پیدا کنید. وب‌سرویس‌هایی که در اینجا معرفی می‌شوند، به شما امکان می‌دهند اطلاعاتی مانند جوک‌ها، بیوگرافی‌ها، نام‌های کشور و قیمت‌های ارزهای دیجیتال را به صورت زنده دریافت کنید.

### حداقل دانش زبان php برای ساخت این کد
توانایی کار با توابع شبکه: توابعی مانند file_get_contents() یا cURL برای ارسال درخواست‌های HTTP و دریافت پاسخ‌ها از وب‌سرویس‌ها.
پردازش داده‌های JSON: توانایی تبدیل داده‌های JSON دریافتی از وب‌سرویس به آرایه‌های PHP با استفاده از json_decode() و مدیریت خطاهای مرتبط با پردازش JSON.


## نمونه کد

```php
<?php
/*
کپی‌برداری و استفاده نادرست از وب‌سرویس‌ها پیگرد قانونی دارد
Telegram: @appapi_ir
وب‌سایت: appapi.ir
تمام حقوق محفوظ است.
*/

// URL وب‌سرویس برای دریافت جوک
$url = "https://appapi.ir/src/jok-fa/";

// باز کردن وب‌سرویس و دریافت داده‌ها
$data = file_get_contents($url);

// بررسی اینکه آیا داده‌ها به درستی دریافت شده‌اند
if ($data === FALSE) {
    echo "خطا در اتصال به وب‌سرویس";
    exit();
}

// تبدیل داده‌های دریافتی به فرمت JSON
$json = json_decode($data, true);

// بررسی اینکه آیا داده‌ها به درستی تبدیل شده‌اند
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "خطا در پردازش داده‌ها";
    exit();
}

// بررسی وضعیت اتصال به وب‌سرویس
if ($json["status"] === true) {
    // اگر اتصال موفق بود، نمایش جوک
    echo "جوک: " . $json["result"]["jok"];
} else {
    // در صورت بروز خطا در وب‌سرویس
    echo "خطایی در وب‌سرویس رخ داده است: " . htmlspecialchars($json["message"]);
}
?>
