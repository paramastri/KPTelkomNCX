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
            '/conon/{id}',
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
            '/cpetermin/{id}',
            [
                'controller' => 'index',
                'action' => 'cpetermin'
            ]
        );


        $router->addGet(
            '/cpenon/{id}',
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

        $router->addPost(
            '/login',
            [
                'controller' => 'index',
                'action' => 'storelogin'
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
            '/register',
            [
                'controller' => 'index',
                'action' => 'storeregister'
            ]
        );

        $router->addGet(
            '/logout',
            [
                'controller' => 'index',
                'action' => 'logout'
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

        $router->addGet(
            '/edit/{id}',
            [
                'controller' => 'index',
                'action' => 'edit'
            ]
        );

        $router->addPost(
            '/storeedit',
            [
                'controller' => 'index',
                'action' => 'storeedit'
            ]
        );

        $router->addGet(
            '/editco/{id}',
            [
                'controller' => 'index',
                'action' => 'editco'
            ]
        );

        $router->addPost(
            '/storeeditco',
            [
                'controller' => 'index',
                'action' => 'storeeditco'
            ]
        );

        $router->addGet(
            '/editconon/{id}',
            [
                'controller' => 'index',
                'action' => 'editconon'
            ]
        );

        $router->addPost(
            '/storeeditconon',
            [
                'controller' => 'index',
                'action' => 'storeeditconon'
            ]
        );

        $router->addGet(
            '/editcotermin/{id}',
            [
                'controller' => 'index',
                'action' => 'editcotermin'
            ]
        );

        $router->addPost(
            '/storeeditcotermin',
            [
                'controller' => 'index',
                'action' => 'storeeditcotermin'
            ]
        );

        $router->addGet(
            '/editcpe/{id}',
            [
                'controller' => 'index',
                'action' => 'editcpe'
            ]
        );

        $router->addPost(
            '/storeeditcpe',
            [
                'controller' => 'index',
                'action' => 'storeeditcpe'
            ]
        );

        $router->addGet(
            '/editcpenon/{id}',
            [
                'controller' => 'index',
                'action' => 'editcpenon'
            ]
        );

        $router->addPost(
            '/storeeditcpenon',
            [
                'controller' => 'index',
                'action' => 'storeeditcpenon'
            ]
        );

        $router->addGet(
            '/editcpetermin/{id}',
            [
                'controller' => 'index',
                'action' => 'editcpetermin'
            ]
        );

        $router->addPost(
            '/storeeditcpetermin',
            [
                'controller' => 'index',
                'action' => 'storeeditcpetermin'
            ]
        );

        $router->addGet(
            '/newlistdata',
            [
                'controller' => 'index',
                'action' => 'newlistdata'
            ]
        );

        $router->addGet(
            '/addsequence/{id}',
            [
                'controller' => 'index',
                'action' => 'addsequence'
            ]
        );

        $router->addPost(
            '/storesequence',
            [
                'controller' => 'index',
                'action' => 'storesequence'
            ]
        );

        $router->addGet(
            '/editsequence/{id}',
            [
                'controller' => 'index',
                'action' => 'editsequence'
            ]
        );

        $router->addPost(
            '/storeeditsequence',
            [
                'controller' => 'index',
                'action' => 'storeeditsequence'
            ]
        );



        return $router;
    }
);