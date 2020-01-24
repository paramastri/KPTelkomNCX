<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class ConnectRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'connect',
        ]);

        $this->setPrefix('/connect');

        $this->addGet(
            '/co/{id}',
            [
                'controller' => 'connect',
                'action' => 'co'
            ]
        );

        $this->addGet(
            '/cotermin/{id}',
            [
                'controller' => 'connect',
                'action' => 'cotermin'
            ]
        );

        $this->addGet(
            '/conon/{id}',
            [
                'controller' => 'connect',
                'action' => 'conon'
            ]
        );

        $this->addPost(
            '/storeco',
            [
                'controller' => 'connect',
                'action' => 'storeco'
            ]
        );

        $this->addPost(
            '/storecotermin',
            [
                'controller' => 'connect',
                'action' => 'storecotermin'
            ]
        );

        $this->addPost(
            '/storeconon',
            [
                'controller' => 'connect',
                'action' => 'storeconon'
            ]
        );

        $this->addGet(
            '/editco/{id}',
            [
                'controller' => 'connect',
                'action' => 'editco'
            ]
        );

        $this->addPost(
            '/storeeditco',
            [
                'controller' => 'connect',
                'action' => 'storeeditco'
            ]
        );

        $this->addGet(
            '/editconon/{id}',
            [
                'controller' => 'connect',
                'action' => 'editconon'
            ]
        );

        $this->addPost(
            '/storeeditconon',
            [
                'controller' => 'connect',
                'action' => 'storeeditconon'
            ]
        );

        $this->addGet(
            '/editcotermin/{id}',
            [
                'controller' => 'connect',
                'action' => 'editcotermin'
            ]
        );

        $this->addPost(
            '/storeeditcotermin',
            [
                'controller' => 'connect',
                'action' => 'storeeditcotermin'
            ]
        );

    }
    
}