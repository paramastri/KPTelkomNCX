<?php

$di->set(
    'router',
    function () {
        $router = new \Phalcon\Mvc\Router(false);

        // $router->mount(
        //     new AdminRoutes()
        // );

        // $router->mount(
        //     new SuratRoutes()
        // );

        $router->addGet(
            '/',
            [
                'controller' => 'index',
                'action' => 'index'
            ]
        );

        $router->addGet(
            '/listdata',
            [
                'controller' => 'index',
                'action' => 'listdata'
            ]
        );

        $router->notFound([
            'controller' => 'index',
            'action' => 'show404'
        ]);
        
        return $router;
    }
);