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
