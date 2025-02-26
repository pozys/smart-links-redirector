<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Pozys\SmartLinks\Application\ResponseEmitter\ResponseEmitter;
use Slim\Factory\{AppFactory, ServerRequestCreatorFactory};

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

$dependencies = require __DIR__ . '/../app/dependencies.php';
$dependencies($containerBuilder);

$repositories = require __DIR__ . '/../app/repositories.php';
$repositories($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

$responseFactory = $app->getResponseFactory();

$app->addRoutingMiddleware();

$app->addBodyParsingMiddleware();

$response = $app->handle($request);
$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);
