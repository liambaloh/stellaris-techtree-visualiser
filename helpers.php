<?php

function StartsWith(string $haystack, string $needle): bool
{
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function EndsWith(string $haystack, string $needle): bool
{
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function ToAlphanumeric(string $string): string
{
    $string = preg_replace("/[^0-9a-zA-Z ]/m", "", $string);
    $string = preg_replace("/ /", "-", $string);
    return $string;
}

function print_re(&$data, $title = null)
{
    if ($title) {
        print "<h2>$title</h2>";
    }
    print "<pre>";
    print_r($data);
    print "</pre>";
}

?>