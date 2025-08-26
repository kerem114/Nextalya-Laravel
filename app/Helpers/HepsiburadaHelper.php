<?php

if (!function_exists('getHepsiburadaHtml')) {
    function getHepsiburadaHtml($url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ]);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
}

if (!function_exists('extractInitialStateJson')) {
    function extractInitialStateJson($html)
    {
        if (preg_match('/window\.__INITIAL_STATE__\s*=\s*(\{.*?\})<\/script>/s', $html, $matches)) {
            $jsonRaw = $matches[1];
            $jsonRaw = rtrim($jsonRaw, ';');
            return json_decode($jsonRaw, true);
        }
        return null;
    }
}

if (!function_exists('getHepsiburadaProductInfo')) {
    function getHepsiburadaProductInfo($url)
    {
        $html = getHepsiburadaHtml($url);
        $data = extractInitialStateJson($html);

        if (!$data) return ['title' => null, 'price' => null];

        $product = $data['product'] ?? [];

        $title = $product['name'] ?? null;
        $price = $product['price']['discountedPrice']['value'] ?? null;

        return ['title' => $title, 'price' => $price];
    }
}
