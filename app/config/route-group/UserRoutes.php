<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class UserRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'user',
        ]);

        $this->setPrefix('/user');

        $this->addGet(
            '/login',
            [
                'controller' => 'user',
                'action' => 'login'
            ]
        );

        $this->addPost(
            '/login',
            [
                'controller' => 'user',
                'action' => 'storelogin'
            ]
        );

        $this->addGet(
            '/register',
            [
                'controller' => 'user',
                'action' => 'register'
            ]
        );

        $this->addPost(
            '/register',
            [
                'controller' => 'user',
                'action' => 'storeregister'
            ]
        );

        $this->addGet(
            '/logout',
            [
                'controller' => 'user',
                'action' => 'logout'
            ]
        );

    }
    
}