# وب‌سرویس‌های اپ‌اپی

در اینجا لیستی از وب‌سرویس‌های اپ‌اپی و نحوه استفاده از آن‌ها با استفاده از PHP ارائه شده است.

## لیست وب‌سرویس‌ها

1. **ساخت جوک**  
   URL: `https://appapi.ir/src/jok-fa/`

2. **ساخت بیوگرافی**  
   URL: `https://appapi.ir/src/bio-fa/`

3. **نام کشور تصادفی**  
   URL: `https://appapi.ir/src/country-fa/`

4. **قیمت ارزهای دیجیتال زنده**  
   URL: `https://appapi.ir/src/crypto-prices/`

## آموزش استفاده از وب‌سرویس‌ها در PHP

### مثال: دریافت جوک از وب‌سرویس

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
