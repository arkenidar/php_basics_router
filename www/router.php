<?php

function remove_string_from_beginning($to_remove, $from_this)
{
    if (str_starts_with($from_this, $to_remove)) {
        return substr($from_this, strlen($to_remove));
    }
    return false;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/*
$document_root = $_SERVER["DOCUMENT_ROOT"];
$current_directory = realpath(".");
$prefix = remove_string_from_beginning($document_root, $current_directory);
if ($prefix === false) die("prefix error : '$document_root' , '$current_directory' ");
*/

$prefix = "/app/php_basics_router";
$uri = remove_string_from_beginning($prefix, $uri);
if ($uri === false) die("uri error : '$prefix' , '$uri' ");

switch ($uri) {

    case '/index':
        echo '<h1>Home Page</h1>';
        echo '<p><a href="about">about page</a></p>';
        echo '<img src="image01.webp">';
        break;

    case '/about':
        echo '<h1>About Page</h1>';
        echo '<p>about page paragraph...</p>';
        echo '<p><a href="index">index page</a></p>';
        echo '<img src="image01.webp">';
        break;

    default:

        // php server
        // default handling for "built-in php server"
        if (php_sapi_name() == "cli-server") return false;

        // apache server
        http_response_code(404);
        echo 'Page Not Found (default)';

        break;
}
