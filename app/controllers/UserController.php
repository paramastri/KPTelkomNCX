<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class UserController extends Controller
{
    public function loginAction()
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        $_isUser = $this->session->get('user')['tipe'];
        if ($_isAdmin == 1) {
            $this->response->redirect('dokumen/data');
        }
        if($_isUser)
        {
            $this->response->redirect('dokumen/datauser');
        }
    }

    public function storeloginAction()
    {
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        // echo $pass;
        // die();
        if($this->request->getPost('tipe')=="admin")
        {
            $user = admin::findFirst("username = '$username'");
            // echo $user->password;
            // die();
            if ($user){
                if($this->security->checkHash($pass, $user->password)){
                    $this->session->set(
                        'admin',
                        [
                            'id' => $user->id,
                            'username' => $user->username,
                            'tipe' => '1'
                        ]
                    );

                    (new Response())->redirect('dokumen/data')->send();
                }
                else{
                    $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('user/login');
                }
            }
            else{
                $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('user/login');
            }
        }

        elseif($this->request->getPost('tipe')=="user")
        {
            // $user = user::findFirst(
            //  [   
            //      'columns' =>'*',
            //      'conditions' =>'username = ?1 AND status = ?2',
            //  ]

            //  'bind' => [
            //      1 => $username,
            //      2 => '1',
            //  ]

            // );
            $user = user::findFirst("username = '$username'");
            if ($user){
                // if($user->status == 1 ){
                    if($this->security->checkHash($pass, $user->password)){
                        $this->session->set(
                            'user',
                            [
                                'id' => $user->id,
                                'username' => $user->username,
                                'tipe' => '2',
                            ]
                        );

                        (new Response())->redirect('dokumen/datauser')->send();
                    }
                    else{
                        $this->flashSession->error("Gagal masuk sebagai user. Silakan cek kembali username dan password anda.");
                        $this->response->redirect('user/login');
                    }
                //}
                // else {
                //  // echo"belum verifikasi";
                //  // die();
                //  $this->flashSession->error("Gagal masuk sebagai user. Belum diverifikasi, silakan hubungi admin.");
                    
                //     $this->response->redirect('user/login');
                // }
           }
            else{
                $this->flashSession->error("Gagal masuk sebagai user. Silakan cek kembali username dan password anda.");
                $this->response->redirect('user/login');
            }

        }

    }

    public function registerAction()
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        $_isUser = $this->session->get('user')['tipe'];
        if ($_isAdmin == 1) {
            $this->response->redirect('dokumen/data');
        }
        if($_isUser)
        {
            $this->response->redirect('dokumen/datauser');
        }
    }

    public function storeregisterAction(){
        $user = new user();
        $user->username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user->password = $this->security->hash($password);
        $usernames = user::findFirst("username = '$user->username'");
        if($usernames){
            $this->flashSession->error("Gagal register. Username telah digunakan.");
            return $this->response->redirect('user/register');
        }
        else{

            $user->save();
            $this->response->redirect('user/login');
        }
    }

    

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('user/login');
    }
    
}