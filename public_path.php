<?php
if (
    !function_exists('public_path') &&
    (getenv('APP_ON_HOSTINGER') === 'true' || env('APP_ON_HOSTINGER') === true)
) {
    function public_path($path = '')
    {
        $publicPath = __DIR__ . '/public_html';
        return $path ? $publicPath . '/' . $path : $publicPath;
    }
}