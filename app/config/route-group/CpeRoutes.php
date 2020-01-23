<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class CpeRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'cpe',
        ]);

        $this->setPrefix('/cpe');

        $this->addGet(
            '/cpe/{id}',
            [
                'controller' => 'cpe',
                'action' => 'cpe'
            ]
        ); 

        $this->addGet(
            '/cpetermin/{id}',
            [
                'controller' => 'cpe',
                'action' => 'cpetermin'
            ]
        );


        $this->addGet(
            '/cpenon/{id}',
            [
                'controller' => 'cpe',
                'action' => 'cpenon'
            ]
        );

        $this->addPost(
            '/storecpe',
            [
                'controller' => 'cpe',
                'action' => 'storecpe'
            ]
        );

        $this->addPost(
            '/storecpetermin',
            [
                'controller' => 'cpe',
                'action' => 'storecpetermin'
            ]
        );

        $this->addPost(
            '/storecpenon',
            [
                'controller' => 'cpe',
                'action' => 'storecpenon'
            ]
        );

        $this->addGet(
            '/editcpe/{id}',
            [
                'controller' => 'cpe',
                'action' => 'editcpe'
            ]
        );

        $this->addPost(
            '/storeeditcpe',
            [
                'controller' => 'cpe',
                'action' => 'storeeditcpe'
            ]
        );

        $this->addGet(
            '/editcpenon/{id}',
            [
                'controller' => 'cpe',
                'action' => 'editcpenon'
            ]
        );

        $this->addPost(
            '/storeeditcpenon',
            [
                'controller' => 'cpe',
                'action' => 'storeeditcpenon'
            ]
        );

        $this->addGet(
            '/editcpetermin/{id}',
            [
                'controller' => 'cpe',
                'action' => 'editcpetermin'
            ]
        );

        $this->addPost(
            '/storeeditcpetermin',
            [
                'controller' => 'cpe',
                'action' => 'storeeditcpetermin'
            ]
        );

    }
    
}