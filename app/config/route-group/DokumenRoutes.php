<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class DokumenRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'dokumen',
        ]);

        $this->setPrefix('/dokumen');

        $this->addGet(
            '/data',
            [
                'controller' => 'dokumen',
                'action' => 'data'
            ]
        );

        $this->addGet(
            '/listdata',
            [
                'controller' => 'dokumen',
                'action' => 'listdata'
            ]
        );

        $this->addGet(
            '/datauser',
            [
                'controller' => 'dokumen',
                'action' => 'datauser'
            ]
        );

        $this->addGet(
            '/listdatauser',
            [
                'controller' => 'dokumen',
                'action' => 'listdatauser'
            ]
        );

        $this->addGet(
            '/detail/{id}',
            [
                'controller' => 'dokumen',
                'action' => 'detail'
            ]
        );

        $this->addPost(
            '/store',
            [
                'controller' => 'dokumen',
                'action' => 'store'
            ]
        );

        $this->addGet(
            '/edit/{id}',
            [
                'controller' => 'dokumen',
                'action' => 'edit'
            ]
        );

        $this->addPost(
            '/storeedit',
            [
                'controller' => 'dokumen',
                'action' => 'storeedit'
            ]
        );

        $this->addGet(
            '/newlistdata',
            [
                'controller' => 'dokumen',
                'action' => 'newlistdata'
            ]
        );

        $this->addGet(
            '/addsequence/{id}',
            [
                'controller' => 'dokumen',
                'action' => 'addsequence'
            ]
        );

        $this->addPost(
            '/storesequence',
            [
                'controller' => 'dokumen',
                'action' => 'storesequence'
            ]
        );

        $this->addGet(
            '/editsequence/{id}',
            [
                'controller' => 'dokumen',
                'action' => 'editsequence'
            ]
        );

        $this->addPost(
            '/storeeditsequence',
            [
                'controller' => 'dokumen',
                'action' => 'storeeditsequence'
            ]
        );
        
        $this->addGet(
            '/download/{id}',
            [
                'controller' => 'dokumen',
                'action' => 'download'
            ]
        );

    }
    
}