<?php


function productImage($path)
{
    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('local')->url($path) : asset('img/not-found.jpg');
}

function productImageWatermark($path)
{
    $watermark =  Image::make(storage_path('watermark.png'));
    $img = Image::make(storage_path('app/public/'.$path));

    $watermarkSize = $img->width() - 30; //size of the image minus 20 margins
    //#2
    $watermarkSize = $img->width() / 4; //half of the image size
    //#3
    $resizePercentage = 85;//70% less then an actual image (play with this value)
    $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

    // resize watermark width keep height auto
    $watermark->resize($watermarkSize, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    //insert resized watermark to image center aligned
    $img->insert($watermark, 'top-left', 70, 70);
    //save new image
    $watermarkedImage = $img->save(storage_path('app/public/watermarked/'.basename($path)));

    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('public')->url('watermarked/'.basename($path)) : asset('img/not-found.jpg');
}







function painterPic($path)
{
    return $path && Storage::disk('local')->exists('public', $path) ? Storage::disk('local')->url($path) : asset('img/painter-not-found.svg');
}

function painterDeathYear($deathYear) {
    return $deathYear ? $deathYear : 'н.в.';
}

function removeGetParams($url, $key, $val)
{
    $url = preg_replace('~(\?|&)' . $key . '[^&]*=' . $val . '~','$1', $url);
    return $url;
}