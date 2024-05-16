<?php

$router = new Framework\Router;

// Homepage example
$router->add("/", ["controller" => "home", "action" => "index"]);

// Authentication routes
$router->add("/login", ["controller" => "Authentication", "action" => "showLoginForm"]);
$router->add("/login", ["controller" => "Authentication", "action" => "login", "method" => "post"]);
$router->add("/register", ["controller" => "Authentication", "action" => "showRegisterForm"]);
$router->add("/register", ["controller" => "Authentication", "action" => "register", "method" => "post"]);
$router->add("/logout", ["controller" => "Authentication", "action" => "logout", "method" => "post"]);

// Catch-all example
$router->add("/{controller}/{action}");

// Examples with custom route variables
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);

// Example with namespace
$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);

// Example with HTTP method
$router->add("/{controller}/{id:\d+}/destroy", ["action" => "destroy", "method" => "post"]);

// Example with middleware
$router->add("/{controller}/{id:\d+}/show", ["action" => "show", "middleware" => "example"]);
$router->add("/{controller}/{id:\d+}/edit", ["action" => "edit", "middleware" => "one|two"]);

return $router;