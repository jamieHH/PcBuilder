<?php

if (!function_exists("isRouteOf")) {
    function isRouteOf($route, $string)
    {
        return substr($route, 0, strlen($string)) === $string;
    }
}