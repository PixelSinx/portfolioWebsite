<?php

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/flash', function ($request, $response, $args) use ($app) {

    $this->flash->addMessage('global', 'This is a flash message!');

    return $response->withRedirect($app->router->pathFor('home'));
});
