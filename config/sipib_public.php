<?php

return [
    /*
    | Atur path ini setelah route dashboard Admin Platform dan Admin Client siap.
    | Biarkan kosong selama dashboard internal belum tersedia.
    */
    'dashboard_paths' => [
        'platform' => env('SIPIB_PLATFORM_DASHBOARD_PATH', ''),
        'client' => env('SIPIB_CLIENT_DASHBOARD_PATH', ''),
    ],
];
