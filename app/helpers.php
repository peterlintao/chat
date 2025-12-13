<?php

if (!function_exists('test_run')){
    function test_run():string{
        return 'I am running......';
    }
}

if (!function_exists('category_navbar_active')){
    function category_navbar_active($category):string{
        return  request()->routeIs('categories.show') && request()->route('category')->id == $category->id ? 'active text-primary fw-bold' : '' ;
    }
}

if (!function_exists('make_desc')){
    function make_desc($value, $len=200):string{
        $desc = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return Str::limit($desc, $len);
    }
}
