# وب سرویس های اپ اپی

ساخت جوک
https://appapi.ir/src/jok-fa/
ساخت بیوگرافی
https://appapi.ir/src/bio-fa/
نام کشور تصادفی
https://appapi.ir/src/country-fa/
قیمت ارز های دیجیتال زنده
https://appapi.ir/src/crypto-prices/

# اموزش استفاده از وب سرویس ها در پی اچ پی (php)
```<?php
/*
کپی‌برداری و استفاده نادرست از وب‌سرویس‌ها پیگرد قانونی دارد
Telegram: @appapi_ir
وب‌سایت: appapi.ir
تمام حقوق محفوظ است.
*/

// باز کردن وب‌سرویس و دریافت داده‌ها
$data = file_get_contents("https://appapi.ir/src/jok-fa/");

// تبدیل داده‌های دریافتی به فرمت JSON
$json = json_decode($data, true);

// بررسی وضعیت اتصال به وب‌سرویس
if ($json["status"] == true) {
    // اگر اتصال موفق بود، نمایش جوک
    echo $json["result"]["jok"];
} else {
    // در صورت بروز خطا در اتصال به وب‌سرویس
    echo "خطایی رخ داده است";
}
?>
