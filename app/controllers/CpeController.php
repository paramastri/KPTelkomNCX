<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class CpeController extends Controller
{
    public function cpeAction($id)
    {
        $this->view->data = $id;
        
    }

    public function cpeterminAction($id)
    {
        $this->view->data = $id;
        $data2 = cpe::findFirst("id_ncx='$id'");
        $this->view->data2 = $data2;
        $sequences = sequence::find("id_ncx='$id'");
        $this->view->sequences = $sequences;
    }

    public function cpenonAction($id)
    {
        $this->view->data = $id;
    }
    
    public function storecpeAction()
    {
        $detail = new cpe();
        $id_ncx = $this->request->getPost('id_ncx');
        $dok_p6 = $this->request->getPost('dok_p6');
        $dok_p8 = $this->request->getPost('dok_p8');
        $dok_kl_wo = $this->request->getPost('dok_kl_wo');
        $no_agreement = $this->request->getPost('no_agreement');
        $approval_sm_crm = $this->request->getPost('approval_sm_crm');
        $no_order = $this->request->getPost('no_order');
        $wfm_mitra = $this->request->getPost('wfm_mitra');
        $approval_wfm = $this->request->getPost('approval_wfm');
        $status_nde = $this->request->getPost('status_nde');
        $approval_des = $this->request->getPost('approval_des');
        $baso = $this->request->getPost('baso');
        $jenis_termin = $this->request->getPost('jenis_termin');


        $kendala1 = $this->request->getPost('kendala1');
        $kendala2 = $this->request->getPost('kendala2');
        $kendala3 = $this->request->getPost('kendala3');
        $kendala4 = $this->request->getPost('kendala4');
        $kendala5 = $this->request->getPost('kendala5');
        $kendala6 = $this->request->getPost('kendala6');
        $kendala7 = $this->request->getPost('kendala7');
        $kendala8 = $this->request->getPost('kendala8');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->dok_p6 = $dok_p6;
        $detail->dok_p8 = $dok_p8;
        $detail->dok_kl_wo = $dok_kl_wo;
        $detail->no_agreement = $no_agreement;
        $detail->approval_sm_crm = $approval_sm_crm;
        $detail->no_order = $no_order;
        $detail->wfm_mitra = $wfm_mitra;
        $detail->approval_wfm = $approval_wfm;
        $detail->status_nde = $status_nde;
        $detail->approval_des = $approval_des;
        $detail->baso = $baso;
        $detail->jenis_termin = $jenis_termin;
// var_dump($detail); die();
        $detail->save();

        if($kendala1)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('1');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala1;
            $kendala->save();
        }

        if($kendala2)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('2');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala2;
            $kendala->save();
        }

        if($kendala3)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('3');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala3;
            $kendala->save();
        }

        if($kendala4)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('4');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala4;
            $kendala->save();
        }

        if($kendala5)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('5');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala5;
            $kendala->save();
        }

        if($kendala6)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('6');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala6;
            $kendala->save();
        }

        if($kendala7)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('7');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala7;
            $kendala->save();
        }

        if($kendala8)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('8');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala8;
            $kendala->save();
        }

        if($kendala9)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('9');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala9;
            $kendala->save();
        }

        if (true == $this->request->hasFiles() && $this->request->isPost()) {
            // echo("ada file"); die();
            $val2 = new FileValidation();
            $messages2 = $val2->validate($_FILES);
            if (count($messages2)) {
                $this->flashSession->error("GAGAL UPLOAD. Pastikan format file .pdf dan ukuran tidak melebihi 5 MB");
                return $this->response->redirect('cpe/editcpe' . '/' . $id_ncx);
            }
            else{
                $record_cpe = cpe::findFirst("id_ncx='$id_ncx'");
                $record_ncx = ncx::findFirst("id='$id_ncx'");
                $upload_dir = __DIR__ . '/../../public/uploads/';
      
                if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755);
                }
                foreach ($this->request->getUploadedFiles() as $file) {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $file->moveTo($upload_dir . $file->getName());
                    $lama = $upload_dir.$file->getName();
                    $baru = $upload_dir.$record_ncx->nama_cc.'-'.$record_ncx->id.'.'.end($temp);
                    rename($lama, $baru); 
                }

                $record_cpe->file = $record_ncx->nama_cc.'-'.$record_ncx->id.'.'.end($temp);
                $record_cpe->save();
            }
            
        }

        if($jenis_termin == 1)
        {
            return $this->response->redirect('cpe/cpetermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('cpe/cpenon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('dokumen/data');
        }
    }

    public function storecpeterminAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");

        $billing_nol = $this->request->getPost('billing_nol');
        $asset = $this->request->getPost('asset');
        // $approval_sm = $this->request->getPost('approval_sm');
        // $approval_ubc = $this->request->getPost('approval_ubc');
        // $billing_com = $this->request->getPost('billing_com');

        $kendala12 = $this->request->getPost('kendala10');
        $kendala13 = $this->request->getPost('kendala11');
        

        $detail->billing_nol = $billing_nol;
        $detail->asset = $asset;
        // $detail->approval_sm = $approval_sm;
        // $detail->approval_ubc = $approval_ubc;
        // $detail->billing_com = $billing_com;
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

        

    }

    public function storecpenonAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
        // echo $id_ncx; die();

        $billing_com = $this->request->getPost('billing_com');

        $detail->billing_com = $billing_com;
        $detail->save();
    }

    public function editcpeAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala1 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '1',
            ]
        ]);
        $this->view->kendala1 = $kendala1;

        $kendala2 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '2',
            ]
        ]);
        $this->view->kendala2 = $kendala2;

        $kendala3 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '3',
            ]
        ]);
        $this->view->kendala3 = $kendala3;

        $kendala4 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '4',
            ]
        ]);
        $this->view->kendala4 = $kendala4;

        $kendala5 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '5',
            ]
        ]);
        $this->view->kendala5 = $kendala5;

        $kendala6 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '6',
            ]
        ]);
        $this->view->kendala6 = $kendala6;

        $kendala7 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '7',
            ]
        ]);
        $this->view->kendala7 = $kendala7;

        $kendala8 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '8',
            ]
        ]);
        $this->view->kendala8 = $kendala8;

        $kendala9 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '9',
            ]
        ]);
        $this->view->kendala9 = $kendala9;
        
    }

    public function storeeditcpeAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
        $dok_p6 = $this->request->getPost('dok_p6');
        $dok_p8 = $this->request->getPost('dok_p8');
        $dok_kl_wo = $this->request->getPost('dok_kl_wo');
        $no_agreement = $this->request->getPost('no_agreement');
        $approval_sm_crm = $this->request->getPost('approval_sm_crm');
        $no_order = $this->request->getPost('no_order');
        $wfm_mitra = $this->request->getPost('wfm_mitra');
        $approval_wfm = $this->request->getPost('approval_wfm');
        $status_nde = $this->request->getPost('status_nde');
        $approval_des = $this->request->getPost('approval_des');
        $baso = $this->request->getPost('baso');
        $jenis_termin = $this->request->getPost('jenis_termin');


        $kendala1 = $this->request->getPost('kendala1');
        $kendala2 = $this->request->getPost('kendala2');
        $kendala3 = $this->request->getPost('kendala3');
        $kendala4 = $this->request->getPost('kendala4');
        $kendala5 = $this->request->getPost('kendala5');
        $kendala6 = $this->request->getPost('kendala6');
        $kendala7 = $this->request->getPost('kendala7');
        $kendala8 = $this->request->getPost('kendala8');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->dok_p6 = $dok_p6;
        $detail->dok_p8 = $dok_p8;
        $detail->dok_kl_wo = $dok_kl_wo;
        $detail->no_agreement = $no_agreement;
        $detail->approval_sm_crm = $approval_sm_crm;
        $detail->no_order = $no_order;
        $detail->wfm_mitra = $wfm_mitra;
        $detail->approval_wfm = $approval_wfm;
        $detail->status_nde = $status_nde;
        $detail->approval_des = $approval_des;
        $detail->baso = $baso;
        $detail->jenis_termin = $jenis_termin;
