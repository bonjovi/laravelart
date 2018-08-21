<?php


function productImage($path)
{
    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('local')->url($path) : asset('img/not-found.jpg');
}

function painterPic($path)
{
    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('local')->url($path) : asset('img/painter-not-found.png');
}

function painterDeathYear($deathYear) {
    return $deathYear ? $deathYear : 'н.в.';
}

function removeGetParams($str)
{
    //$params = parse_str(explode("?", $str)[1], $params);
    return $str . '123';
}