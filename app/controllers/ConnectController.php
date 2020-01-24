<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class ConnectController extends Controller
{
    public function coAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }

        $this->view->data = $id;
        
    }

    public function coterminAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }

        $this->view->data = $id;
        $data2 = connectivity::findFirst("id_ncx='$id'");
        $this->view->data2 = $data2;
        $sequences = sequence::find("id_ncx='$id'");
        $this->view->sequences = $sequences;
    }

    public function cononAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }

        $this->view->data = $id;
    }

    public function storecoAction()
    {
        $detail = new connectivity();
        $id_ncx = $this->request->getPost('id_ncx');
        $no_agreement_con = $this->request->getPost('no_agreement_con');
        $no_order_con = $this->request->getPost('no_order_con');
        $baso_con = $this->request->getPost('baso_con');
        $jenis_termin_con = $this->request->getPost('jenis_termin_con');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->no_agreement_con = $no_agreement_con;
        $detail->no_order_con = $no_order_con;
        $detail->baso_con = $baso_con;
        $detail->jenis_termin_con = $jenis_termin_con;
        $detail->save();
        
        if($kendala9)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('9');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala9;
            $kendala->save();
        }

        

        if($jenis_termin_con == 1)
        {
            return $this->response->redirect('connect/cotermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin_con == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('connect/conon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('dokumen/data');
        }

        

        
    }

    public function storecoterminAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");

        $billing_nol_con = $this->request->getPost('billing_nol_con');
        $asset_con = $this->request->getPost('asset_con');
        // $approval_sm_con  = $this->request->getPost('approval_sm_con');
        // $approval_ubc_con = $this->request->getPost('approval_ubc_con');
        // $billing_com_con = $this->request->getPost('billing_com_con');

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        // $kendala12 = $this->request->getPost('kendala12');
        // $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol_con = $billing_nol_con;
        $detail->asset_con = $asset_con;
        // $detail->approval_sm_con = $approval_sm_con;
        // $detail->approval_ubc_con = $approval_ubc_con;
        // $detail->billing_com_con = $billing_com_con;
        $detail->save();

        if($kendala10)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('10');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala10;
            $kendala->save();
        }

        if($kendala11)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('11');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala11;
            $kendala->save();
        }

        // if($kendala12)
        // {
        //     $kendala = new kendala();
        //     $kendala->id_level = $this->request->getPost('12');
        //     $kendala->id_ncx = $id_ncx;
        //     $kendala->kendala = $kendala12;
        //     $kendala->save();
        // }

        // if($kendala13)
        // {
        //     $kendala = new kendala();
        //     $kendala->id_level = $this->request->getPost('13');
        //     $kendala->id_ncx = $id_ncx;
        //     $kendala->kendala = $kendala13;
        //     $kendala->save();
        // }
        return $this->response->redirect('dokumen/data');

    }

    public function storecononAction()
    {
        // $detail = new connectivity();
        // $id_ncx = $this->request->getPost('id_ncx');

        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        // echo $id_ncx; die();
        $billing_com_con = $this->request->getPost('billing_com_con');

        $detail->billing_com_con = $billing_com_con;
        $detail->save();
        return $this->response->redirect('dokumen/data');
    }

    public function editcoAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }

        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala9 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '9',
            ]
        ]);
        $this->view->kendala9 = $kendala9;
        
    }

    public function storeeditcoAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        $no_agreement_con = $this->request->getPost('no_agreement_con');
        $no_order_con = $this->request->getPost('no_order_con');
        $baso_con = $this->request->getPost('baso_con');
        $jenis_termin_con = $this->request->getPost('jenis_termin_con');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->no_agreement_con = $no_agreement_con;
        $detail->no_order_con = $no_order_con;
        $detail->baso_con = $baso_con;
        $detail->jenis_termin_con = $jenis_termin_con;
        $detail->save();
        
        if($kendala9)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '9',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala9;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('9');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala9;
                $newkendala->save();
            }
        }

        
        if($jenis_termin_con == 1)
        {
            return $this->response->redirect('connect/editcotermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin_con == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('connect/editconon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('dokumen/data');
        }
    }

    public function editcononAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }

        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        
    }

    public function storeeditcononAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        $billing_com_con = $this->request->getPost('billing_com_con');

        $detail->billing_com_con = $billing_com_con;
        $detail->save();
        
        return $this->response->redirect('dokumen/data');
    }

    public function editcoterminAction($id)
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        if (!$_isAdmin) 
        {
            $this->response->redirect('user/login');
        }
        
        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala10 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '10',
            ]
        ]);
        $this->view->kendala10 = $kendala10;

        $kendala11 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '11',
            ]
        ]);
        $this->view->kendala11 = $kendala11;

        // $kendala12 = kendala::findFirst([
        //     'id_ncx = :id_ncx: AND id_level = :id_level:',
        //     'bind' => [
        //         'id_ncx' => $id,
        //         'id_level' => '12',
        //     ]
        // ]);
        // $this->view->kendala12 = $kendala12;

        // $kendala13 = kendala::findFirst([
        //     'id_ncx = :id_ncx: AND id_level = :id_level:',
        //     'bind' => [
        //         'id_ncx' => $id,
        //         'id_level' => '13',
        //     ]
        // ]);
        // $this->view->kendala13 = $kendala13;

        $sequences = sequence::find("id_ncx='$id'");
        $this->view->sequences = $sequences;
        
    }

    public function storeeditcoterminAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");

        $billing_nol_con = $this->request->getPost('billing_nol_con');
        $asset_con = $this->request->getPost('asset_con');
        // $approval_sm_con  = $this->request->getPost('approval_sm_con');
        // $approval_ubc_con = $this->request->getPost('approval_ubc_con');
        // $billing_com_con = $this->request->getPost('billing_com_con');

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        // $kendala12 = $this->request->getPost('kendala12');
        // $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol_con = $billing_nol_con;
        $detail->asset_con = $asset_con;
        // $detail->approval_sm_con = $approval_sm_con;
        // $detail->approval_ubc_con = $approval_ubc_con;
        // $detail->billing_com_con = $billing_com_con;
        $detail->save();
        
        if($kendala10)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '10',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala10;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('10');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala10;
                $newkendala->save();
            }
        }

        if($kendala11)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '11',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala11;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('11');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala11;
                $newkendala->save();
            }
        }

        // if($kendala12)
        // {
        //     $kendala = kendala::findFirst([
        //         'id_ncx = :id_ncx: AND id_level = :id_level:',
        //         'bind' => [
        //             'id_ncx' => $id_ncx,
        //             'id_level' => '12',
        //         ]
        //     ]);

        //     if($kendala)
        //     {
        //         $kendala->kendala = $kendala12;
        //         $kendala->save();

        //     }
        //     else{
        //         $newkendala = new kendala();
        //         $newkendala->id_level = $this->request->getPost('12');
        //         $newkendala->id_ncx = $id_ncx;
        //         $newkendala->kendala = $kendala12;
        //         $newkendala->save();
        //     }
        // }

        // if($kendala13)
        // {
        //     $kendala = kendala::findFirst([
        //         'id_ncx = :id_ncx: AND id_level = :id_level:',
        //         'bind' => [
        //             'id_ncx' => $id_ncx,
        //             'id_level' => '13',
        //         ]
        //     ]);

        //     if($kendala)
        //     {
        //         $kendala->kendala = $kendala13;
        //         $kendala->save();

        //     }
        //     else{
        //         $newkendala = new kendala();
        //         $newkendala->id_level = $this->request->getPost('13');
        //         $newkendala->id_ncx = $id_ncx;
        //         $newkendala->kendala = $kendala13;
        //         $newkendala->save();
        //     }
        // }

        return $this->response->redirect('dokumen/data');
    }
}