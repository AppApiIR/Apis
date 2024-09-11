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
