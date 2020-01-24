<?php

$di->set(
    'router',
    function () {
        $router = new \Phalcon\Mvc\Router(false);

        $router->mount(
            new AdminRoutes()
        );

        $router->mount(
            new ConnectRoutes()
        );

        $router->mount(
            new CpeRoutes()
        );

        $router->mount(
            new DokumenRoutes()
        );

        $router->mount(
            new UserRoutes()
        );

        $router->addGet(
            '/',
            [
                'controller' => 'index',
                'action' => 'index'
            ]
        );

        

        $router->notFound([
            'controller' => 'index',
            'action' => 'show404'
        ]);

        
        
        $router->addGet(
            '/list',
            [
                'controller' => 'index',
                'action' => 'list'
            ]
        );

        $router->addGet(
            '/listdatauserview',
            [
                'controller' => 'index',
                'action' => 'listdatauserview'
            ]
        );

        $router->addGet(
            '/detailtipe/{id}',
            [
                'controller' => 'index',
                'action' => 'detailtipe'
            ]
        );

        $router->addGet(
            '/indexbaru',
            [
                'controller' => 'index',
                'action' => 'indexbaru'
            ]
        );

        $router->addGet(
            '/tipeorder',
            [
                'controller' => 'index',
                'action' => 'tipeorder'
            ]
        );

        $router->addPost(
            '/storeform',
            [
                'controller' => 'index',
                'action' => 'storeform'
            ]
        );

        return $router;
    }
);