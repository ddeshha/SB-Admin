<?php

if (!function_exists('dd')) {
    function dd($location)
    {
        header("Location: $location");
        die();
    }
}