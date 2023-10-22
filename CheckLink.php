<?php
$discordLink = "https://zalo.me/g/livigx897xxxxxxx";

$headers = @get_headers($discordLink);

if ($headers) {
    foreach ($headers as $header) {
        echo $header . "<br>";
    }
} else {
    echo 'Không thể lấy thông tin tiêu đề từ URL.';
}


?>