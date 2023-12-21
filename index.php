<?php

use App\Helpers\Helper;

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once 'vendor/autoload.php';
require_once 'routes/web.php';
require_once 'config/app.php';
require_once 'App\Controllers\Database.php';
//connect database
$db = new Database($appConfig['DB_HOST'],$appConfig['DB_NAME'],$appConfig['DB_USER'],$appConfig['DB_PASSWORD']);
$GLOBALS['db'] = $db;
// Get the current route
$route = Helper::getRoute();
//print_r($route);
$route = parse_url($route, PHP_URL_PATH);

    if (array_key_exists($route, $routes)) {
        // Split the route into controller and method
        list($controllerName, $method) = explode('@', $routes[$route]);
        // Create an instance of the controller
        $controllerClass = "App\\Controllers\\$controllerName";
        $controller = new $controllerClass();
        // Call the method
        $controller->$method();
    } else {
        require_once 'resources/Views/not_found.php';
    }



?>
