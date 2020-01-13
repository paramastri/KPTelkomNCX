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
            '/data',
            [
                'controller' => 'index',
                'action' => 'data'
            ]
        );

        $router->notFound([
            'controller' => 'index',
            'action' => 'show404'
        ]);

        $router->addGet(
            '/listdata',
            [
                'controller' => 'index',
                'action' => 'listdata'
            ]
        );
        
        $router->addGet(
            '/list',
            [
                'controller' => 'index',
                'action' => 'list'
            ]
        );

        $router->addGet(
            '/detail/{id}',
            [
                'controller' => 'index',
                'action' => 'detail'
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

        $router->addGet(
            '/co',
            [
                'controller' => 'index',
                'action' => 'co'
            ]
        );

        $router->addGet(
            '/cotermin',
            [
                'controller' => 'index',
                'action' => 'cotermin'
            ]
        );

        $router->addGet(
            '/conon',
            [
                'controller' => 'index',
                'action' => 'conon'
            ]
        );       


        $router->addGet(
            '/cpe',
            [
                'controller' => 'index',
                'action' => 'cpe'
            ]
        ); 

        $router->addGet(
            '/cpetermin',
            [
                'controller' => 'index',
                'action' => 'cpetermin'
            ]
        );


        $router->addGet(
            '/cpenon',
            [
                'controller' => 'index',
                'action' => 'cpenon'
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