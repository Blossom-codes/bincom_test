<?php
date_default_timezone_set("Africa/Lagos");
session_start();
// define("NGN", "&#x20A6;");
// $rand = md5(rand(1, 100000) * rand(2, 999999));
try {
    spl_autoload_register("myAutoloader");
} catch (\Exception $e) {
    die($e->getMessage());
}
function load_path($folder, $class_name)
{
    $path = $folder;
    $class = explode('_', $class_name, 2);
    $ext = ".php";
    $full_path = $path . $class[0] . "." . $class[1] . $ext;
    // echo $full_path;
    return $full_path;
}

function myAutoloader($class_name)
{
    if (file_exists(load_path(
        '/model/',
        $class_name
    ))) {
        require load_path('/model/', $class_name);
    } elseif (file_exists(load_path(
        '../model/',
        $class_name
    ))) {
        require load_path('../model/', $class_name);
    } elseif (file_exists(load_path(
        '../../model/',
        $class_name
    ))) {
        require load_path('../../model/', $class_name);
        # code...
    } elseif (file_exists(load_path(
        '/controller/',
        $class_name
    ))) {
        require load_path('/controller/', $class_name);
    } elseif (file_exists(load_path(
        '../controller/',
        $class_name
    ))) {
        require load_path('../controller/', $class_name);
    } elseif (file_exists(load_path(
        '../../controller/',
        $class_name
    ))) {
        require load_path('../../controller/', $class_name);
    } elseif (file_exists(load_path(
        '/view/',
        $class_name
    ))) {
        require load_path('/view/', $class_name);
    } elseif (file_exists(load_path(
        '../view/',
        $class_name
    ))) {
        require load_path('../view/', $class_name);
    } elseif (file_exists(load_path(
        '../../view/',
        $class_name
    ))) {
        require load_path('../../view/', $class_name);
    } else {
        throw new Exception("Could not find controller", 1);
    }
}
