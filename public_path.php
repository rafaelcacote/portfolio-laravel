<?php
// Redefine o caminho do public_path para usar public_html na Hostinger
if (!function_exists('public_path')) {
    function public_path($path = '') {
        $publicPath = __DIR__ . '/public_html';
        return $path ? $publicPath . '/' . $path : $publicPath;
    }
}