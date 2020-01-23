<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AdminRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'admin',
        ]);

        $this->setPrefix('/admin');

        $this->addGet(
            '/registeradmin',
            [
                'controller' => 'admin',
                'action' => 'registeradmin'
            ]
        );

        $this->addPost(
            '/registeradmin',
            [
                'controller' => 'admin',
                'action' => 'storeregisteradmin'
            ]
        ); 

    }
    
}