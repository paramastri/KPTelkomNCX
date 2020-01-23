<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class AdminController extends Controller
{
    public function registeradminAction()
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }
    }

    public function storeregisteradminAction()
    {
        $admin = new admin();
        $admin->username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // echo $password;
        // die();
        $admin->password = $this->security->hash($password);
        $user = admin::findFirst("username = '$admin->username'");
        if ($user) { 
            $this->flashSession->error("Gagal register. Username telah digunakan.");
            return $this->response->redirect('user/register');
        }
        else
        {
            $admin->save();
            $this->response->redirect('user/login');

        }
    }
    
}