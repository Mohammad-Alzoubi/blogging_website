<?php

use App\Models\Category\Category;
use App\Models\Clinic;
use App\Models\Post\Post;
use App\Models\Skills\Skills;
use App\Models\University\University;
use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



/**
 * Returns the number in given locale..
 *
 * @param String $desc
 * @param int|null $num
 * @return string
 */


if (!function_exists("getShortDescription")) {
    function getShortDescription($desc, $num): string
    {
        return Str::limit($desc, $num);
    }
}


/**
 * Returns the string
 *
 * @param String $routeName
 * @return string
 */

if (!function_exists("setActive")) {
    function setActive($routeName)
    {
        return  request()->routeIs($routeName) ? 'active' : '';
    }
}

//use slug title
if (!function_exists("make_slug")) {
    function make_slug($string, $lang = "en") {
        if (is_null($string)) {
            return "";
        }

        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);
        if($lang == "en"){
            return Str::slug($string);
        }else{
            $words = explode(' ', $string);
            return join('-', $words);
        }
    }
}

