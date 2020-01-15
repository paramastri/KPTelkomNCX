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
            '/co/{id}',
            [
                'controller' => 'index',
                'action' => 'co'
            ]
        );

        $router->addGet(
            '/cotermin/{id}',
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
            '/cpe/{id}',
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

        $router->addGet(
            '/login',
            [
                'controller' => 'index',
                'action' => 'login'
            ]
        );

        $router->addGet(
            '/register',
            [
                'controller' => 'index',
                'action' => 'register'
            ]
        );




        $router->addPost(
            '/storeform',
            [
                'controller' => 'index',
                'action' => 'storeform'
            ]
        );

        $router->addPost(
            '/store',
            [
                'controller' => 'index',
                'action' => 'store'
            ]
        );

        $router->addPost(
            '/storeco',
            [
                'controller' => 'index',
                'action' => 'storeco'
            ]
        );

        $router->addPost(
            '/storecotermin',
            [
                'controller' => 'index',
                'action' => 'storecotermin'
            ]
        );

        $router->addPost(
            '/storeconon',
            [
                'controller' => 'index',
                'action' => 'storeconon'
            ]
        );

        $router->addPost(
        '/storecpe',
        [
            'controller' => 'index',
            'action' => 'storecpe'
        ]
        );

        $router->addPost(
            '/storecpetermin',
            [
                'controller' => 'index',
                'action' => 'storecpetermin'
            ]
        );

        $router->addPost(
            '/storecpenon',
            [
                'controller' => 'index',
                'action' => 'storecpenon'
            ]
        );
        return $router;
    }
);