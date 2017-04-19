<?php

require __DIR__ . '/../vendor/autoload.php';

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
    ]);
    
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        $container->view->render($response, 'errors/404.twig');
        return $response->withStatus(404);
    };
};

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});
