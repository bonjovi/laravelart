<?php


function productImage($path)
{
    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('local')->url($path) : asset('img/not-found.jpg');
}