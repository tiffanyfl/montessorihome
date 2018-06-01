<?php
 function presentPrice($price)
 {
     return number_format($price).'€';
 }

function productImage($path)
{
  //take image of database
  return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.png');
}