// var_dump($detail); die();
        $detail->save();

        if($kendala1)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '1',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala1;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('1');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala1;
                $newkendala->save();
            }

        }

        if($kendala2)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '2',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala2;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('2');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala2;
                $newkendala->save();
            }

        }

        if($kendala3)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '3',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala3;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('3');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala3;
                $newkendala->save();
            }

        }

        if($kendala4)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '4',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala4;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('4');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala4;
                $newkendala->save();
            }

        }

        if($kendala5)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '5',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala5;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('5');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala5;
                $newkendala->save();
            }

        }

        if($kendala6)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '6',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala6;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('6');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala6;
                $newkendala->save();
            }

        }

        if($kendala7)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '7',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala7;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('7');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala7;
                $newkendala->save();
            }

        }

        if($kendala8)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '8',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala8;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('8');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala8;
                $newkendala->save();
            }

        }

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

        if (true == $this->request->hasFiles() && $this->request->isPost()) {
            // echo("ada file"); die();
            $val2 = new FileValidation();
            $messages2 = $val2->validate($_FILES);
            if (count($messages2)) {
                $this->flashSession->error("GAGAL UPLOAD. Pastikan format file .pdf dan ukuran tidak melebihi 5 MB");
                return $this->response->redirect('cpe/editcpe' . '/' . $id_ncx);
            }
            else{
                $record_cpe = cpe::findFirst("id_ncx='$id_ncx'");
                $record_ncx = ncx::findFirst("id='$id_ncx'");
                $upload_dir = __DIR__ . '/../../public/uploads/';
      
                if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755);
                }
                foreach ($this->request->getUploadedFiles() as $file) {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $file->moveTo($upload_dir . $file->getName());
                    $lama = $upload_dir.$file->getName();
                    $baru = $upload_dir.$record_ncx->nama_cc.'-'.$record_ncx->id.'.'.end($temp);
                    rename($lama, $baru); 
                }

                $record_cpe->file = $record_ncx->nama_cc.'-'.$record_ncx->id.'.'.end($temp);
                $record_cpe->save();
            }
            
        }

        if($jenis_termin == 1)
        {
            return $this->response->redirect('cpe/editcpetermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('cpe/editcpenon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('dokumen/data');
        }
    }

    public function editcpenonAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        
    }

    public function storeeditcpenonAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
        $billing_com = $this->request->getPost('billing_com');

        $detail->billing_com = $billing_com;
        $detail->save();
        
        return $this->response->redirect('dokumen/data');
    }

    public function editcpeterminAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
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

    public function storeeditcpeterminAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");

        $billing_nol = $this->request->getPost('billing_nol');
        $asset = $this->request->getPost('asset');
        // $approval_sm  = $this->request->getPost('approval_sm');
        // $approval_ubc = $this->request->getPost('approval_ubc');
        // $billing_com = $this->request->getPost('billing_com');

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        // $kendala12 = $this->request->getPost('kendala12');
        // $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol = $billing_nol;
        $detail->asset = $asset;
        // $detail->approval_sm = $approval_sm;
        // $detail->approval_ubc = $approval_ubc;
        // $detail->billing_com = $billing_com;
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