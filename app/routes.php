<?php

declare(strict_types=1);

use Pozys\SmartLinks\Domain\Models\Rules\LanguageRule;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $db = $this->get('db');

        $rule = new LanguageRule;
        $rule->save();
        $response->getBody()->write(var_export(LanguageRule::all(), true));

        return $response;
    });
};
