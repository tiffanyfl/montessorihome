<?php
 function presentPrice($price)
 {
     return number_format($price).'€';
 }

function productImage($path)
{
    //return file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.png');
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.png');
}

