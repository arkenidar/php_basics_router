<?php

function substr_startswith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function remove_string_from_beginning($to_remove, $from_this)
{
    if (str_starts_with($from_this, $to_remove)) {
        return substr($from_this, strlen($to_remove));
    }
    return false;
}

if (false) {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    print $uri;
    print "<br>\n";

    print realpath(".");
    print "<br>\n";

    print $_SERVER["DOCUMENT_ROOT"];
    print "<br>\n";
}

$s1 = '/php_basics_router/';
$s2 = '/var/www/html/php_basics_router';
$s3 = '/var/www/html';

$prefix = remove_string_from_beginning($s3, $s2);
echo remove_string_from_beginning($prefix, $s1) . "\n";
